<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KosikikaisetuController extends Controller
{
     //一覧表示
    public function index()
    {
        session_start();
        if (!isset($_SESSION["login"])) {
            return redirect('login')->with('flash_message', 'ログインしてください。');
        }
        return view('kosikikaisetu.index');
    }
}
