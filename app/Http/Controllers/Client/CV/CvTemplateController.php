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
                return response()->json(['success' => false, 'message' => 'Người dùng chưa đăng nhập'], 401);
            }

            $templateId = $request->input('template_id');
            $cvContent = $request->input('cv_content');

            $userCv = UserCv::updateOrCreate(
                ['user_id' => $user->id, 'template_id' => $templateId],
                ['cv_content' => $cvContent]
            );

            return response()->json(['success' => true, 'message' => 'CV đã được lưu thành công']);
        } catch (\Exception $e) {
            \Log::error('Error saving CV: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Lỗi khi lưu CV: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $cvTemplate = CvTemplate::findOrFail($id);
        return view('client.cv.show', compact('cvTemplate'));
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
            'userCv' => $userCv
        ]);
    }


}
