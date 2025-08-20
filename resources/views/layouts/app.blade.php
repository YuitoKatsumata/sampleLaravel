{{-- 全てのページのベースとなるレイアウトファイル --}}

<!DOCTYPE html>
{{-- このページの主要言語が日本語であることを示します --}}
<html lang="ja">
<head>
    {{-- 文字エンコーディングをUTF-8に設定します --}}
    <meta charset="UTF-8">
    {{-- レスポンシブデザインのためのビューポート設定です --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- ページのタイトルを設定します。 --}}
    {{-- @yield('title', '...') は、子ビューで @section('title', '...') が定義されていればその内容を、 --}}
    {{-- 定義されていなければデフォルト値 'Laravel App' を表示します。 --}}
    <title>@yield('title', 'Laravel App')</title>

    {{-- Viteを使ってコンパイルされたCSS/JSファイルを読み込みます。 --}}
    {{-- Laravel 9以降の標準的なアセット管理方法です。 --}}
    @vite('resources/css/app.css')
</head>
{{-- bodyタグにTailwind CSSのユーティリティクラスを適用して、基本的なスタイルを設定しています --}}
{{-- bg-gray-100: 背景色を薄いグレーに --}}
{{-- text-gray-800: テキストの色を濃いグレーに --}}
{{-- min-h-screen: 最小の高さを画面の高さに --}}
{{-- p-6: 全方向にパディングを適用 --}}
<body class="bg-gray-100 text-gray-800 min-h-screen p-6">

    {{-- コンテンツを中央に配置し、最大幅を設定するコンテナ --}}
    <div class="max-w-4xl mx-auto">
        {{-- セッションに 'success' キーでメッセージが保存されている場合に表示します --}}
        {{-- 主にリダイレクト後の成功メッセージ表示に使用されます --}}
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- メインコンテンツのプレースホルダー。 --}}
        {{-- このレイアウトを継承する子ビューは、@section('content') ... @endsection の中に --}}
        {{-- 独自のコンテンツを記述することで、この部分に内容を挿入します。 --}}
        @yield('content')
    </div>

</body>
</html>
