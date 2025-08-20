@extends('layouts.app')

@section('title', '投稿一覧')

@section('content')
<h1 class="text-2xl font-bold mb-4">投稿一覧</h1>

<a href="{{ route('posts.new') }}" class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
    新規投稿
</a>

<table class="min-w-full bg-white shadow rounded overflow-hidden">
    <thead class="bg-gray-200">
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">名前</th>
            <th class="px-4 py-2">メッセージ</th>
            <th class="px-4 py-2">投稿日時</th>
            <th class="px-4 py-2">操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $post->id }}</td>
                <td class="px-4 py-2">{{ $post->name }}</td>
                <td class="px-4 py-2">{{ $post->message }}</td>
                <td class="px-4 py-2">{{ $post->created_at->format('Y-m-d H:i') }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">詳細</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-500 hover:underline">編集</a>
                    <form action="/posts/{{ $post->id }}" method="post" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline"
                            onclick="return confirm('本当に削除しますか？');">
                            削除
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
