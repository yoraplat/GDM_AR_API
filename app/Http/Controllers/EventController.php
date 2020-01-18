<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();

        return view('events.index', ['events' => $events]);
    }
    
    public function show($id) {
        $event = Event::find($id);
        $images = Storage::files("public/images");

        return view('events.show', ['event' => $event, 'images' => $images]);
    }
    
    public function update(Request $request) {
        $id = $request->id;
        $event = Event::find($id);
        // dd($request);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:55',
            'description' => 'required|max:255',
            'image_url' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        

        
        if ($validator->fails()) {
            return redirect('events')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            
            $event->update($request->all());
            // dd($event);
            return redirect()->route('event_show', ['id' => $id]);
        }

    }
}
