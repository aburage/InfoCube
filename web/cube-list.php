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
        <?php 
        if (isset($_SESSION["user"])){
            print '<li><a href="logout.php">ログアウト</a></li>';
        }else{
            print '<li><a href="./login_form.php">ログイン</a></li>';
        }
        ?>
    </ul>
    
    <p class="page-title">My Cube 一覧</p>
    <?php
    if (isset($_SESSION["user"])){
        print '<div class="login-now"><p>' . $_SESSION["user"] . 'としてログイン中</p></div>';
    }
    ?>
    <form action=cube-list.php method=get>
    <div class="filter">
        <select name="stag">
            <option value="all">全てのタグ</option>
            <option value="schedule">スケジュール</option>
            <option value="data">データ</option>
            <option value="feeling">フィーリング</option>
        </select>
        <input type=submit border=0 value="検索">
    </div>
    </form>
    
    <form action=cube-list.php method=get>
    <?php
    
    if (isset($_SESSION["user"])){
        
    if(isset($_GET['cube_number'])) $cube_number=$_GET['cube_number']; 
    if(isset($_GET['cube_name'])) $cube_name=$_GET['cube_name']; 
    if(isset($_GET['tag'])) $tag=$_GET['tag']; 
    if(isset($_GET['movement'])) $movement=$_GET['movement'];
    if(isset($_GET['date'])) $date=$_GET['date']; 
    if(isset($_GET['time'])) $type=$_GET['time']; 
    
    if(isset($_GET['stag'])) $stag=$_GET['stag']; 
        
    if(isset($_GET['deleteid'])) $deleteid=$_GET['deleteid'];

    $db = new PDO("sqlite:./SQL/infocube.sqlite");

    if($stag == "schedule"){
        $result=$db->query('select * from cube where tag = "schedule" and user_name="' . $_SESSION["user"] .'";');
    }else if($stag == "data"){
        $result=$db->query('select * from cube where tag = "data" and user_name="' . $_SESSION["user"] .'";');
    }else if($stag == "feeling"){
        $result=$db->query('select * from cube where tag = "feeling" and user_name="' . $_SESSION["user"] .'";');
    }else{
        $result=$db->query('select * from cube where user_name="' . $_SESSION["user"] .'";');
    }

    $db->query("delete from cube where cube_number ='$deleteid'");
    
        for($i = 0; $row=$result->fetch(); ++$i ){
            
            print "<div class='card'>";
            if (strcmp(h($row['tag']), 'data') == 0){
                print "<img src='./images/data.png' class='card-image'>";
            }else if(strcmp(h($row['tag']), 'schedule') == 0){
                print "<img src='./images/schedule.png' class='card-image'>";
            }else{
                print "<img src='./images/feeling.png' class='card-image'>";
            }
            
            print "<div class='card-content'>";
            print "<h2>". h($row['cube_name']). "</h2>";

            if (strcmp(h($row['tag']), 'data') == 0){
                $base_url = "http://weather.livedoor.com/forecast/webservice/json/v1?city=" . h($row['data_location']);
                $json = file_get_contents($base_url, true);
                $json = mb_convert_encoding($json, 'UTF-8');
                $obj = json_decode($json, true);
                $weather = $obj['forecasts'][h($row['data_date'])]['image']['title']; 
                
                if(strpos( $weather, '雨') !== false){
                    //雨
                    print "<img src='./images/icon_swing.png' class='move-image'>";
                }else if(strpos( $weather, '晴') !== false){
                    //晴れ
                    print "<img src='./images/icon_round.png' class='move-image'>";
                }else{
                    //曇り
                    print "<img src='./images/icon_slide.png' class='move-image'>";
                }
                
                if (strcmp(h($row['data_date']), '0') == 0){
                    print "<p>今日</p>";
                }else if(strcmp(h($row['data_date']), '1') == 0){
                    print "<p>明日</p>";
                }else{
                    print "<p>明後日</p>";
                }
            }else if(strcmp(h($row['tag']), 'schedule') == 0){
                if(h($row['movement']) == 1){
                    print "<img src='./images/icon_straight.png' class='move-image'>";
                }else if(h($row['movement']) == 2){
                    print "<img src='./images/icon_repeat.png' class='move-image'>";
                }else if(h($row['movement']) == 3){
                    print "<img src='./images/icon_round.png' class='move-image'>";
                }else if(h($row['movement']) == 4){
                    print "<img src='./images/icon_slide.png' class='move-image'>";
                }else{
                    print "<img src='./images/icon_swing.png' class='move-image'>";
                }
                print "<p>". h($row['schedule_date']). "</p>";
            }else{
                if(h($row['movement']) == 1){
                    print "<img src='./images/icon_straight.png' class='move-image'>";
                }else if(h($row['movement']) == 2){
                    print "<img src='./images/icon_repeat.png' class='move-image'>";
                }else if(h($row['movement']) == 3){
                    print "<img src='./images/icon_round.png' class='move-image'>";
                }else if(h($row['movement']) == 4){
                    print "<img src='./images/icon_slide.png' class='move-image'>";
                }else{
                    print "<img src='./images/icon_swing.png' class='move-image'>";
                }
                print "<p>". h($row['feeling_destination']). " さんから</p>";
            }
            print "<button name='deleteid' value='" . h($row['cube_number']). "'>削除</button>";
            print "</div></div>";
        }
    }else{
        print '<p class="login_link"><a href="login_form.php">[ログイン]</a></p>';
    }
    ?>
    </form>
    <div class="add-event-section">
        <a href="new-cube.php" class="add-event-button">My Cube 追加</a>
    </div>
    
    <footer>
        <p class="footer-content"></p>
    </footer>
    
</body>

</html>