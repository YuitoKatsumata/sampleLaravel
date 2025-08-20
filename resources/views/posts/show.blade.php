<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿詳細</title>
</head>
<body>
    <h1>投稿詳細</h1>

    <p><strong>ID:</strong> {{$post->id}} </p>
    <p><strong>名前:</strong> {{$post->name}} </p>
    <p><strong>メッセージ:</strong> {{$post->message}} </p>
    <p><strong>投稿日時:</strong> {{ $post->created_at->format('Y-m-d H:i') }} </p>

    <a href="{{ route('posts.index') }}">一覧に戻る</a>
</body>
</html>