<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="./css/kyotumain.css" rel="stylesheet"> 
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <title>単語帳</title>
</head>
<body class="">
        <header class="header" style="padding-left: 0px;padding-bottom: 0px;padding-right: 0px;padding-top: 0px;">
                            
            <div class="ml-48">
                <div>
                    単語検索
                    
                    <hr>
                </div>
                
                <form action="{{route('seach')}}" method="get">
                    <div class="">
                        <input
                        class="border-solid border-2" name="seach_input" required="required">
                        <input type="submit" formaction="{{route('seach')}}" value="検索" class="" >
                    </div>
                </form>
                    <hr>
                <div class="">
                    <a href="{{route('logout')}}" class="btn btn-primary" style="margin:20px;">ログアウト</a>
                </div>
                <div>
                    <a href="{{route('createUser')}}" class="btn btn-primary" style="margin:20px;">ユーザ新規登録</a>
                </div>
            
                <div>
                    <a href="{{route('main')}}" class="btn btn-primary" style="margin:20px;">メインメニューへ</a>
                    {{-- @if($flag)
                    <button type="button" onClick="history.back()">戻る</button>
                    {{$flag = false;}} 
                    @endif --}}
                </div>
            </div>
        </header>
        <section class="wrapper2">
            <div class="container2">
                @if ($errors->any())
                        <div class="">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-600">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (session('message'))
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="text-red-600">
                                    {{ session('message') }}
                                </div>
                            </div>
                        </div>
                        @endif
                <div class="content">
                    
                        <div class="scroll container mx-auto">
                            <form action="" method="post">
                                @csrf
                                <table class="border-solid border-2 border-gray-300 ">
                                    <thead class="text-2xl font-bold">
                                        <tr>
                                            <th class="th1 border-solid border-2 border-gray-300">単語</th>
                                            <th class="th2 border-solid border-2 border-gray-300">説明</th>
                                            <th class="th3 border-solid border-2 border-gray-300">操作</th>
                                            {{-- <td class="border-solid border-2 border-gray-300">調べ回数</td> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="tbody_itg">
                                        @foreach($tango_list as $item)
                                        <tr class="border-solid border-2 border-gray-300">
                                            <td class="td1 border-solid border-2 border-gray-300">{{$item->tango}}</td>
                                            <td class="td2 border-solid border-2 border-gray-300">{{$item->setumei}}</td>
                                            {{-- <td class="border-solid border-2 border-gray-300">{{$item->kaisu}}</td> --}}
                                            <td class="td3"><a href="./edit/{{$item->id}}" class="btn btn-primary btn-sm">編集</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    <hr>
                </div>
            </div>
        </section>
</body>
</html>