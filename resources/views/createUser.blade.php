<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>ユーザ新規登録</title>
</head>
<body>
    <h3>ユーザ新規登録</h3>
    <div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
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
            <a href="{{route('login')}}" class="btn btn-primary" style="margin:20px;">戻る</a>
        </div>
    </form>
</body>
</html>