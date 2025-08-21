<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿詳細</title>
    @vite('resources/css/app.css') <!-- Tailwind の読み込み -->
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
<div class="container mx-auto p-4 max-w-2xl">
    
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" 
            alt="投稿画像" class="w-full h-auto mb-4 rounded">
    @endif

    {{-- 投稿タイトル --}}
    <h1 class="text-3xl font-bold mb-2 text-gray-800">{{ $post->name }}</h1>

    {{-- 投稿日 --}}
    <p class="text-sm text-gray-500 mb-4 italic">
        投稿日: {{ $post->created_at->format('Y-m-d H:i') }}
    </p>

    {{-- 本文 --}}
    <div class="bg-white shadow-md rounded-lg p-6 mb-6 border border-gray-200">
        <p class="text-gray-700 leading-relaxed">{{ $post->message }}</p>
    </div>

    {{-- アクションボタン --}}
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('posts.edit', $post->id) }}" 
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded shadow">
           編集
        </a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" 
              onsubmit="return confirm('削除しますか？')">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow">
                削除
            </button>
        </form>

        <a href="{{ route('posts.index') }}" 
           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
           一覧へ戻る
        </a>
    </div>
</div>

</body>
</html>
