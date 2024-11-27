<?php

namespace App\Http\Controllers\Client\CV;

use App\Http\Controllers\Controller;
use App\Models\CvTemplate;
use App\Models\UserCv;
use App\Repositories\CV\CVRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CvTemplateController extends Controller
{
    protected $cvRepository;

    public function __construct(CVRepository $cvRepository)
    {
        $this->cvRepository = $cvRepository;
    }

    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 12);
        $sortBy = $request->input('sortBy', 'newest');

        $templates = $this->cvRepository->getAllTemplates($perPage, $sortBy);

        $data = [
            'templates' => $templates,
            'perPage' => $perPage,
            'sortBy' => $sortBy
        ];

        return view('client.cv.list', $data);
    }

    public function preview(CvTemplate $cvTemplate)
    {
        return view('client.cv.cv-preview', compact('cvTemplate'));
    }

    public function edit(CvTemplate $cvTemplate)
    {
        return view('cv.edit', compact('cvTemplate'));
    }

    public function update(Request $request, CvTemplate $cvTemplate)
    {
        $validatedData = $request->validate([
            'template_name' => 'required|string|max:255',
            'template_content' => 'required|string',
        ]);

        $cvTemplate->update($validatedData);

        flash()->success('Mẫu CV đã được cập nhật.', [], 'Thành công!');
        return redirect()->route('cv.preview', $cvTemplate);
    }

    public function saveCV(Request $request)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vui lòng đăng nhập để lưu CV'
                ], 401);
            }

            $validated = $request->validate([
                'template_id' => 'required|exists:cv_templates,id',
                'cv_content' => 'required|json'
            ]);

            $userCv = UserCv::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'template_id' => $validated['template_id']
                ],
                [
                    'cv_content' => $validated['cv_content']
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'CV đã được lưu thành công',
                'data' => $userCv
            ]);

            flash()->success('CV đã được lưu thành công', [], 'Thành công!');


        } catch (\Exception $e) {
            \Log::error('Error saving CV: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi lưu CV: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $cvTemplate = CvTemplate::findOrFail($id);
        $userCv = null;

        if (Auth::check()) {
            if (request()->has('action') && request()->get('action') === 'new') {
                // Xóa CV cũ nếu tồn tại và người dùng chọn tạo mới
                UserCv::where('user_id', Auth::id())
                      ->where('template_id', $id)
                      ->delete();
            } else {
                // Lấy CV đã lưu nếu có
                $userCv = UserCv::where('user_id', Auth::id())
                               ->where('template_id', $id)
                               ->first();
            }
        }

        return view('client.cv.show', compact('cvTemplate', 'userCv'));
    }

    public function getTemplateData($id)
    {
        $cvTemplate = CvTemplate::findOrFail($id);
        $user = Auth::user();
        $userCv = null;

        if ($user) {
            $userCv = UserCv::where('user_id', $user->id)
                            ->where('template_id', $id)
                            ->first();
        }

        return response()->json([
            'template' => $cvTemplate,
            'userCv' => $userCv ? json_decode($userCv->cv_content) : null
        ]);
    }

    public function savedCVs()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $savedCVs = UserCv::with(['template'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('client.cv.cv-save', compact('savedCVs'));
    }

    public function destroy($id)
    {
        try {
            $userCv = UserCv::where('id', $id)
                ->where('user_id', Auth::id())
                ->firstOrFail();

            $userCv->delete();
            flash()->success('Xóa thành công CV đã lưu.', [], 'Thành công!');

            return redirect()->route('client.cv.saved');

        } catch (\Exception $e) {
            flash()->success('Có lỗi xảy ra khi xóa CV.', [], 'Thành công!');
            return redirect()->route('client.cv.saved')
                ->with('error', 'Có lỗi xảy ra khi xóa CV');
        }
    }

    public function checkExistingCV($templateId)
    {
        if (!Auth::check()) {
            return response()->json(['exists' => false]);
        }

        $existingCV = UserCv::where('user_id', Auth::id())
                           ->where('template_id', $templateId)
                           ->first();

        return response()->json([
            'exists' => !is_null($existingCV),
            'cvId' => $existingCV ? $existingCV->id : null
        ]);
    }

    public function deleteExistingTemplate($templateId)
    {
        try {
            if (Auth::check()) {
                UserCv::where('user_id', Auth::id())
                      ->where('template_id', $templateId)
                      ->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'Đã xóa template cũ',
                    'redirect' => route('client.cv.show', ['id' => $templateId])
                ]);
            }
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function previewTemplate($id)
    {
        $template = CvTemplate::findOrFail($id);
        return view('client.cv.preview', ['template' => $template]);
    }

    public function listTemplates()
    {
        return view('client.cv.template-list');
    }

    public function viewTemplate($id)
    {
        $template = CvTemplate::findOrFail($id);
        return view('client.cv.template-view', [
            'template' => $template
        ]);
    }

    public function getTemplates()
    {
        $templates = CvTemplate::select('id', 'template_name', 'template_image', 'template_description')
            ->get();

        return response()->json($templates);
    }

}
