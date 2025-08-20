<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿編集</title>
</head>
<body>
    <h1>投稿編集</h1>
    
    <form action="{{ route('posts.update', $post->id) }}" method='post'>
        @csrf
        @method('PUT')

        <div>
            <label for="name">名前:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $post->name) }}">
        </div>

        <div>
            <label for="age">メッセージ:</label>
            <input type="text" name="message" id="message" value="{{ old('message', $post->message) }}"> 
        </div>

        <button type="submit">更新</button>
    </form>

    <a href="{{ route('posts.index') }}">一覧へ戻る</a>
</body>
</html>