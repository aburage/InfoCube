<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <ul class="navi-top">
        <li><a href="./index.php" class="home">InfoCube</a></li>
        <li><a href="./cube-list.php">My Cube 一覧</a></li>
    </ul>

    <p class="page-title">ログイン</p>
    <div class="login-form">
        <p class="form-title">ユーザ名とパスワードを入力してください</p>
        <form action="login_submit.php" method="get">
            <div class="login-contents">
                ユーザ名：<input type="text" name="username">
            </div>

            <p class="form-title">パスワード</p>
            <div class="login-contents">
                パスワード：<input type="password" name="password">
            </div>
            <div class="login-submit-section">
                <input type="submit" class="login-submit-button" value="送信">
            </div>
        </form>
    </div>
</body>

</html>