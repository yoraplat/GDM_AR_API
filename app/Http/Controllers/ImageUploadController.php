<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function imageUploadPost(Request $request) {
        request()->validate([
            'filename' =>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=595,min_height=842,max_width=595,max_height=842',
        ]); 

        $filename = $request->get('filename');

        $imageName = $filename . '.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('storage/images'), $imageName);
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }

    public function imageUpload() {
        return view('images.index');
    }
}
