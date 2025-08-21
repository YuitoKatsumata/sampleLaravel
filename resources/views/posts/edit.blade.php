{{-- 投稿編集ページ --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-xl">
    {{-- ページタイトル --}}
    <h1 class="text-2xl font-bold mb-6">投稿編集</h1>

    {{-- 編集フォーム --}}
    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- タイトル --}}
        <div>
            <label for="name" class="block text-sm font-medium mb-1">名前</label>
            <input type="text" name="name" id="name" 
                   value="{{ old('name', $post->name) }}" 
                   class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        {{-- 本文 --}}
        <div>
            <label for="message" class="block text-sm font-medium mb-1">メッセージ</label>
            <textarea name="message" id="message" rows="6" 
                      class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">{{ old('message', $post->message) }}</textarea>
        </div>

        {{-- ファイルアップロード欄 --}}
        <div>
            <label for="image" class="block text-sm font-medium mb-1">画像</label>
            <input type="file" name="image" id="image" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            {{-- プレビュー表示 --}}
            <div class="mt-2">
                <img id="preview" 
                     src="{{ $post && $post->image ? asset('storage/' . $post->image) : '' }}" 
                     alt="画像プレビュー" 
                     class="w-40 h-40 object-cover rounded border {{ !($post && $post->image) ? 'hidden' : '' }}">
            </div>
        </div>

        {{-- ボタン --}}
        <div class="flex space-x-2">
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                更新
            </button>
            <a href="{{ route('posts.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
               戻る
            </a>
        </div>
    </form>
</div>

<script>
// DOMの読み込みが完了した後にスクリプトを実行し、堅牢性を高めます。
document.addEventListener('DOMContentLoaded', function () {
    // 必要なDOM要素を取得します。変数名をより具体的に変更しました。
    const imageInput = document.getElementById('image');
    const previewImage = document.getElementById('preview');

    // ファイル入力欄でファイルが選択されたときのイベントリスナーを設定します。
    imageInput.addEventListener('change', function(e) {
        // 選択されたファイルを取得します（最初のファイルのみ）。
        const file = e.target.files[0];
        
        // ファイルが選択されていない場合は、ここで処理を終了します。
        if (!file) {
            return;
        }

        // FileReaderオブジェクトを作成して、ファイルを読み込む準備をします。
        const reader = new FileReader();

        // ファイルの読み込みが完了したときに実行される処理です。
        reader.onload = function(e) {
            // 読み込んだ画像データをプレビュー用のimg要素のsrc属性に設定します。
            previewImage.src = e.target.result;
            // 画像が設定されたので、hiddenクラスを削除してプレビューを表示します。
            previewImage.classList.remove('hidden');
        }

        // 選択されたファイルをData URL形式で読み込みます。これにより、上記onloadイベントが発火します。
        reader.readAsDataURL(file);
    });
});
</script>
@endsection
