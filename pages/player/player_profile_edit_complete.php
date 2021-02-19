<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/function.php');
referer();

$edit_id = $_POST['edit_id'];

$err_message = [];

$players_name   = filter_input(INPUT_POST, 'players_name', FILTER_SANITIZE_SPECIAL_CHARS);
$players_furigana = filter_input(INPUT_POST, 'players_furigana', FILTER_SANITIZE_SPECIAL_CHARS);
$players_number = filter_input(INPUT_POST, 'players_number', FILTER_SANITIZE_SPECIAL_CHARS);
$school_year   = filter_input(INPUT_POST, 'school_year', FILTER_SANITIZE_SPECIAL_CHARS);
$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_SPECIAL_CHARS);
$position_sub = filter_input(INPUT_POST, 'position_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$introduce = filter_input(INPUT_POST, 'introduce', FILTER_SANITIZE_SPECIAL_CHARS);

if (empty($players_name)) {
  $err_message['players_name'] = '名前を入力してくさい';
}
if (empty($players_furigana)) {
  $err_message['players_furigana'] = 'フリガナを入れてください';
}
if (!preg_match("/^[ァ-ヶー　]+$/u", $players_furigana)) {
  $err_message['players_kana'] = "カタカナにて入力してください";
}
if (!empty($player_num) && !preg_match('/\A[0-9]{1,3}+\z/', $player_num)) {
  $err_message['players_num'] = '3桁以内の数字を入力してください';
}
if (strlen($introduce) > 140) {
  $err_message['introduce'] = '紹介文は140文字以内で入力してください';
}

$profile_editData = array(
  $players_name, $players_furigana, $players_number, $school_year, $position, $position_sub, $introduce, $edit_id
);

if (count($err_message) > 0) {
  $_SESSION["profile_err"] = $err_message;
  $path = 'Location: ./player_profile_edit.php?profile_edit=';
  header($path . $edit_id);
  return;
  // echo "失敗！";
} else {
  Player::editPlayerProfile($profile_editData);
  // echo "成功!";
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
  <link rel="stylesheet" href="../../assets/css/common/title.css" />
  <link rel="stylesheet" href="../../assets/css/reset.css" />
  <link rel="stylesheet" href="../../assets/css/player/player_profile_edit.css" />
  <title>BBSM|プロフィール編集完了</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="profileEdit">
      <?php $title = "プロフィール編集完了";
      require("../common/title.php"); ?>
      <article class="profileEditComplete_wrapper">
        <div class="profileEditComplete_action">
          <p class="profileEditComplete_word">編集が完了しました</p>
          <a href="../main/main.php" class="profileEditComplete_back">メインページへ</a>
        </div>
      </article>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
