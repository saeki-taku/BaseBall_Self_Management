<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/function.php');
referer();

$result_profile = Player::getPlayerProfile($_GET['player_delete']);
$delete_id = $_GET['player_delete'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="apple-touch-icon" sizes="180x180" href="../../assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="../../assets/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="../../assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="../../assets/css/common/header.css" />
  <link rel="stylesheet" href="../../assets/css/common/footer.css" />
  <link rel="stylesheet" href="../../assets/css/common/sidebar.css" />
  <link rel="stylesheet" href="../../assets/css/common/title.css" />
  <link rel="stylesheet" href="../../assets/css/reset.css" />
  <link rel="stylesheet" href="../../assets/css/player/player_delete.css" />
  <title>BBSM|選手情報削除</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="playerDelete">
      <?php $title = "選手情報削除";
      require("../common/title.php"); ?>
      <article class="playerDelete_wrapper">
        <p class="playerDelete_carefull">以下の選手の全ての情報を削除します。<br>
          よろしければ削除ボタンをクリックしてください。</p>
        <div class="playerDelete_container">
          <img src="<?= ($result_profile['file_name']) ? $result_profile['file_path'] : "../../assets/img/player_face.jpg"; ?>" alt="" width="90" height="90" class="playerDelete_face" />
          <div class="playerDelete_box">
            <p class="playerDelete_schoolyear"><?= h($result_profile['school_year']); ?>年生</p>
            <p class="playerDelete_name"><?= h($result_profile['players_name']); ?></p>
            <p class="playerDelete_furigana"><?= h($result_profile['players_furigana']); ?></p>
          </div>
        </div>
        <a href="../player/player_delete_complete.php?player_delete_complete=<?= $delete_id; ?>" class="playerDelete_link">削除</a>
      </article>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
