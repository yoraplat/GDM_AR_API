@extends('layouts.app')

@section('content')
<h2>Edit {{ $event->title }}</h2>
    <form action="{{ route('update_event') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $event->id }}">
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $event->title }}">
        <br>
        <label for="description">Description:</label>
        <input type="text" name="description" value="{{ $event->description }}">
        <br>
         
        <label for="image_url">Select image:</label>

        <select name="image_url">
            @foreach($images as $image)
            @if ($event->image_url == URL::asset('storage/images/' . basename($image)))
            <option selected value="{{ URL::asset('storage/images/' . basename($image)) }}">{{ basename($image) }}</option>
            @else
            <option value="{{ URL::asset('storage/images/' . basename($image)) }}">{{ basename($image) }}</option>
            @endif
            @endforeach
        </select>
        <br>
        <button>Save</button>

        <!-- <input type="file" name="image"> -->
        <!-- <br>
            <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" class="form-control">
                <button type="submit" class="btn btn-success">New image</button>
            </form>
    </form> -->

<br>

    
@endsection