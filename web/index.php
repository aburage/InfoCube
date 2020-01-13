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
        <li><a href="./login_form.php">ログイン</a></li>
    </ul>

    <p class="page-title">HOME</p>

    <div class="display-if-disconnected">
        <button id="connect">connect to cube</button>
    </div>

<!--
    <div class="display-if-connecting center">
        connecting ...
    </div>
-->
    
    <div class="display-if-connected">


    <?php
    function h($str){
        return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
    }

    if(isset($_GET['cube_number'])) $cube_number=$_GET['cube_number']; 
    if(isset($_GET['cube_name'])) $cube_name=$_GET['cube_name']; 
    if(isset($_GET['tag'])) $tag=$_GET['tag']; 
    if(isset($_GET['start_movement'])) $start_movement=$_GET['start_movement']; 
    if(isset($_GET['middle_movement'])) $middle_movement=$_GET['middle_movement']; 
    if(isset($_GET['end_movement'])) $end_movement=$_GET['end_movement'];
    if(isset($_GET['date'])) $date=$_GET['date']; 
    if(isset($_GET['time'])) $type=$_GET['time']; 

    $db = new PDO("sqlite:infocube.sqlite");
    $result=$db->query("select * from cube");
        for($i = 0; $row=$result->fetch(); ++$i ){
            echo "<div class='card'>";
            if (strcmp(h($row['tag']), 'data') == 0){
                echo "<img src='./images/weather.png' class='card-image'>";
            }else{
                echo "<img src='./images/notification.png' class='card-image'>";
            }
            echo "<div class='card-content'>";
            echo "<h2>". h($row['cube_name']). "</h2>";
            echo "<p>". h($row['date']). "</p>";
            echo '<button class="straight">動きを確認</button>';
            echo "</div></div>";
        }
    ?>

    <div class="card">
        <img src="./images/weather.png" alt="天気" class="card-image">
        <div class="card-content">
            <h2>My Cube 1</h2>
            <p>現在の天気（東京）</p>
            <button class="straight">動きを確認</button>
        </div>
    </div>

    <div class="add-event-section">
        <a href="new-cube.php" class="add-event-button">My Cube 追加</a>
    </div>
    </div>
    
    <script src="./toio/dist/main.js" type="module"></script>
</body>

</html>
