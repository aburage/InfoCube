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

    <p class="page-title">My Cube 一覧</p>
    <?php
    function h($str){
        return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
    }
    ?>
    <form action=cube-list.php method=get>
    <div class="filter">
        <select name="tag-select">
            <option name="stag" value="" hidden>タグを選択</option>
            <option name="stag" value="schedule">スケジュール</option>
            <option name="stag" value="data">データ</option>
            <option name="stag" value="feeling">フィーリング</option>
        </select>
<!--        <input type="date" class="filter-form">-->
        <input type=submit border=0 value="検索">
    </div>
    </form>

    <?php
    
    if(isset($_GET['cube_number'])) $cube_number=$_GET['cube_number']; 
    if(isset($_GET['cube_name'])) $cube_name=$_GET['cube_name']; 
    if(isset($_GET['tag'])) $tag=$_GET['tag']; 
    if(isset($_GET['start_movement'])) $start_movement=$_GET['start_movement']; 
    if(isset($_GET['middle_movement'])) $middle_movement=$_GET['middle_movement']; 
    if(isset($_GET['end_movement'])) $end_movement=$_GET['end_movement'];
    if(isset($_GET['date'])) $date=$_GET['date']; 
    if(isset($_GET['time'])) $type=$_GET['time']; 
    
    if(isset($_GET['stag'])) $stag=$_GET['stag']; 

    $db = new PDO("sqlite:infocube.sqlite");
//    if(h($row['tag'])==$stag){
//        $result=$db->query("select * from cube where tag = ". $stag .";");
//        print $stag;
//    }else{
        $result=$db->query("SELECT * FROM cube");
//    }
    
        for($i = 0; $row=$result->fetch(); ++$i ){
            
            echo "<div class='card'>";
            if (strcmp(h($row['tag']), 'data') == 0){
                echo "<img src='./images/data.png' class='card-image'>";
            }else if(strcmp(h($row['tag']), 'schedule') == 0){
                echo "<img src='./images/schedule.png' class='card-image'>";
            }else{
                echo "<img src='./images/feeling.png' class='card-image'>";
            }
            
            echo "<div class='card-content'>";
            echo "<h2>". h($row['cube_name']). "</h2>";
            if(h($row['start_movement']) == 1){
                echo "<img src='./images/icon_start_turn.png' class='move-image'>";
            }else if(h($row['start_movement']) == 2){
                echo "<img src='./images/icon_start_rotate.png' class='move-image'>";
            }else{
                echo "<img src='./images/icon_start_turn.png' class='move-image'>";
            }
            
            if(h($row['middle_movement']) == 1){
                echo "<img src='./images/icon_middle_repeat.png' class='move-image'>";
            }else if(h($row['middle_movement']) == 2){
                echo "<img src='./images/icon_middle_round.png' class='move-image'>";
            }else if(h($row['middle_movement']) == 3){
                echo "<img src='./images/icon_middle_slide.png' class='move-image'>";
            }else if(h($row['middle_movement']) == 4){
                echo "<img src='./images/icon_middle_straight.png' class='move-image'>";
            }else{
                echo "<img src='./images/icon_middle_swing.png' class='move-image'>";
            }
            
            if(h($row['middle_movement']) == 1){
                echo "<img src='./images/icon_end_turn.png' class='move-image'>";
            }else if(h($row['middle_movement']) == 2){
                echo "<img src='./images/icon_end_rotate.png' class='move-image'>";
            }else{
                echo "<img src='./images/icon_end_turn.png' class='move-image'>";
            }
            if (strcmp(h($row['tag']), 'data') == 0){
                if (strcmp(h($row['data_date']), '0') == 0){
                    echo "<p>今日</p>";
                }else if(strcmp(h($row['data_date']), '1') == 0){
                    echo "<p>明日</p>";
                }else{
                    echo "<p>明後日</p>";
                }
            }else if(strcmp(h($row['tag']), 'schedule') == 0){
                echo "<p>". h($row['schedule_date']). "</p>";
            }else{
                echo "<p>". h($row['feeling_destination']). " さんから</p>";
            }
            echo "</div></div>";
        }
    ?>
    <div class="add-event-section">
        <a href="new-cube.php" class="add-event-button">My Cube 追加</a>
    </div>
    
    <footer>
        <p class="footer-content">© All rights reserved by 100kwLab. groupA</p>
    </footer>
    
</body>

</html>