<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function uploadImage(Request $request) {
        try {
            //验证参数
            $this->validateUploadImage($request);

            $path = $request->file('imgFile')->store('images');

            return response()->success([
                'url' => asset('uploads/'.$path)
            ], '上传成功！');
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function validateUploadImage($request)
    {
        $this->validate($request, [
            'imgFile' => 'required|image',
        ]);
    }
}
