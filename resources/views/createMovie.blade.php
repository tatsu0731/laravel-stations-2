<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    <h1>新規映画登録画面</h1>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    @if (session('message'))
        <div>
            {{session('message')}}
        </div>
    @endif
    <form action="{{ route('movie.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">映画タイトル</label>
            <input type="text" name="title" value="{{ old('title') }}">
        </div>
        <div>
            <label for="image_url">画像URL</label>
            <input type="text" name="image_url" value="{{ old('image_url') }}">
        </div>
        <div>
            <label for="published_year">公開年</label>
            <input type="text" name="published_year" value="{{ old('published_year') }}">
        </div>
        <div>
            <label for="description">概要</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
        </div>
        <div>
            <label for="is_showing">公開中である</label>
            <input type="hidden" name="is_showing" value="0">
            <input type="checkbox" name="is_showing" value="1">
        </div>
        <button type="submit">送信</button>
    </form>
</body>
</html>