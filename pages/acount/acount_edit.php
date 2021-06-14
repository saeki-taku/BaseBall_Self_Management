<?php
session_start();
require_once('../../model/Acount.php');
require_once('../../model/function.php');
referer();
$login_user = $_SESSION['login_user'];
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
      <div class="acountEdit_container">
        <p class="acountEdit_text">
          下記に情報を入力の上、<br />
          更新ボタンのクリックをお願い致します。
        </p>
        <form class="acountEdit_from" action="../acount/acount_edit_complete.php" method="post">
          <input class="acountEdit_name" type="text" name="team_name" placeholder="チームネーム" value="<?= $login_user['team_name'] ?>" />
          <input class="acountEdit_pass" type="text" name="mail" placeholder="メールアドレス" value="<?= $login_user['mail'] ?>" />
          <input class="acountEdit_pass" type="text" name="old_password" placeholder="古いパスワード" />
          <input class="acountEdit_pass" type="text" name="new_password" placeholder="新しいパスワード" />
          <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
          <input class="acountEdit_button" type="submit" name="submit" value="更新" />
        </form>
        <div class="acountEdit_action">
          <a href="../acount/acount_delete.php" class="acountEdit_delete">削除はコチラ</a>
        </div>
      </div>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
