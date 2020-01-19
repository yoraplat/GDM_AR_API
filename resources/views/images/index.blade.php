@extends('layouts.app')

@section('content')

<div class="row">
<h2>Add new image</h2>
</div>
<div class="row">

<form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label for="filename">Filename:</label>
                <input class="form-control" type="text" name="filename">
                </div>
                <div class="form-group">
                <input class="form-control-file" type="file" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<div class="row">
    <h2>Delete images</h2>
</div>


@foreach($images as $image)
<form action="{{ route('delete.image') }}" method="POST">
{{ csrf_field() }}
    <input type="hidden" name="filename" value="{{ $image }}">
    @method('delete')

    <button class="btn btn-secondary" type="submit">Delete {{ basename($image) }}</button>
    <!-- <option value="{{ URL::asset('storage/images/' . basename($image)) }}">{{ basename($image) }}</option> -->
</form>
</div>
@endforeach
@endsection
