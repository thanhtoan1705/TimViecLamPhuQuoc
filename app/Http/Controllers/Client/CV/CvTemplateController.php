<?php

namespace App\Http\Controllers\Client\CV;

use App\Http\Controllers\Controller;
use App\Models\CvTemplate;
use App\Models\UserCv;
use App\Models\UserCvData;
use App\Models\CvField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CvTemplateController extends Controller
{
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

        return redirect()->route('cv.preview', $cvTemplate)->with('success', 'Mẫu CV đã được cập nhật.');
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
