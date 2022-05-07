<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="./css/kyotusmall.css" rel="stylesheet">
    <title>ログインページ</title>
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
                <h3>ログイン</h3>
                <form action="{{route('auth')}}" method="post">
                    @csrf
                    <div class="">
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
                        <input type="submit" value="ログイン">
                    </div>
                    <br>
                    <div>
                        <a href="{{route('createUser')}}" class="btn btn-primary" style="margin:20px;">ユーザ新規登録</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>