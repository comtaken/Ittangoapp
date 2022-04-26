<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> 
    <title>新規登録</title>
</head>
<body class="bg-red-50">
    <div>
        <h3>新規登録</h3>
    </div>
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
    <form action="{{route('store')}}" method="post">
        @csrf
    <div>
        単語：
        <br>
        <input type="text" name="newtango">
        <br>
        説明：
        <br>
        <input type="text" name="newsetumei">
        <br>
        <br>
        <input type="submit" value="新規登録">
    </div>
    </form>
    <div class="col-sm-12">
        <a href="{{route('index')}}" class="btn btn-primary" style="margin:20px;">戻る</a>
    </div>
</body>
</html>