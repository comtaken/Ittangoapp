<?php

namespace App\Http\Controllers;

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
            'newsetumei.required'=>'意味を入力してください。',
        ]);

        $tango_list = new Ittango;
        $tango_list->tango = $request->input('newtango');
        $tango_list->setumei = $request->input('newsetumei');
        $tango_list->kaisu = 0;
        $tango_list->save();

        return $this->index();
    }


        // ToDo 詳細画面作成
        // 詳細表示
        // 詳細画面にボタン作成（戻る、削除）
        // 「削除してよろしいですか？」確認
    public function syosai(Request $request)
    {
        dd($request->id);
    }
        

    // //削除処理
    // public function destroy(Request $request)
    // {
        
    // }













}
