<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
        <link rel="stylesheet" href="{{asset('/css/style.css')}}">
        <title>COACHTECH</title>
    </head>
    <body>
        <div class="main">
            <p class="title">Todo List</p>
            @if ($errors->any())
                <ul>
                    @forelse ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @empty

                    @endforelse
                </ul>
            @endif

            <form action="/todo/create" method="POST" class="main__add--form">
                @csrf
                <input type="text" name="content" class="input-add">
                <input type="submit" value="追加" class="submit-add">
            </form>

            <table>
                <tr>
                    <div class="wrapper--tr">
                        <th>作成日</th>
                        <th>タスク名</th>
                        <th>更新</th>
                        <th>削除</th>
                    </div>
                </tr>
                @forelse ($todos as $todo)
                    <tr>
                        <td>{{$todo->created_at}}</td>
                        <form action="/todo/update?id={{$todo->id}}" method="POST">
                            @csrf
                            <td>
                                <input type="text" name="content" value="{{$todo->content}}" class="input-update">
                            </td>
                            <td>
                                <input type="submit" value="更新" class="submit-update">
                            </td>
                        </form>
                        <form action="/todo/delete?id={{$todo->id}}" method="POST">
                            @csrf
                            <td>
                                <input type="submit" value="削除" class="submit-delete">
                            </td>
                        </form>
                    </tr>
                @empty

                @endforelse
            </table>
        </div>
    </body>
</html>
