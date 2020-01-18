@extends('layouts.app')

@section('content')
<h2>Edit {{ $event->title }}</h2>
    <form action="{{ route('update_event') }}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $event->id }}">
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $event->title }}">
        <br>
        <label for="description">Description:</label>
        <input type="text" name="description" value="{{ $event->description }}">
        <br>
        <label for="imageUrl">Image URL:</label>
        <input type="text" name="imageUrl" value="{{ $event->image_url }}">
        <button>Save</button>
    </form>
@endsection