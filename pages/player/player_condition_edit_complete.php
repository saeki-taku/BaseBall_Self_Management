<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/function.php');
referer();

$edit_id = $_POST['edit_id'];

$pain_parts   = filter_input(INPUT_POST, 'pain_parts', FILTER_SANITIZE_SPECIAL_CHARS);
$pain_contents = filter_input(INPUT_POST, 'pain_contents', FILTER_SANITIZE_SPECIAL_CHARS);
$pain_date = filter_input(INPUT_POST, 'pain_date', FILTER_SANITIZE_SPECIAL_CHARS);
$recovery_date   = filter_input(INPUT_POST, 'recovery_date', FILTER_SANITIZE_SPECIAL_CHARS);
$pain_progress = filter_input(INPUT_POST, 'pain_progress', FILTER_SANITIZE_SPECIAL_CHARS);
$pain_memo = filter_input(INPUT_POST, 'pain_memo', FILTER_SANITIZE_SPECIAL_CHARS);

$condition_editData = array(
  $pain_parts,
  $pain_contents,
  $pain_date,
  $recovery_date,
  $pain_progress,
  $pain_memo,
  $edit_id
);

$result_condition_edit = Player::editPlayerCondition($condition_editData);

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
  <link rel="stylesheet" href="../../assets/css/player/player_condition_edit.css" />
  <title>BBSM|記録編集完了</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php require("../common/header_dark.php") ?>
    <div class="conditionEdit">
      <?php $title = "記録編集完了";
      require("../common/title_dark.php"); ?>
      <article class="conditionEditComplete_wrapper">
        <div class="conditionEditComplete_action">
          <p class="conditionEditComplete_word">編集が完了しました</p>
          <a href="../main/main.php" class="conditionEditComplete_back">メインページへ</a>
        </div>
      </article>
    </div>
    <?php require("../common/footer_dark.php"); ?>
  </div>
</body>

</html>

