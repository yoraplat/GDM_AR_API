<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();

        return view('events.index', ['events' => $events]);
    }
    
    public function show($id) {
        $event = Event::find($id);

        return view('events.show', ['event' => $event]);
    }
    
    public function update(Request $request) {
        $id = $request->id;
        $event = Event::find($id);
        // dd($event);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:55',
            'description' => 'required|max:255',
            'imageUrl' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('events.show')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            
            $event->update($request->all());
            // dd($event);
            return redirect()->route('event_show', ['id' => $id]);
        }

    }
}
