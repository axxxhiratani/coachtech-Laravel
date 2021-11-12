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
            <form action="" method="POST" class="main__add--form">
                <input type="text" name="input-add" class="input-add">
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
                <tr>
                    <td>laravelの値-created_at</td>
                    <form action="" method="POST">
                        <td>
                            <input type="text" value="laravelの値-content" class="input-update">
                        </td>
                        <td>
                            <input type="submit" value="更新" class="submit-update">
                            <input type="hidden" name="" id="">
                        </td>
                    </form>
                    <form action="" method="POST">
                        <td>
                            <input type="submit" value="削除" class="submit-delete">
                            <input type="hidden" name="" id="">
                        </td>
                    </form>
                </tr>
            </table>
        </div>
    </body>
</html>
