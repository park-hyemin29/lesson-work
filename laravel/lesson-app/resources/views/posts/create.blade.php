<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿フォーム</title>
</head>
<body>
    <h1>投稿フォーム</h1>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/posts" method="POST">
        @csrf

        <div>
            <label for="title">タイトル</label>
            <input id="title" type="text" name="title" value="{{ old('title') }}">
        </div>

        <div>
            <label for="body">本文</label>
            <textarea id="body" name="body">{{ old('body') }}</textarea>
        </div>

        <button type="submit">送信</button>
    </form>
</body>
</html>
