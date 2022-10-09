<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/index.css" rel="stylesheet"> 
    <title>メインメニュー</title>
</head>
<body>
	<div class="wrapper">
		<section>
			<div class="">
				<a href="{{route('logout')}}" class="btn btn-primary" style="margin:20px;">ログアウト</a>
			</div>
			<div>
				@if ($logflg)
					<div class="flash_message">
						<div class="alert alert-success">{{session('flash_message')}}</div>
					</div>
				@php $_SESSION["logflg"] = false; @endphp
				@endif
			</div>
		</section>
		<hr>
		<section>
			<div class="index_image">
				<img src="./image/index_image.png" alt="">
			</div>
		</section>
		<hr>
		<section class="index_menu">
			<div><a href="{{route('index')}}"><img src="./image/tangocho.jpg" alt="" ></a></div>
			<div><a href="#"><img src="./image/ryorisyasin.jpg" alt="" ></a></div>
			<div><a href="{{route('createUser')}}"><img src="./image/sinkiuser.jpg" alt="" ></a></div>
		</section>
		<hr>
		<section>
			<div>その他ITニュースサイト</div>
			<ul>
				<li><a href="https://gigazine.net/?fbclid=IwAR2UKH5ECQHzF0LCDCVIWoVA_ovM9UshTPo3kq9QjaICPTejqCCX8GcxQNo">GIGAZIN</a></li>
				<li><a href="https://atmarkit.itmedia.co.jp/">@IT</a></li>
			</ul>
			<div><a href="">お問い合わせ</a></div>
		</section>
	</div>
</body>
</html>