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

    <p class="page-title">My Cube 追加</p>

    <p class="form-title">Cubeの種類</p>
<!--
    <div class="cubetype-contents">
        <a href="new-schedule.php"><img src="./images/schedule.png" alt="スケジュール" class="cubetype-card"></a>
        <a href="new-data.php"><img src="./images/data.png" alt="データ" class="cubetype-card"></a>
        <a href="new-feeling.php"><img src="./images/feeling.png" alt="フィーリング" class="cubetype-card"></a>
    </div>
    <div class="cubeform-contents">
        <span class="cubetype-sentence">スケジュール</span>
        <span class="cubetype-sentence">データ</span>
        <span class="cubetype-sentence">フィーリング</span>
    </div>
-->

    <div class="card">
        <img src="./images/schedule.png" alt="スケジュール" class="form-card-image">
        <div class="form-card-content">
            <h3>スケジュール</h3>
            <button onclick="location.href='./new-schedule.php'" class="form-card-button">選択</button>
        </div>
    </div>
    <div class="card">
        <a class="link-div" href="new-data.php"></a>
        <img src="./images/data.png" alt="データ" class="form-card-image">
        <div class="form-card-content">
            <h3>データ</h3>
            <button onclick="location.href='./new-data.php'">選択</button>
        </div>
        
    </div>
    <div class="card">
        <a class="link-div" href="new-feeling.php"></a>
        <img src="./images/feeling.png" alt="フィーリング" class="form-card-image">
        <div class="form-card-content">
            <h3>フィーリング</h3>
            <button onclick="location.href='./new-feeling.php'">選択</button>
        </div>
        
    </div>
</body>

</html>