<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>トップページ</h1>
    @if ($errors->any())
        <ul>
            @forelse ($errors->all() as $error)
                <li>{{$error}}</li>
            @empty

            @endforelse
        </ul>
    @endif

    <form action="/info" method="POST">
    @csrf
        氏名<br>
        <input type="text" name="name"><br>
        メールアドレス<br>
        <input type="email" name="email"><br>

        <button>送信する</button>
    </form>
</body>
</html>
