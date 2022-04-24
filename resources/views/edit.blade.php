<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        function kakunin(frm){
        flag = confirm("本当に削除しますか?");
        return flag;
        }
    </script>
    <title>編集</title>
</head>
<body>
    <div>
        <h3>編集・削除</h3>
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
   
    <form action="{{route('stor_dest')}}" method="post">
        @csrf
    @foreach ($tango_list as $item)
    <div>
        単語：
        <br>
        <input type="text" name="newtango" value="{{$item->tango}}">
        <br>
        意味：
        <br>
        <input type="text" name="newsetumei" value="{{$item->setumei}}">
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
        <a href="{{route('index')}}" class="btn btn-primary" style="margin:20px;">戻る</a>
    </div>
</body>
</html>