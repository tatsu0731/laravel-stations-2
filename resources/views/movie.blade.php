<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    @if (session('message'))
        <div>
            {{session('message')}}
        </div>
    @endif
    <ul>
        <table>
            <tr>
                <th>映画タイトル</th>
                <th>画像URL</th>
                <th>公開年</th>
                <th>現在上映中かどうか</th>
                <th>概要</th>
                <th>ボタン</th>
            </tr>
        @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie->title }}</td>
                <td>
                    <img src="{{ $movie->image_url }}" alt="" width="40">
                </td>
                <td>{{ $movie->published_year }}</td>
                @if ( $movie->is_showing )
                <td>上映中</td>
                @else
                <td>上映予定</td>
                @endif
                <td>{!! nl2br(e($movie->description)) !!}</td>
                <td>
                    <a href="{{ route('movie.edit', $movie->id) }}">編集する</a>
                </td>
            </tr>
        @endforeach
        </table>
    </ul>
    <a href="{{ route('movie.create') }}">映画を新規登録する</a>
</body>
</html>