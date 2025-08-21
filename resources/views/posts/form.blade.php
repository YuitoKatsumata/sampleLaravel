{{-- 新規投稿ページ --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-xl">
    {{-- ページタイトル --}}
    <h1 class="text-2xl font-bold mb-6">新規投稿</h1>

    {{-- 作成フォーム --}}
    <form action="{{ route('posts.create') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf

        {{-- 名前 --}}
        <div>
            <label for="name" class="block text-sm font-medium mb-1">名前</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        {{-- メッセージ --}}
        <div>
            <label for="message" class="block text-sm font-medium mb-1">メッセージ</label>
            <textarea name="message" id="message" rows="6" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">{{ old('message') }}</textarea>
        </div>

        {{-- ファイルアップロード欄 --}}
        <div>
            <label for="image" class="block text-sm font-medium mb-1">画像</label>
            <input type="file" name="image" id="image" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            {{-- プレビュー表示 --}}
            <div class="mt-2">
                <img id="preview" src="" alt="画像プレビュー" class="w-40 h-40 object-cover rounded border hidden">
            </div>
        </div>

        {{-- ボタン --}}
        <div class="flex space-x-2">
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                投稿
            </button>
            <a href="{{ route('posts.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
               戻る
            </a>
        </div>
    </form>
</div>

<script>
// DOM要素を取得
const imageInput = document.getElementById('image');
const previewImage = document.getElementById('preview');

// ファイル入力が変更されたときのイベントリスナーを設定
imageInput.addEventListener('change', function(e) {
    // 選択されたファイルを取得
    const file = e.target.files[0];
    // ファイルが選択されていない場合は処理を終了
    if (!file) return;

    // FileReaderオブジェクトを作成してファイルを読み込む
    const reader = new FileReader();

    // ファイルの読み込みが完了したときの処理
    reader.onload = function(e) {
        // プレビュー画像のsrcに読み込んだデータ（Data URL）を設定
        previewImage.src = e.target.result;
        // hiddenクラスを削除してプレビュー画像を表示
        previewImage.classList.remove('hidden');
    }
    // ファイルをData URLとして読み込む
    reader.readAsDataURL(file);
});
</script>
@endsection
