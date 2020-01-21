<?php
  session_start();

  $_SESSION = array();
  session_destroy();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Logout success</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
   <ul class="navi-top">
        <li><a href="./index.php" class="home">InfoCube</a></li>
        <li><a href="./login_form.php">ログイン</a></li>
    </ul>
    <div class="cube">
      <h2>ログアウトしました</h2>
      <p><a href="index.php">HOMEに戻る</a></p>
    </div>
  </body>
</html>
