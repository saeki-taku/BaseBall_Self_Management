<?php
session_start();
require_once('../../model/Player.php');

//ファイル関係の取得
$file = $_FILES['img'];
$filename = basename($file['name']); //ディレクトリトラバーサル
$tmp_path = $file['tmp_name'];
$file_err = $file['error']; //エラーは数字で返ってくる
$filesize = $file['size'];
$upload_dir = '../../assets/upload_img/';
$save_filename = date('YmdHis') . $filename;
$save_path = $upload_dir . $save_filename;


$user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_SPECIAL_CHARS);
$player_name = filter_input(INPUT_POST, 'player_name', FILTER_SANITIZE_SPECIAL_CHARS);
$player_furigana = filter_input(INPUT_POST, 'player_furigana', FILTER_SANITIZE_SPECIAL_CHARS);
$player_num = filter_input(INPUT_POST, 'player_num');
$school_year = filter_input(INPUT_POST, 'school_year');
$position = filter_input(INPUT_POST, 'position');
$position_sub = filter_input(INPUT_POST, 'position_sub');
$introduce = filter_input(INPUT_POST, 'introduce', FILTER_SANITIZE_SPECIAL_CHARS);

$file_data = array(
  $user_id, $filename, $save_path, $player_name, $player_furigana, $player_num, $school_year, $position, $position_sub, $introduce
);


$err_message = [];
$file_err_message = [];

if (empty($player_name)) {
  $err_message['player_name'] = '名前を入力してくさい';
}
if (empty($player_furigana)) {
  $err_message['player_furigana'] = 'フリガナを入れてください';
}
if (!preg_match("/^[ァ-ヶー　]+$/u", $player_furigana)) {
  $err_message['player_kana'] = "カタカナにて入力してください";
}
if (!empty($player_num) && !preg_match('/\A[0-9]{1,3}+\z/', $player_num)) {
  $err_message['player_num'] = '3桁以内の数字を入力してください';
}
if (strlen($introduce) > 140) {
  $err_message['introduce'] = '紹介文は140文字以内で入力してください';
}
//画像ファイルのバリデーション
// if (!empty($filename)) {
  if ($filesize > 1048576 || $file_err == 2) { //ファイルサイズは1MB未満か？
    $err_message['filesize_err'] = 'ファイルサイズは1MB未満にしてください';
  }
  $allow_ext = array('jpg', 'jpeg', 'png');
  $file_ext = pathinfo($filename, PATHINFO_EXTENSION); //ファイル形式(拡張子)の取得
  if (!in_array(strtolower($file_ext), $allow_ext)) {
    //in_array(調べたい配列、配列)関数→配列の中にxがあったら //strtolower 小文字にする関数
    $err_message['fileselect_err'] = '画像ファイルを添付してください';
  }
// }

if (count($err_message) > 0) { //画像以外にてエラーがなければ実行
  $_SESSION['playerAdd_err'] = $err_message;
  $_SESSION['login_user']['id'] = $user_id;
  header('Location: ./player_add.php');
  return;
} else {
  if (is_uploaded_file($tmp_path)) { //ファイルはあるか？
    if (move_uploaded_file($tmp_path, $save_path)) { //ファイルの移動
      // echo $filename . 'を' . $upload_dir . 'アップしました';
      //DBに保存
      $result = Player::fileSave($file_data);
      $result_message = array();

      if ($result) {
        // echo 'データベースに保存しました';
        array_push($result_message, '登録完了！');
      } else {
        array_push($result_message, 'データベースに保存できませんでした');
      }
    } else {
      array_push($result_message, 'ファイルを保存できませんでした');
    }
  }
}
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
  <link rel="stylesheet" href="../../assets/css/common/title.css" />
  <link rel="stylesheet" href="../../assets/css/reset.css" />
  <link rel="stylesheet" href="../../assets/css/player_add/player_add_result.css" />
  <title>BBSM|選手登録完了</title>
</head>

<body>
  <div class="wrapper">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="playerAddResult">
      <?php $title = "選手登録完了";
      require("../common/title.php"); ?>
      <div class="playerAddResult_container">
        <?php foreach ($result_message as $result) : ?>
          <p class="playerAddResult_word"><?= $result ?></p>
        <?php endforeach; ?>
        <div class="playerAddResult_box">
          <a class="playerAddResult_link" href="./player_add.php">登録を続ける</a>
          <a class="playerAddResult_link" href="../main/main.php">メインページへ</a>
        </div>
      </div>
    </div>
    <div>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
