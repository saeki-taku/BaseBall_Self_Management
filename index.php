<?php
session_start();

require_once("./model/Acount.php");

$result = Acount::checkLogin();
if ($result) {
  header('Location: ./pages/main/main.php');
  return;
}

$err = $_SESSION;

//セッションを消す
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="./assets/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="./assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="./assets/css/reset.css" />
  <link rel="stylesheet" href="./assets/css/index.css" />
  <link rel="stylesheet" href="./assets/css/common/header.css" />
  <link rel="stylesheet" href="./assets/css/common/footer.css" />
  <script type="text/javascript" src="./assets/js/sample.js"></script>
  <title>BBSM|ログイン</title>
</head>

<body>
  <div class="wrapper">
    <?php $imgPath = "./index.php";
    $imgPath = "./";
    require("./pages/common/header.php") ?>
    <div class="login">
      <h3 class="login_word">ログイン</h3>
      <?php if (isset($err['msg'])) : ?>
        <p class="login_err">※<?php echo $err['msg'] ?></p>
      <?php endif; ?>
      <form class="login_from" action="./pages/login_out/login_result.php" method="post">
        <?php if (isset($err['mail'])) : ?>
          <p class="login_err"><?php echo $err['mail'] ?></p>
        <?php endif; ?>
        <input class="login_mail" name="mail" type="text" placeholder="メールアドレス" />

        <?php if (isset($err['password'])) : ?>
          <p class="login_err"><?php echo $err['password'] ?></p>
        <?php endif; ?>
        <input class="login_pass" name="password" type="password" placeholder="パスワード" />
        <input class="login_button" name="login" type="submit" name="submit" value="ログイン" />
      </form>
      <a class="login_newAcount" href="./pages/acount/acount_new.php">新規登録はコチラ</a>
      <!-- <a class="login_forget" href="./pages/login_out/login_forget.php">パスワードを忘れた方はコチラ</a> -->
    </div>
    <?php require("./pages/common/footer.php"); ?>
  </div>
</body>

</html>
