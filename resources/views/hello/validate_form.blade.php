<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規投稿</title>
</head>
<body>
    <h1>新規投稿</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->any() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route(posts.create) }}" method="post">
        @csrf
        <div>
            <label for="name">名前:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="age">年齢:</label>
            <input type="number" name="age" id="age" value="{{ old('age') }}"> 
        </div>

        <button type="submit">送信</button>
    </form>
</body>
</html>