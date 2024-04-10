<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    <h1>映画編集画面</h1>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    <form action="{{ route('movie.update', $movie->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">映画タイトル</label>
            <input type="text" name="title" id="title" value="{{ $movie->title }}">
        </div>
        <div>
            <label for="image_url">画像URL</label>
            <input type="text" name="image_url" id="image_url" value="{{ $movie->image_url }}">
        </div>
        <div>
            <label for="published_year">公開年</label>
            <input type="text" name="published_year" value="{{ $movie->published_year }}">
        </div>
        <div>
            <label for="description">概要</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ $movie->description }}</textarea>
        </div>
        <div>
            <label for="is_showing">公開中である</label>
            <input type="hidden" name="is_showing" value="0">
            <input type="checkbox" name="is_showing" value="1" {{ $movie->is_showing ? 'checked' : '' }}>
        </div>
        <button type="submit">変更する</button>
        <a href="{{ route('movie.index') }}">戻る</a>
    </form>
</body>
</html>