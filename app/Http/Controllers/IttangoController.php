<?php

namespace App\Http\Controllers;

use Debugbar;
use App\Models\Models\Ittango;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;


class IttangoController extends Controller
{
    //mainメニュー表示
    public function main()
    {
        session_start();
        try {
            $message = 'ログイン成功しました。';
            $logflg = $_SESSION['logflg'];
            session()->now('flash_message', $message);
            return view('main',['logflg'=>$logflg]);
        }catch(\Exception $e) {
            $_SESSION = array();
            return view('login');
        }
        
    }

    //一覧表示
    public function index()
    {
        session_start();
        if (!isset($_SESSION["login"])) {
            return redirect('login')->with('flash_message', 'ログインしてください。');
        }
        $flag = false;
        $tango_list = Ittango::all();
        return view('Ittangocho.index',compact('tango_list','flag'));
    }

    //検索処理
    public function seach(Request $request)
    {
        $flag = false;
        $validated = $request->validate([
            'seach_input'=>'required',
        ],
        [
            'seach_input.required'=>'検索文字を入力して下さい。', 
        ]);
        $input = $request->input('seach_input');
        if(isset($input))
        {
            $tango_list = Ittango::where('tango','like',"%$input%")->orderBy('tango', 'asc');
            //レコード１件でも取得でtrue
            $flag = $tango_list->exists();
            $tango_list = $tango_list->get();
            //取得レコード０件ならfalseのまま
            if(!$flag){
                return redirect('index')->with('message', '検索結果は０件です。');
            }
            return view('Ittangocho.index',compact('tango_list','flag'));
        }

        
    }

    //新規登録画面へ
    public function create()
    {
        return view('Ittangocho.create');
    }

    //新規登録処理
    public function store(Request $request)
    {
        session_start();
        if (!isset($_SESSION["login"])) {
            return redirect('login')->with('flash_message', 'ログインしてください。');
        }
        $vallidated = $request->validate([
            'newtango'=>'required',
            'newsetumei'=>'required',
        ],
        [
            'newtango.required'=>'単語を入力してください。',
            'newsetumei.required'=>'説明を入力してください。',
        ]);

        $tango_list = new Ittango;
        $tango_list->tango = $request->input('newtango');
        $tango_list->setumei = $request->input('newsetumei');
        //TODO: 参考記事の登録
        $tango_list->sankoukizi = "";
        $tango_list->save();
        
        //TODO: 違う方法で二重送信回避したい
        header('Location: ./index');
		exit;
        return $this->index();
    }


        // 編集表示
        // 編集画面にボタン作成（戻る、削除）
        // 「削除してよろしいですか？」確認
    public function edit(Request $request)
    {
        
        $tango_id = $request->tango_id;
        $tango_list = Ittango::where('tango_id',$tango_id)->get();
        
        return view('Ittangocho.edit',compact('tango_id','tango_list'));
    }
        
    // 編集、削除処理
    public function up_dest(Request $request)
    {
        session_start();
        if (!isset($_SESSION["login"])) {
            return redirect('login')->with('flash_message', 'ログインしてください。');
        }
        $validated = $request->validate([
            'newtango'=>'required',
            'newsetumei'=>'required',
        ],
        [
            'newtango.required'=>'単語を入力してください。',
            'newsetumei.required'=>'説明を入力してください。',
        ]);
        //編集処理
        if($request->has('store'))
        {
            Ittango::where('tango_id',$request->tango_id)->update([
                'tango'=>$request->newtango,
                'setumei'=>$request->newsetumei,
            ]);
            
        }

        //削除処理
        if($request->has('destroy'))
        {
            $tango_list = Ittango::find($request->tango_id)->get();
            
            if($tango_list !== null)
            {
                $tango_list = Ittango::find($request->tango_id)->delete();
            }
        }

        //ToDo 違う方法で二重送信回避したい
        header('Location: ./index');
		exit;
        return $this->index();
    }

}
