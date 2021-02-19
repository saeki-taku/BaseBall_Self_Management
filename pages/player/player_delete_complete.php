<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/function.php');
referer();

$delete_id = $_GET['player_delete_complete'];

Player::deletePlayer($delete_id);
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../../assets/css/common/header.css" />
    <link rel="stylesheet" href="../../assets/css/common/footer.css" />
    <link rel="stylesheet" href="../../assets/css/common/sidebar.css" />
    <link rel="stylesheet" href="../../assets/css/common/title.css" />
    <link rel="stylesheet" href="../../assets/css/reset.css" />
    <link rel="stylesheet" href="../../assets/css/player/player_delete_complete.css" />
    <title>BBSM|削除完了</title>
  </head>
  <body>
    <div class="wrapper wrapper_other">
      <?php $linkPath = "../main/main.php"; $imgPath = "../../"; require("../common/header.php"); ?>
      <div class="playerDelete">
        <?php $title = "選手情報削除完了"; require("../common/title.php");?>
        <p class="playerDelete_complete">削除が完了致しました。</p>
        <a href="../main/main.php" class="playerDelete_mainLink">メインページへ</a>
      </div>
      <?php require("../common/footer.php");?>
    </div>
  </body>
</html>
