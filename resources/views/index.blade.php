<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="./css/kyotusmall.css" rel="stylesheet"> 
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <title>単語帳</title>
</head>
<body class="">
        <header class="header">
                            
            <div class="ml-48">
                <div>
                    単語検索
                    
                    <hr>
                </div>
                
                    <form action="{{route('seach')}}" method="get">
                        <div class="">
                            <input
                            class="border-solid border-2" name="seach_input">
                            <input type="submit" formaction="{{route('seach')}}" value="検索" class="">
                        </div>
                    </form>
                    <hr>
                <div class="col-sm-12">
                    <a href="{{route('create')}}" class="btn btn-primary" style="margin:20px;">新規登録</a>
                    <a href="{{route('logout')}}" class="btn btn-primary" style="margin:20px;">ログアウト</a>
                </div>
                <div>
                    @if($flag)
                    <button type="button" onClick="history.back()">戻る</button>
                    {{$flag = false;}} 
                    @endif
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
                                <div class="alert alert-warning">
                                    {{ session('message') }}
                                </div>
                            </div>
                        </div>
                        @endif
                <div class="content">
                    
                        <div class="container mx-auto">
                            <form action="" method="post">
                                @csrf
                                <table class="border-solid border-2 border-gray-300 ">
                                    <thead class="text-2xl font-bold">
                                        <tr>
                                            <td class="border-solid border-2 border-gray-300">単語</td>
                                            <td class="border-solid border-2 border-gray-300">説明</td>
                                            {{-- <td class="border-solid border-2 border-gray-300">調べ回数</td> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="text-lg">
                                        @foreach($tango_list as $item)
                                        <tr class="border-solid border-2 border-gray-300">
                                            <td class="border-solid border-2 border-gray-300">{{$item->tango}}</td>
                                            <td class="border-solid border-2 border-gray-300">{{$item->setumei}}</td>
                                            {{-- <td class="border-solid border-2 border-gray-300">{{$item->kaisu}}</td> --}}
                                            <td><a href="./edit/{{$item->id}}" class="btn btn-primary btn-sm">編集</a></td>
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