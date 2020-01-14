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

    <div class="display-if-disconnected connect-btn">
        <button class="btn" id="connect">connect to cube</button>
    </div>


    <div class="display-if-connecting center">
        connecting ...
    </div>


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
    if(isset($_GET['schedule_date'])) $schedule_date=$_GET['schedule_date']; 
    if(isset($_GET['data_location'])) $data_location=$_GET['data_location']; 
    if(isset($_GET['data_date'])) $data_date=$_GET['data_date']; 
    if(isset($_GET['feeling_destination'])) $feeling_destination=$_GET['feeling_destination']; 

    $db = new PDO("sqlite:SQL/infocube.sqlite");
    $result=$db->query("select * from cube");
        for($i = 0; $row=$result->fetch(); ++$i ){
            echo "<div class='card'>";
            
            if (strcmp(h($row['tag']), 'data') == 0){
                $base_url = "http://weather.livedoor.com/forecast/webservice/json/v1?city=" . h($row['data_location']);
                $json = file_get_contents($base_url, true);
                $json = mb_convert_encoding($json, 'UTF-8');
                // 連想配列の形式でjsonへ変換
                $obj = json_decode($json, true);
                $weather = $obj['forecasts'][$data_date]['image']['title']; 
                
                echo "<img src='./images/data.png' class='card-image'>";
            }else if(strcmp(h($row['tag']), 'schedule') == 0){
                echo "<img src='./images/schedule.png' class='card-image'>";
            }else{
                echo "<img src='./images/feeling.png' class='card-image'>";
            }
            
            echo "<div class='card-content'>";
            echo "<h2>". h($row['cube_name']). "</h2>";
            
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
            
            if (strcmp(h($row['middle_movement']), '1') == 0){
                echo '<button class="straight">動きを確認</button>';
            }else if (strcmp(h($row['middle_movement']), '2') == 0){
                echo '<button class="repeat">動きを確認</button>';
            }else if (strcmp(h($row['middle_movement']), '3') == 0){
                echo '<button class="round">動きを確認</button>';
            }else if (strcmp(h($row['middle_movement']), '4') == 0){
                echo '<button class="slide">動きを確認</button>';
            }else if (strcmp(h($row['middle_movement']), '5') == 0){
                echo '<button class="swing">動きを確認</button>';
            }
            
            echo "</div></div>";
        }
    ?>

        <div class="card">
            <img src="./images/data.png" alt="天気" class="card-image">
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

    <script src="./toio/dist/main.js"></script>
    <script src="./index.js"></script>

    <footer>
        <p class="footer-content"></p>
    </footer>
</body>

</html>