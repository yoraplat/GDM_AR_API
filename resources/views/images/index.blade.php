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
    
@endsection