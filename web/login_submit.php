<?php
session_start();

if(isset($_GET["username"]) && isset($_GET["passwd"])){
    $username = $_GET["username"];
    $passwd = $_GET["passwd"];
    
    $pdo = new PDO("sqlite:./SQL/infocube.sqlite");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $st = $pdo->prepare("select * from user where username=? or password=?;");
    $st->execute(array($username, $passwd));
    $user_on_db = $st->fetch();
    
    if ($username != $user_on_db["username"]){
        $result = "指定したユーザが存在しません。";
    }
    else if($passwd == $user_on_db["password"]){
        $_SESSION["user"] = $username;
        $result = "ようこそ" . $username . "さん。ログインに成功しました。";
    }else{
        $result = "パスワードが違います。";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login success</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
   <ul class="navi-top">
        <li><a href="./index.php" class="home">InfoCube</a></li>
        <li><a href="./cube-list.php">My Cube 一覧</a></li>
    </ul>
    <div class="cube">
        <h2><?php print $result; ?></h2>
        <p><a href="index.php">HOMEに戻る</a></p>
    </div>
</body>

</html>