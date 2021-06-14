<?php
session_start();
require_once('../../model/Acount.php');
$mailCheck = Acount::getUserByMail($_POST['mail']);
var_dump($mailCheck);



//エラーメッセージ
$err = [];

$token = filter_input(INPUT_POST, 'csrf_token');
//トークンがない、もしくは一致しない場合処理を中止する。
if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
  exit('不正なリクエスト');
}
unset($_SESSION['csrf_token']);

//バリデーション
if (!$team_name = filter_input(INPUT_POST, 'team_name')) {
  $err[] = "ユーザーネームを記入してください。";
}

$mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
if (!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD', $mail)) {
  $err[] = "メールアドレスを入力してください";
}
$mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
if ($mailCheck) {
  $err[] = "既に使用されているメールアドレスです";
}

$password = filter_input(INPUT_POST, 'password');
if (!preg_match("/\A[a-z\d]{8,16}+\z/i", $password)) {
  $err[] = "パスワードを英数字8文字以上16文字以下にて記入してください。";
}

$password_conf = filter_input(INPUT_POST, 'password_conf');
if ($password !== $password_conf) {
  $err[] = "確認用パスワードが一致しません。";
}

if (count($err) === 0) {
  //ユーザーを登録する処理
  $hasCreated = Acount::createUser($_POST);

  if (!$hasCreated) {
    $err[] = "登録に失敗しました";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

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
  <link rel="stylesheet" href="../../assets/css/acount/acount_new_result.css" />
  <title>BBSM|新規登録結果</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="acountNewResult">
      <?php $title = "新規登録結果";
      require("../common/title.php"); ?>
      <div class="acountNewResult_wrap">
        <?php if (count($err) > 0) : ?>
          <?php foreach ($err as $e) : ?>
            <p class="err_msg"><?= $e ?></p>
          <?php endforeach ?>
          <a href="./acount_new.php">戻る</a>
        <?php else : ?>
          <p>ユーザー登録が完了しました。</p>
          <a href="../../index.php">ログインへ</a>
        <?php endif ?>
      </div>
      <?php require("../common/footer.php"); ?>
    </div>
</body>

</html>
