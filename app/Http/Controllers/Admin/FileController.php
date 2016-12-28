<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function upload(Request $request) {
        $path = $request->file('imgFile')->store('images');
        return array(
            'error' => 0,
            'url' => asset('uploads/'.$path)
        );
    }
}
