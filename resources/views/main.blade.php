<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/kyotumain.css" rel="stylesheet"> 
    <title>メインメニュー</title>
</head>
<body>
    <section class="wrapper">
        <div class="">
            <a href="{{route('logout')}}" class="btn btn-primary" style="margin:20px;">ログアウト</a>
        </div>
        <div class="container">
            @if ($logflg)
                <div class="flash_message">
                    <div class="alert alert-success">{{session('flash_message')}}</div>
                </div>
            @php $_SESSION["logflg"] = false; @endphp
            @endif
            <div class="content">
            <table>
                <tr>
                    <td>
                        <a href="{{route('index')}}"><img src="./image/tangocho.jpg" alt="" width="150" height="150"></a>
                    </td>
                    <td>
                        <a href="#"><img src="./image/ryorisyasin.jpg" alt="" width="150" height="150"></a>
                    </td>
                </tr>
            </table>
            </div>
        </div>
    </section>
</body>
</html>