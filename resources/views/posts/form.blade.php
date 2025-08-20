<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規投稿</title>
</head>
<body>
    <h1>新規投稿</h1>

    <form action="{{ route('posts.create') }}" method="post">
        @csrf

        <label for="name">名前:</label>
        <input type="text" name="name" id="name">

        <label for="message">メッセージ:</label>
        <input type="text" name="message" id="message">

        <button type="submit">投稿する</button>
    </form>

    <a href="{{ route('posts.index') }}"></a>
</body>
</html>
