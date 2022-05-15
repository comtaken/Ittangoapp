<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/kyotumain.css" rel="stylesheet">
    <title>ユーザ新規登録</title>
</head>
<body>
    
    <section class="wrapper">
        <div class="container">
            @if (isset($message))
            <div class="alert alert-danger">
                <ul>
                    <li class="text-green-400">{{ $message}}</li>
                </ul>
            </div>
            @endif
            @if (session('flash_message'))
                <div class="text-red-600">
                    {{ session('flash_message') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="content">
                <h3>ユーザ新規登録</h3>
                <form action="{{route('storeUser')}}" method="post">
                    @csrf
                    <div>
                        ユーザー名:
                    </div>
                    <div>
                        <input class="border-solid border-2" type="text" name="name">
                    </div>
                    <div>
                        E-mail:
                    </div>
                    <div>
                        <input class="border-solid border-2" type="text" name="email">
                    </div>
                    <div>
                        password:
                    </div>
                    <div>
                        <input class="border-solid border-2" type="text" name="password">
                    </div>
                    <div>
                        <input type="submit" value="ユーザ登録">
                    </div>
                    <br>
                    <div>
                    <button type="button" onClick="history.back()">戻る</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>