<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * 認証機能
 * ・ログイン
 * ・ログアウト
 * 
 */
class AuthCountroller extends Controller
{
    //ログイン画面表示
    public function login()
    {
        
        return view('login');
    }

    //ログイン処理
    public function auth(Request $request)
    {
        $validated = $request->validate([
            'email'=>'required',
            'password' => 'required',
        ],
        [
            'email.required'=>'メールアドレスをを入力して下さい。', 
            'password.required'=>'パスワードを入力して下さい。', 
            
        ]);
        
        return view('index');
    }

    //新規ユーザ登録画面表示
    public function createUser()
    {
        return view('createUser');
    }

    //新規ユーザ登録処理
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'email'=>'required',
            // 'password' => ['required','alpha_num',],
            'password' => 'alpha_dash',
        ],
        [
            'email.required'=>'メールアドレスをを入力して下さい。', 
            'password.required'=>'パスワードを入力して下さい。', 
            
        ]);
        
        //TODO: validation半角英数字記号バリデーション作成
        //$users = User::all();
        dd($validated);
    }
}
