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
        $db = new PDO("sqlite:SQL/infocube.sqlite");
    
        if(isset($_GET['cube_name'])) $cube_name=$_GET['cube_name'];
        if(isset($_GET['location'])) $location=$_GET['location'];
        if(isset($_GET['date'])) $date=$_GET['date']; 

        if (isset($cube_name)) {
            $db->query("insert into cube values(1, null, '$cube_name', 'data', 1, 1, 1, 0, '$location', '$date', 1);");
            print "<h3 style='text-align: center; color: #935;'>送信されました</h3>";
        }
    $db = new PDO("sqlite:infocube.sqlite");

    ?>

    <p class="page-title">My Cube 追加：データ</p>

    <form action=new-data.php method="get">
        <p class="form-title">Cubeの名前</p>
        <div class="cubeform-contents">
            <input class="left" name="cube_name">
        </div>

        <p class="form-title">地域</p>
        <div class="cubeform-contents">
            <select name="location" class="left">
                <option value="130010">東京</option>
                <option value="270000">大阪</option>
                <option value="400010">福岡</option>
                <option value="471010">沖縄</option>
            </select>
        </div>

        <p class="form-title">日付</p>
        <div class="cubeform-contents">
            <select name="date" class="left">
                <option value="0">今日</option>
                <option value="1">明日 </option>
                <option value="2">明後日</option>
            </select>
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
