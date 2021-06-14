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
  <link rel="stylesheet" href="../../assets/css/acount/acount_delete.css" />
  <title>BBSM|アカウント削除</title>
</head>

<body>
  <div class="wrapper">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="acountDelete">
      <?php $title = "アカウント削除";
      require("../common/title.php"); ?>
      <div class="acountDelete_container">
        <p class="acountDelete_text">
          下記にアカウントを削除します。<br />
          宜しければ削除ボタンのクリックをお願い致します。
        </p>
        <form class="acountDelete_from" action="../acount/acount_delete_complete.php" method="post">
          <input type="hidden" name="user_id" value="<?= $login_user['id'] ?>">
          <input class="acountDelete_name" type="text" placeholder="チームネーム" value="<?= $login_user['team_name'] ?>" />
          <input class="acountDelete_pass" type="text" placeholder="メールアドレス" value="<?= $login_user['mail'] ?>" />
          <input class="acountDelete_button" type="submit" name="submit" value="削除" />
        </form>
        <div class="acountDelete_action">
          <a href="../acount/acount_edit.php?user_id=<?= $login_user['id'] ?>" class="acountDelete_back">戻る</a>
        </div>
      </div>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
