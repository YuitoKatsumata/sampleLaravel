<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index() {
        $message = "Hello, World!";
        return view("hello", compact('message'));
    }

    public function greet($name, $age) {
        $message = 'Hello , ' . ucfirst($name) . "! You are ". $age . " years old.";
        return view("hello", compact('message'));
    }

    public function queryHello(Request $request) {
        $name = $request->query('name', 'Guest');
        $age = $request->query('age', 'unknown');

        $message = 'Hello, ' . ucfirst($name) . "! You age " . $age . '.';
        return view('hello', compact('message'));
    }

    // フォームを表示
    public function showForm() {
        return view('post_hello');
    }

    // POSTで送られたデータを処理
    public function handleForm(Request $request) {
        $name = $request->input('name', 'Guest');
        $age = $request->input('age', 'unknown');

        $message = "Hello, " . ucfirst($name) . "! You are " . $age . " years old.";
        return view('post_hello', compact('message'));
    }
}
