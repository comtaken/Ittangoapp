<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>単語帳</title>
</head>

<body class="bg-yellow-50 container screen">
    <header class="m-16">
        <div class="text-4xl align-top">
            <h4>単語検索</h4>
        </div>
    </header>
    <main class="flex justify-center">
        <form action="{{route('seach')}}" method="get">
            <div class="my-1">
                <input
                class="flex justify-center marker:focus:outline-none focus:shadow-outline focus:border-blue-300" name="seach_input">
                <input type="submit" value="検索" class="bg-indigo-500 font-semibold text-white py-2 px-12 rounded">
            </div>
        </form>
        <br>
        <div>
            <table class="border-solid border-2 border-gray-300">
                <thead class="text-2xl font-bold">
                    <tr>
                        <td class="border-solid border-2 border-gray-300">単語</td>
                        <td class="border-solid border-2 border-gray-300">説明</td>
                        <td class="border-solid border-2 border-gray-300">調べ回数</td>
                    </tr>
                </thead>
                <tbody class="text-lg">
                    @foreach($tango_list as $item)
                    <tr class="border-solid border-2 border-gray-300">
                        <td class="border-solid border-2 border-gray-300">{{$item->tango}}</td>
                        <td class="border-solid border-2 border-gray-300">{{$item->setumei}}</td>
                        <td class="border-solid border-2 border-gray-300">{{$item->kaisu}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>

</body>

</html>