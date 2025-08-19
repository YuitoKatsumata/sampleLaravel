<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿一覧</title>
</head>
<body>
    <h1>投稿一覧</h1>

    <a href="/post-hello">新規投稿</a>

    <table border='1' cellpadding='5' cellspacing='0'>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>メッセージ</th>
            <th>投稿日時</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->message }}</td>
                <td>{{ $post->created_at }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>