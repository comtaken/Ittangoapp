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
}
