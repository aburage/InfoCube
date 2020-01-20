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

    <p class="page-title">HOME</p>
    <div>

    <?php
    
    if (isset($_SESSION["user"])){
    
    print '<div class="login-now"><p>' . $_SESSION["user"] . 'としてログイン中</p></div>';
        
    print '<div class="display-if-disconnected connect-btn">';
    print '<button class="btn" id="connect">connect to cube</button>';
    print '</div>';

    print '<div class="display-if-connecting center">';
    print 'connecting ...';
    print '</div>';

    print '<div class="display-if-connected">';
        
    if(isset($_GET['cube_number'])) $cube_number=$_GET['cube_number'];
    if(isset($_GET['cube_name'])) $cube_name=$_GET['cube_name'];
    if(isset($_GET['tag'])) $tag=$_GET['tag'];
    if(isset($_GET['movement'])) $movement=$_GET['movement'];
    if(isset($_GET['schedule_date'])) $schedule_date=$_GET['schedule_date'];
    if(isset($_GET['data_location'])) $data_location=$_GET['data_location'];
    if(isset($_GET['data_date'])) $data_date=$_GET['data_date'];
    if(isset($_GET['feeling_destination'])) $feeling_destination=$_GET['feeling_destination'];
    
    $today = new DateTime('now');

    $db = new PDO("sqlite:SQL/infocube.sqlite");
    $result=$db->query('select * from cube where user_name="' . $_SESSION["user"] .'";');
        for($i = 0; $row=$result->fetch(); ++$i ){
            print "<div class='card'>";
            
            if (strcmp(h($row['tag']), 'data') == 0) {
                print "<img src='./images/data.png' class='card-image'>";
            }else if(strcmp(h($row['tag']), 'schedule') == 0){
                print "<img src='./images/schedule.png' class='card-image'>";
            }else{
                print "<img src='./images/feeling.png' class='card-image'>";
            }
            
            print "<div class='card-content'>";
            print "<h2>". h($row['cube_name']). "</h2>";
            
            if (strcmp(h($row['tag']), 'data') == 0){
                if (strcmp(h($row['data_date']), '0') == 0){
                    print "<p>今日</p>";
                }else if(strcmp(h($row['data_date']), '1') == 0){
                    print "<p>明日</p>";
                }else{
                    print "<p>明後日</p>";
                }
            }else if(strcmp(h($row['tag']), 'schedule') == 0){
                print "<p>". h($row['schedule_date']). "</p>";
            }else{
                print "<p>". h($row['feeling_destination']). " さんから</p>";
            }
            
            if(strcmp(h($row['tag']), 'data') == 0){
                $base_url = "http://weather.livedoor.com/forecast/webservice/json/v1?city=" . h($row['data_location']);
                $json = file_get_contents($base_url, true);
                $json = mb_convert_encoding($json, 'UTF-8');
                $obj = json_decode($json, true);
                $weather = $obj['forecasts'][h($row['data_date'])]['image']['title']; 
                
                if(strpos( $weather, '雨') !== false){
                    //雨処理
                    print '<button class="swing1">動きを確認</button>';
                }else if(strpos( $weather, '晴') !== false){
                    //晴れ処理
                    print '<button class="round2">動きを確認</button>';
                }else{
                    //曇り処理
                    print '<button class="slide1">動きを確認</button>';
                }
            }else if(strcmp(h($row['tag']), 'schedule') == 0){
                
                $day2 = new DateTime(h($row['schedule_date']));
                $interval = $today->diff($day2);
                $left_time = $interval->format('%a');
                
                if (strcmp(h($row['movement']), '1') == 0){
                    if((int)$left_time<=1){
                        print '<button class="straight3">動きを確認</button>';
                    }else if((int)$left_time<=3){
                        print '<button class="straight2">動きを確認</button>';
                    }else{
                        print '<button class="straight1">動きを確認</button>';
                    }
                }else if (strcmp(h($row['movement']), '2') == 0){
                    if((int)$left_time<=1){
                        print '<button class="repeat3">動きを確認</button>';
                    }else if((int)$left_time<=3){
                        print '<button class="repeat2">動きを確認</button>';
                    }else{
                        print '<button class="repeat1">動きを確認</button>';
                    }
                }else if (strcmp(h($row['movement']), '3') == 0){
                    if((int)$left_time<=1){
                        print '<button class="round3">動きを確認</button>';
                    }else if((int)$left_time<=3){
                        print '<button class="round2">動きを確認</button>';
                    }else{
                        print '<button class="round1">動きを確認</button>';
                    }
                }else if (strcmp(h($row['movement']), '4') == 0){
                    if((int)$left_time<=1){
                        print '<button class="slide3">動きを確認</button>';
                    }else if((int)$left_time<=3){
                        print '<button class="slide2">動きを確認</button>';
                    }else{
                        print '<button class="slide1">動きを確認</button>';
                    }
                }else if (strcmp(h($row['movement']), '5') == 0){
                    if((int)$left_time<=1){
                        print '<button class="swing3">動きを確認</button>';
                    }else if((int)$left_time<=3){
                        print '<button class="swing2">動きを確認</button>';
                    }else{
                        print '<button class="swing1">動きを確認</button>';
                    }
                } 
            }else{
               if (strcmp(h($row['movement']), '1') == 0){
                    print '<button class="straight2">動きを確認</button>';
                }else if (strcmp(h($row['movement']), '2') == 0){
                    print '<button class="repeat2">動きを確認</button>';
                }else if (strcmp(h($row['movement']), '3') == 0){
                    print '<button class="round2">動きを確認</button>';
                }else if (strcmp(h($row['movement']), '4') == 0){
                    print '<button class="slide2">動きを確認</button>';
                }else if (strcmp(h($row['movement']), '5') == 0){
                    print '<button class="swing2">動きを確認</button>';
                } 
            }

            print "</div></div>";
        }
    }else{
        print '<p class="logout-now"><a href="login_form.php">[ログイン]</a></p>';
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