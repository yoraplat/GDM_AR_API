@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm">
        <h1>List of events</h1>
        </div>
    </div>
    <div class="row">
       <div class="col-sm">
            <ul class="list-group">
                 @foreach($events as $event)
                <li class="list-group-item">
                    <p> {{ $event->title }}</p>
                    <a href="{{ route('event_show', ['id' => $event->id]) }}"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('event_delete', ['id' => $event->id]) }}"><i class="fa fa-trash"></i></a>
                </li>
                @endforeach
            </ul>
       </div>
    </div>

    <div class="row">
        <div class="col-sm">
        <p>Add new image</p>
        <a href="{{ route('image.upload') }}"></a>
        </div>
    </div>

@endsection
