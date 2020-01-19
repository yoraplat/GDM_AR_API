<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImageUploadController extends Controller
{
    public function imageUploadPost(Request $request) {
        request()->validate([
            'filename' =>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,jpeg,gif,svg|dimensions:min_height=1447,min_width=2048,max_height=1447,max_width=2048',
        ]); 

        $filename = $request->get('filename');

        $imageName = $filename . '.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('storage/images'), $imageName);
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }

    public function imageUpload() {

        $images = Storage::files("public/images");
        return view('images.index', ['images' => $images]);
    }

    public function deleteImage(Request $request) {
        $filename = $request->input('filename');

        // dd($filename);
        Storage::delete($filename);

        return redirect()->back();
    }
}
