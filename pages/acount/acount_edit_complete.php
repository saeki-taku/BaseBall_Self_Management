<?php
session_start();
require_once('../../model/Acount.php');
require_once('../../model/function.php');
referer();

$login_user = $_SESSION['login_user'];
$login_user_id = $login_user['id'];

$team_name = filter_input(INPUT_POST, 'team_name');
$mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
$old_password = filter_input(INPUT_POST, 'old_password');
$new_password = filter_input(INPUT_POST, 'new_password');
$new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);


//エラーメッセージ
$err = [];

$token = filter_input(INPUT_POST, 'csrf_token');
// echo "<br>";
// var_dump($token);
// トークンがない、もしくは一致しない場合処理を中止する。
if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
  exit('不正なリクエスト');
}
unset($_SESSION['csrf_token']);
//バリデーション
if (!$team_name) {
  $err[] = "ユーザーネームを記入してください。";
}

if (!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD', $mail)) {
  $err[] = "メールアドレスを入力してください";
}

if (!password_verify($old_password, $login_user['password'])) {
  $err[] = "古いパスワードが一致しません";
  // echo "古いパスワードが一致しません";
}

if (!preg_match("/\A[a-z\d]{8,16}+\z/i", $old_password)) {
  $err[] = "パスワードを英数字8文字以上16文字以下にて記入してください。";
}
if (count($err) === 0) {
  //ユーザーを登録する処理
  $result_acount_update = Acount::updateUser($team_name, $mail, $new_password_hash, $login_user_id);
  var_dump($result_acount_update);
  if (!$result_acount_update) {
    $err[] = "登録に失敗しました";
  } else {
    Acount::logout();
  }
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
  <link rel="stylesheet" href="../../assets/css/acount/acount_edit.css" />
  <title>BBSM|アカウント編集</title>
</head>

<body>
  <div class="wrapper">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="acountEdit">
      <?php $title = "アカウント編集";
      require("../common/title.php"); ?>
      <div class="acountEdit_complete">
        <?php if (count($err) > 0) : ?>
          <?php foreach ($err as $e) : ?>
            <p class="err_msg"><?= $e ?></p>
          <?php endforeach ?>
          <div class="err_back">
            <a class="" href="./acount_edit.php?user_id=<?= $login_user_id; ?>">戻る</a>
          </div>
        <?php else : ?>
          <div class="edit_complete">
            <p>完了しました</p>
            <a href="../../index.php">ログイン画面へ</a>
          </div>
        <?php endif ?>
        <div class="acountEdit_action">
        </div>
      </div>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
