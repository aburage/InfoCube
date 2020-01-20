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
<!--        <li><a href="./login_form.php">ログイン</a></li>-->
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
    if(isset($_GET['movement'])) $movement=$_GET['movement'];
    if(isset($_GET['schedule_date'])) $schedule_date=$_GET['schedule_date'];
    if(isset($_GET['data_location'])) $data_location=$_GET['data_location'];
    if(isset($_GET['data_date'])) $data_date=$_GET['data_date'];
    if(isset($_GET['feeling_destination'])) $feeling_destination=$_GET['feeling_destination'];
    

    $day1 = new DateTime('2020-01-15');
    $day2 = new DateTime('2020-01-13');
    $interval = $day1->diff($day2);

    $db = new PDO("sqlite:SQL/infocube.sqlite");
    $result=$db->query("select * from cube");
        for($i = 0; $row=$result->fetch(); ++$i ){
            echo "<div class='card'>";
            
            if (strcmp(h($row['tag']), 'data') == 0) {
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
            
            if(strcmp(h($row['tag']), 'data') == 0){
                $base_url = "http://weather.livedoor.com/forecast/webservice/json/v1?city=" . h($row['data_location']);
                $json = file_get_contents($base_url, true);
                $json = mb_convert_encoding($json, 'UTF-8');
                // 連想配列の形式でjsonへ変換
                $obj = json_decode($json, true);
                $weather = $obj['forecasts'][h($row['data_date'])]['image']['title']; 
                
                if(strpos( $weather, '雨') !== false){
                    //雨処理
                    echo '<button class="swing1">動きを確認</button>';
                }else if(strpos( $weather, '晴') !== false){
                    //晴れ処理
                    echo '<button class="round2">動きを確認</button>';
                }else{
                    //曇り処理
                    echo '<button class="slide1">動きを確認</button>';
                }
            }else if(strcmp(h($row['tag']), 'schedule') == 0){
                
                $day2 = new DateTime(h($row['schedule_date']));
                $interval = $day1->diff($day2);
                $left_time = $interval->format('%a');
                
                if (strcmp(h($row['movement']), '1') == 0){
                    if((int)$left_time<=1){
                        echo '<button class="straight3">動きを確認</button>';
                    }else if((int)$left_time<=3){
                        echo '<button class="straight2">動きを確認</button>';
                    }else if((int)$left_time<=7){
                        echo '<button class="straight1">動きを確認</button>';
                    }
                }else if (strcmp(h($row['movement']), '2') == 0){
                    if((int)$left_time<=1){
                        echo '<button class="repeat3">動きを確認</button>';
                    }else if((int)$left_time<=3){
                        echo '<button class="repeat2">動きを確認</button>';
                    }else if((int)$left_time<=7){
                        echo '<button class="repeat1">動きを確認</button>';
                    }
                }else if (strcmp(h($row['movement']), '3') == 0){
                    if((int)$left_time<=1){
                        echo '<button class="round3">動きを確認</button>';
                    }else if((int)$left_time<=3){
                        echo '<button class="round2">動きを確認</button>';
                    }else if((int)$left_time<=7){
                        echo '<button class="round1">動きを確認</button>';
                    }
                }else if (strcmp(h($row['movement']), '4') == 0){
                    if((int)$left_time<=1){
                        echo '<button class="slide3">動きを確認</button>';
                    }else if((int)$left_time<=3){
                        echo '<button class="slide2">動きを確認</button>';
                    }else if((int)$left_time<=7){
                        echo '<button class="slide1">動きを確認</button>';
                    }
                }else if (strcmp(h($row['movement']), '5') == 0){
                    if((int)$left_time<=1){
                        echo '<button class="swing3">動きを確認</button>';
                    }else if((int)$left_time<=3){
                        echo '<button class="swing2">動きを確認</button>';
                    }else if((int)$left_time<=7){
                        echo '<button class="swing1">動きを確認</button>';
                    }
                } 
            }else{
               if (strcmp(h($row['movement']), '1') == 0){
                    echo '<button class="straight2">動きを確認</button>';
                }else if (strcmp(h($row['movement']), '2') == 0){
                    echo '<button class="repeat2">動きを確認</button>';
                }else if (strcmp(h($row['movement']), '3') == 0){
                    echo '<button class="round2">動きを確認</button>';
                }else if (strcmp(h($row['movement']), '4') == 0){
                    echo '<button class="slide2">動きを確認</button>';
                }else if (strcmp(h($row['movement']), '5') == 0){
                    echo '<button class="swing2">動きを確認</button>';
                } 
            }

            echo "</div></div>";
        }
    ?>
       
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