<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet">
    <link href="./css/kyotumain.css" rel="stylesheet"> 
    <title>メインメニュー</title>
</head>
<body>
    @if (isset($message))
                <div class="alert alert-danger">
                    <ul>
                        <li class="text-green-400">{{ $message}}</li>
                    </ul>
                </div>
            @endif
    <a href="{{route('index')}}"></a>
</body>
</html>