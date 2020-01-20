<?php
    session_start();

    if (isset($_GET["username"]) && isset($_GET["passwd"])){
        $username = $_GET["username"];
        $passwd = $_GET["passwd"];
        
        $pdo = new PDO("sqlite:./SQL/infocube.sqlite");
        $st = $pdo->prepare("select * from user where username='?'");
        $st->execute(array($username));
        $user_on_db = $st->fetch();
        
        if(!$user_on_db){
            $result = "指定されたユーザが存在しません";
        }else if($passwd == $_SESSION["passwd"]){
            $_SESSION["user"] = "username";
            $result = "ようこそ" . $username . "さん。ログインに成功しました。";
        }else{
            $result = "パスワードが違います。";
        }
    }
?>

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
                パスワード：<input type="password" name="passwd">
            </div>
            <div class="login-submit-section">
                <input type="submit" class="login-submit-button" value="送信">
            </div>
        </form>
    </div>
</body>

</html>