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

    <p class="form-title">Cubeの名前</p>
    <div class="cubeform-contents">
        <input class="left">
    </div>

    <p class="form-title">Cubeの種類</p>
    <div class="cubeform-contents">
        <input type="radio" class="left">スケジュール
        <!--日付と時間選択を追加-->
        <input type="radio">データ
        <input type="radio">フィーリング
    </div>

    <p class="form-title">始めの動き</p>
    <div class="cubeform-contents">
        <input type="image" src="./images/icon_start_turn.png" width="100px" class="left">
        <input type="image" src="./images/icon_start_rotate.png" width="100px">
    </div>

    <p class="form-title">中間の動き</p>
    <div class="cubeform-contents">
        <input type="image" src="./images/icon_middle_straight.png" width="100px" class="left">
        <input type="image" src="./images/icon_middle_repeat.png" width="100px">
        <input type="image" src="./images/icon_middle_round.png" width="100px">
        <input type="image" src="./images/icon_middle_slide.png" width="100px">
        <input type="image" src="./images/icon_middle_swing.png" width="100px">
    </div>

    <p class="form-title">終わりの動き</p>
    <div class="cubeform-contents">
        <input type="image" src="./images/icon_end_turn.png" width="100px" class="left">
        <input type="image" src="./images/icon_end_rotate.png" width="100px">
    </div>

    <br>
    <div class="event-submit-section">
        <input type="submit" class="event-submit-button">
    </div>
    
    <footer>
        <p class="footer-content">© All rights reserved by 100kwLab. groupA</p>
    </footer>

</body>

</html>