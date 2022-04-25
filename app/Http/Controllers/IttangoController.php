<?php

namespace App\Http\Controllers;

use Debugbar;
use App\Models\Models\Ittango;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class IttangoController extends Controller
{
    //一覧表示
    public function index()
    {
        $tango_list = Ittango::all();
        return view('index',compact('tango_list'));
    }

    //検索処理
    public function seach(Request $request)
    {
        $validated = $request->validate([
            'seach_input'=>'required',
        ],
        [
            'seach_input.required'=>'検索文字を入力して下さい。', 
        ]);
        $input = $request->input('seach_input');
        if(isset($input))
        {
            $tango_list = Ittango::select('*')->where('tango','like',"%$input%")->get();

            return view('index',compact('tango_list'));
        }

        
    }

    //新規登録画面へ
    public function create()
    {
        return view('create');
    }

    //新規登録処理
    public function store(Request $request)
    {
        
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
        $tango_list->kaisu = 0;
        $tango_list->save();
        
        //ToDo 違う方法で二重送信回避したい
        header('Location: ./index');
		exit;
        return $this->index();
    }


        // 編集表示
        // 編集画面にボタン作成（戻る、削除）
        // 「削除してよろしいですか？」確認
    public function edit(Request $request)
    {
        $id = $request->id;

        $tango_list = Ittango::where('id',$id)->get();
        
        return view('edit',compact('id','tango_list'));
    }
        
    // 編集、削除処理
    public function up_dest(Request $request)
    {
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
            Ittango::where('id',$request->id)->update([
                'tango'=>$request->newtango,
                'setumei'=>$request->newsetumei,
            ]);
            
        }

        //削除処理
        if($request->has('destroy'))
        {
            $tango_list = Ittango::find($request->id)->get();
            if($tango_list !== null)
            {
                $tango_list = Ittango::find($request->id)->delete();
            }
        }

        //ToDo 違う方法で二重送信回避したい
        header('Location: ./index');
		exit;
        return $this->index();
    }

}
