@extends('layouts.app')

@section('content')
<h2>Add new image</h2>
    
<form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="filename">Filename:</label>
                <input type="text" name="filename">
                <br>
                <input type="file" name="image" class="form-control">
                <br>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>

<h2>Delete images</h2>

@foreach($images as $image)
<form action="{{ route('delete.image') }}" method="POST">
{{ csrf_field() }}
    <input type="hidden" name="filename" value="{{ $image }}">
    @method('delete')
    
    <button>Delete {{ basename($image) }}</button>
    <!-- <option value="{{ URL::asset('storage/images/' . basename($image)) }}">{{ basename($image) }}</option> -->
</form>
@endforeach
@endsection
    