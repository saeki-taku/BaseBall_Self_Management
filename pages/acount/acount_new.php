<?php

session_start();
require_once("../../model/function.php");
require_once("../../model/Acount.php");

$result = Acount::checkLogin();
if ($result) {
  header('Location: ../main/main.php');
  return;
}

$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
unset($_SESSION['login_err']);
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
  <link rel="stylesheet" href="../../assets/css/reset.css" />
  <link rel="stylesheet" href="../../assets/css/acount/acuont_new.css" />
  <title>BBSM|新規登録</title>
</head>

<body>
  <div class="wrapper">
    <?php $linkPath = "../../index.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="acountNew">
      <h3 class="acountNew_word">新規登録</h3>
      <p class="acountNew_text"><span>※</span>下記に情報を入力の上、新規登録ボタンのクリックをお願い致します。</p>
      <?php if (isset($err['$login_err'])) : ?>
        <p class="login_err">※<?php echo $login_err; ?></p>
      <?php endif; ?>
      <!-- <form class="acountNew_from" action="register.php" method="post"> -->
      <form class="acountNew_from" action="acount_new_result.php" method="post">
        <input class="acountNew_name" name="team_name" type="text" placeholder="ユーザーネーム" />
        <input class="acountNew_mail" name="mail" type="text" placeholder="メールアドレス" />
        <input class="acountNew_pass" name="password" type="text" placeholder="パスワード" />
        <input class="acountNew_pass" name="password_conf" type="text" placeholder="パスワード確認" />
        <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
        <input class="acountNew_button" type="submit" name="submit" value="新規登録" />
      </form>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
