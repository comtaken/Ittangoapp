<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/kyotumain.css" rel="stylesheet"> 
    <script type="text/javascript">
        function kakunin(frm){
        flag = confirm("本当に削除しますか?");
        return flag;
        }
    </script>
    <title>編集</title>
</head>
<body class="">
    <section class="wrapper">
        <div class="container">
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
            <div class="content">
                <div>
                    <h3>編集・削除</h3>
                </div>
                
                <form action="{{route('up_dest')}}" method="post">
                    @csrf
                @foreach ($tango_list as $item)
                <div>
                    単語：
                    <br>
                    <input class="border-solid border-2" type="text" name="newtango" value="{{$item->tango}}">
                    <br>
                    説明：
                    <br>
                    <textarea class="border-solid border-2" name="newsetumei" id="" cols="60" rows="7" value="{{$item->setumei}}">{{$item->setumei}}</textarea>
                    <br>
                    <br>
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="submit" name="store" value="編集完了">
                    <br>
                    <br>
                    <input type="submit" name="destroy" value="削除" onClick="return kakunin(this.form);">
                </div>
                @endforeach
                </form>
                <br>
                <div class="col-sm-12">
                    <button type="button" onClick="history.back()">戻る</button>
                </div>
            </div>
        </div>
    </section>
</body>
</html>