<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>POST Hello</title>
</head>
<body>
    <h1>{{ $message ?? '' }}</h1>

    <form action="/post-hello" method="post">
        @csrf
        <label for="name">名前:</label>
        <input type="text" name="name" id="name">

        <label for="message">メッセージ:</label>
        <input type="text" name="message" id="message">

        <button type="submit">投稿する</button>
    </form>
</body>
</html>
