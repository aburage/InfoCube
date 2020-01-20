<?php
function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }
session_start();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>InfoCube</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <ul class="navi-top">
        <li><a href="./index.php" class="home">InfoCube</a></li>
        <li><a href="./cube-list.php">My Cube 一覧</a></li>
    </ul>

    <p class="page-title">My Cube 追加：スケジュール</p>

    <?php
        if(isset($_GET['cube_name'])) $cube_name=$_GET['cube_name']; 
        if(isset($_GET['move'])) $move=$_GET['move']; 
        if(isset($_GET['day'])) $day=$_GET['day']; 

        $db = new PDO("sqlite:SQL/infocube.sqlite");
        $user_name = $_SESSION["user"];
        if(isset($cube_name) && isset($move) && isset($day)){
            $db->query("insert into cube values('$user_name', null, '$cube_name', 'schedule', '$move', '$day', 0, 10, 0);");
            print "<h3 style='text-align: center; color: #935;'>送信されました</h3>";
        }
    ?>

    <form action=new-schedule.php method="get">
        <p class="form-title">Cubeの名前</p>
        <div class="cubeform-contents">
            <input class="left" name="cube_name">
        </div>

        <p class="form-title">Cubeの動き</p>
        <div class="cubeform-contents">
            <img src="./images/icon_straight.png" width="100px" class="left">
            <img src="./images/icon_repeat.png" width="100px">
            <img src="./images/icon_round.png" width="100px">
            <img src="./images/icon_slide.png" width="100px">
            <img src="./images/icon_swing.png" width="100px">
            <br>
            <input type="radio" name="move" value="1" class="left">STRAIGHT
            <input type="radio" name="move" value="2">REPEAT
            <input type="radio" name="move" value="3">ROUND
            <input type="radio" name="move" value="4">SLIDE
            <input type="radio" name="move" value="5">SWING
        </div>

        <p class="form-title">日付</p>
        <div class="cubeform-contents">
            <input type="date" class="left" name="day">
        </div>

        <div class="event-submit-section">
            <input type="submit" class="event-submit-button left" value="保存">
        </div>
    </form>
    
    <div class="add-event-section">
        <a href="index.php" class="add-event-button">HOMEに戻る</a>
    </div>

</body>

</html>