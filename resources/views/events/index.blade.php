<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>TEST</h1>
    @foreach($events as $event)
    <a href="{{ route('event_show', ['id' => $event->id]) }}">{{ $event->title }}</a>
    @endforeach

    <div>
        <a href="{{ route('image.upload') }}">Add new image</a>
    </div>
</body>
</html>