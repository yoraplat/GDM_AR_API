@extends('layouts.app')

@section('content')

<h2>Edit {{ $event->title }}</h2>

    <form action="{{ route('update_event') }}" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $event->id }}">
        <label for="title">Title:</label>
        <input class="form-control" type="text" name="title" value="{{ $event->title }}">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" rows="3" type="text" name="description" >{{ $event->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="image_url">Select image:</label>
            <select multiple class="form-control" name="image_url">
            @foreach($images as $image)
            @if ($event->image_url == URL::asset('storage/images/' . basename($image)))
            <option  selected value="{{ URL::asset('storage/images/' . basename($image)) }}">{{ basename($image) }}</option>
            @else
            <option   value="{{ URL::asset('storage/images/' . basename($image)) }}">{{ basename($image) }}</option>
            @endif
            @endforeach
        </select>
    </div>
        <button class="btn btn-primary" type="submit">Save</button>


        <!-- <input type="file" name="image"> -->
        <!-- <br>
            <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" class="form-control">
                <button type="submit" class="btn btn-success">New image</button>
            </form>
   -->
   </form>
</div>

<br>


@endsection
