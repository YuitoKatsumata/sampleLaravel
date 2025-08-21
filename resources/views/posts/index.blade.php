{{-- 投稿一覧ページ --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    {{-- ページタイトル --}}
    <h1 class="text-2xl font-bold mb-6">投稿一覧</h1>

    {{-- 新規投稿ボタン --}}
    <div class="mb-4">
        <a href="{{ route('posts.new') }}" 
           class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
           新規投稿
        </a>
    </div>

    {{-- 投稿カード一覧 --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <div class="bg-white shadow rounded-lg p-4">
                <td>
                    @if ($post->image)
                        <img 
                            src="{{ asset('storage/' . $post->image) }}" 
                            class="w-100 h-50 object-cover rounded cursor-pointer" 
                            onclick="openModal('{{ asset('storage/' . $post->image) }}')"
                            alt="投稿画像">
                    @endif
                </td>

                {{-- タイトル --}}
                <h2 class="text-lg font-semibold mb-2">{{ $post->name }}</h2>

                {{-- 投稿日 --}}
                <p class="text-sm text-gray-500 mb-4">
                    投稿日: {{ $post->created_at->format('Y-m-d') }}
                </p>

                {{-- 本文（抜粋） --}}
                <p class="text-gray-700 mb-4">
                    {{ Str::limit($post->message, 80, '...') }}
                </p>

                {{-- アクションボタン --}}
                <div class="flex space-x-2">
                    <a href="{{ route('posts.show', $post->id) }}" 
                       class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                       詳細
                    </a>
                    <a href="{{ route('posts.edit', $post->id) }}" 
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                       編集
                    </a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('削除しますか？')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                            削除
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $posts->links('pagination::tailwind') }}
    </div>
</div>
@endsection
