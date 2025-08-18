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
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Your name">

        <label for="age">Age:</label>
        <input type="number" name="age" id="age" placeholder="Your age">

        <button type="submit">Say Hello</button>
    </form>
</body>
</html>
