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

    <p class="page-title">My Cube 追加</p>
    <?php
    
    if (isset($_SESSION["user"])){
        
    
    
    print '<p class="form-title">Cubeの種類</p>';

    print '<div class="card">';
    print '<img src="./images/schedule.png" alt="スケジュール" class="form-card-image">';
    print '<div class="form-card-content">';
    print '<h3>スケジュール</h3>';
    print '<button class="form-card-button" onclick="location.href=';
    print "'" . './new-schedule.php'. "'";
    print '">選択</button>';
    print '</div>';
    print '</div>';
    
    print '<div class="card">';
    print '<img src="./images/data.png" alt="データ" class="form-card-image">';
    print '<div class="form-card-content">';
    print '<h3>データ</h3>';
    print '<button class="form-card-button" onclick="location.href=';
    print "'" . './new-data.php'. "'";
    print '">選択</button>';
    print '</div>';
    print '</div>';
        
    print '<div class="card">';
    print '<img src="./images/data.png" alt="フィーリング" class="form-card-image">';
    print '<div class="form-card-content">';
    print '<h3>フィーリング</h3>';
    print '<button class="form-card-button" onclick="location.href=';
    print "'" . './new-feeling.php'. "'";
    print '">選択</button>';
    print '</div>';
    print '</div>';
        
    }else{
        print '<p class="login_link"><a href="login_form.php">[ログイン]</a></p>';
    }
    
    ?>
</body>

</html>