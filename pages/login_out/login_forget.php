<?php
session_start();
require_once('../../model/Acount.php');

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
  <link rel="stylesheet" href="../../assets/css/***/***.css" />
  <title>BBSM|監督室</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="forget">
      <?php $title = "パスワードリセット";
      require("../common/title.php"); ?>
      <div class="forget_wrapper">
        <form action="" method="post">
          <p class="">登録されているメールアドレスを入力してください。</p>
          <input type="text" name="mail" class="forget">
          <input type="submit" name="forget" value="送信">
        </form>
      </div>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
