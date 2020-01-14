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
    
    <?php
        if(isset($_GET['cube_name'])) $cube_name=$_GET['cube_name'];
        if(isset($_GET['name'])) $name=$_GET['name']; 

        $db = new PDO("sqlite:SQL/infocube.sqlite");
        if(isset($cube_name)){
            $db->query("insert into cube values(1, null, '$cube_name', 'feeling', 0, '$move', 0, 0, 0, 10, $name);");
            print "<h3 style='text-align: center; color: #935;'>送信されました</h3>";
        }
    ?>

    <p class="page-title">My Cube 追加：データ</p>
    
    <form action=new-data.php method="get">
        <p class="form-title">Cubeの名前</p>
        <div class="cubeform-contents">
            <input class="left">
        </div>
        
        <p class="form-title">地域</p>
        <div class="cubeform-contents">
            <input class="left">
        </div>
        
        <p class="form-title">日付</p>
        <div class="cubeform-contents">
            <input class="left">
        </div>

        <div class="event-submit-section">
            <input type="submit" class="event-submit-button left">
        </div>
    </form>

    <div class="add-event-section">
        <a href="index.php" class="add-event-button">HOMEに戻る</a>
    </div>

</body>

</html>