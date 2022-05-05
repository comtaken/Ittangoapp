<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\AlphaRule;
use Illuminate\Support\Facades\DB;

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
        //ログインinputバリデーション
        $validated = $request->validate([
            'email'=>'required',
            'password' => ['required','min:8','max:100',new AlphaRule],
        ],
        [
            'email.required'=>'メールアドレスをを入力して下さい。', 
            'password.required'=>'パスワードを入力して下さい。', 
            'password.min'=>'パスワードは８文字以上で入力してください。',
            'password.max'=>'パスワードは１００文字以内で入力してください。',
        ]);

        $result = false;



        if($result)
        {
            return redirect()->route('index');
        }else{
            //TODO: ログイン失敗しました。の画面に遷移
            return view('error.errorLogin');
        }
        
    }

    //新規ユーザ登録画面表示
    public function createUser()
    {
        return view('createUser');
    }

    //TODO: トランザクション入れる
    //新規ユーザ登録処理
    public function storeUser(Request $request)
    {
        

        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password' => ['required','min:8','max:100',new AlphaRule],
        ],
        [
            'name.required'=>'ユーザー名を入力してください',
            'email.required'=>'メールアドレスをを入力して下さい。', 
            'password.required'=>'パスワードを入力して下さい。', 
            'password.min'=>'パスワードは８文字以上で入力してください。',
            'password.max'=>'パスワードは１００文字以内で入力してください。',
        ]);
        
        DB::beginTransaction();

        try{
            if(isset($request->name) 
            && isset($request->email) 
            && isset($request->password))
            {
                $users = new User();
                $users->fill([
                'name'=>$request->name
                ,'email'=>$request->email
                ,'password'=>password_hash($request->password,
                PASSWORD_DEFAULT)
                ]);

                $users->save();

                DB::commit();

                $message = 'ユーザー登録完了しました。';

                return view('login',compact('message'));
                
            }
        //「\Exception」バックスラッシュを入れなければキャッチしない
        }catch(\Exception $e){
            DB::rollBack();
            return view('error.errorCreateUser');
        }   
    } 
}
