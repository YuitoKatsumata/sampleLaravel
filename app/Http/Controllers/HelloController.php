<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    /**
     * シンプルな "Hello, World!" メッセージを表示します。
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $message = "Hello, World!";
        return view("hello", compact('message'));
    }

    /**
     * URLパスから受け取った名前と年齢を使って挨拶メッセージを表示します。
     *
     * @param string $name ユーザー名
     * @param int $age ユーザーの年齢
     * @return \Illuminate\View\View
     */
    public function greet($name, $age) {
        $message = 'Hello , ' . ucfirst($name) . "! You are ". $age . " years old.";
        return view("hello", compact('message'));
    }

    /**
     * リクエストのクエリパラメータから名前と年齢を取得して挨拶メッセージを表示します。
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function queryHello(Request $request) {
        $name = $request->query('name', 'Guest');
        $age = $request->query('age', 'unknown');

        $message = 'Hello, ' . ucfirst($name) . "! You age " . $age . '.';
        return view('hello', compact('message'));
    }

    /**
     * POSTでデータを送信するためのフォームを表示します。
     *
     * @return \Illuminate\View\View
     */
    public function showForm() {
        return view('post_hello');
    }

    /**
     * POSTでフォームから送信されたデータを処理し、挨拶メッセージを表示します。
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function handleForm(Request $request) {
        // バリデーション（おまけ）
        $request->validate([
            'name' => 'required|string|max:50',
            'message' => 'required|string|max:255',
        ]);

        // DBに保存
        Post::create([
            'name' => $request->input('name'),
            'message' => $request->input('message'),
        ]);

        return "保存しました！";
    }

    /**
     * バリデーションを行う入力フォームを表示します。
     *
     * @return \Illuminate\View\View
     */
    public function showValidateForm() {
        return view('hello.validate_form');
    }

    /**
     * フォームから送信されたデータをバリデーションします。
     * バリデーションが成功した場合は結果を表示し、失敗した場合はフォームにエラーメッセージと共にリダイレクトします。
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function handleValidateForm(Request $request) {
        // バリデーションルールの定義
        $rules = [
            'name' => 'required|string|min:1|max:50',
            'age' => 'required|integer|min:0' // 末尾の不要な'|'を削除
        ];

        // バリデーションエラーメッセージの定義
        $messages = [
            'name.required' => "名前は必須です。",
            'name.min' => "名前は１文字以上で入力してください",
            'name.max' => "名前は50文字以下で入力してください",
            'age.required' => "年齢は必須です。",
            'age.integer' => "年齢は整数で入力してください。",
            'age.min' => "年齢は0以上で入力してください",
        ];

        // Validatorインスタンスの作成
        $validator = Validator::make($request->all(), $rules, $messages);

        // バリデーションの実行と失敗時の処理
        if ($validator->fails()) {
            return redirect('validate-hello')
                ->withErrors($validator)
                ->withInput();
        }

        // バリデーション成功時の処理
        return view('hello.validate_result', [
            'name' => $request->input('name'),
            'age' => $request->input('age')
        ]);
    }
}
