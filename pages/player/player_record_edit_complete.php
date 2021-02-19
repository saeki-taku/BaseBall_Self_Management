<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/function.php');
referer();

$edit_id = $_POST['edit_id'];
$err_message = record_validate($_POST);

$height   = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_SPECIAL_CHARS);
$height_2 = filter_input(INPUT_POST, 'height_2', FILTER_SANITIZE_SPECIAL_CHARS);
$height_3 = filter_input(INPUT_POST, 'height_3', FILTER_SANITIZE_SPECIAL_CHARS);
$weight   = filter_input(INPUT_POST, 'weight', FILTER_SANITIZE_SPECIAL_CHARS);
$weight_2 = filter_input(INPUT_POST, 'weight_2', FILTER_SANITIZE_SPECIAL_CHARS);
$weight_3 = filter_input(INPUT_POST, 'weight_3', FILTER_SANITIZE_SPECIAL_CHARS);
$run_time   = filter_input(INPUT_POST, 'run_time', FILTER_SANITIZE_SPECIAL_CHARS);
$run_time_2 = filter_input(INPUT_POST, 'run_time_2', FILTER_SANITIZE_SPECIAL_CHARS);
$run_time_3 = filter_input(INPUT_POST, 'run_time_3', FILTER_SANITIZE_SPECIAL_CHARS);
$long_cast   = filter_input(INPUT_POST, 'long_cast', FILTER_SANITIZE_SPECIAL_CHARS);
$long_cast_2 = filter_input(INPUT_POST, 'long_cast_2', FILTER_SANITIZE_SPECIAL_CHARS);
$long_cast_3 = filter_input(INPUT_POST, 'long_cast_3', FILTER_SANITIZE_SPECIAL_CHARS);
$ballspeed   = filter_input(INPUT_POST, 'ballspeed', FILTER_SANITIZE_SPECIAL_CHARS);
$ballspeed_2 = filter_input(INPUT_POST, 'ballspeed_2', FILTER_SANITIZE_SPECIAL_CHARS);
$ballspeed_3 = filter_input(INPUT_POST, 'ballspeed_3', FILTER_SANITIZE_SPECIAL_CHARS);
$hit_average   = filter_input(INPUT_POST, 'hit_average', FILTER_SANITIZE_SPECIAL_CHARS);
$hit_average_2 = filter_input(INPUT_POST, 'hit_average_2', FILTER_SANITIZE_SPECIAL_CHARS);
$hit_average_3 = filter_input(INPUT_POST, 'hit_average_3', FILTER_SANITIZE_SPECIAL_CHARS);

$record_editData = array(
  $height, $height_2, $height_3,
  $weight, $weight_2, $weight_3,
  $run_time, $run_time_2, $run_time_3,
  $long_cast, $long_cast_2, $long_cast_3,
  $ballspeed, $ballspeed_2, $ballspeed_3,
  $hit_average, $hit_average_2, $hit_average_3,
  $edit_id
);

if (count($err_message) > 0) {
  $_SESSION["record_err"] = $err_message;
  $path = 'Location: ./player_record_edit.php?record_edit=';
  header($path.$edit_id);
  return;
  echo "失敗！";
} else {
  Player::editPlayerRecord($record_editData);
  echo "成功!";
}


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
  <link rel="stylesheet" href="../../assets/css/player/player_record_edit.css" />
  <title>BBSM|記録編集完了</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php require("../common/header_dark.php") ?>
    <div class="recordEdit">
      <?php $title = "記録編集完了";
      require("../common/title_dark.php"); ?>
      <article class="recordEditComplete_wrapper">
        <div class="recordEditComplete_action">
          <p class="recordEditComplete_word">編集が完了しました</p>
          <a href="../main/main.php" class="recordEditComplete_back">メインページへ</a>
        </div>
      </article>
    </div>
    <?php require("../common/footer_dark.php"); ?>
  </div>
</body>

</html>

