<?php
session_start();
require_once('../../model/Acount.php');
require_once('../../model/function.php');
referer();

$result_delete = Acount::deleteAcount($_POST['user_id']);
if (!$result_delete) {
  return;
} else {
  Acount::logout();
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
  <link rel="stylesheet" href="../../assets/css/common/sidebar.css" />
  <link rel="stylesheet" href="../../assets/css/common/title.css" />
  <link rel="stylesheet" href="../../assets/css/reset.css" />
  <link rel="stylesheet" href="../../assets/css/acount/acount_delete.css" />
  <title>BBSM|アカウント削除</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="acount_delete">
      <?php $title = "アカウント削除";
      require("../common/title.php"); ?>
      <article class="acount_delete_container">
        <?php if (!$result_delete) : ?>
          <p class="err_msg"><?= "削除に失敗しました" ?></p>
          <div class="err_back">
            <a class="" href="./acount_edit.php?user_id=<?= $login_user_id; ?>">戻る</a>
          </div>
        <?php else : ?>
          <div class="acount_delete_wrap">
            <p class="acount_delete_word">削除が完了しました</p>
            <div class="acount_delete_linkWrap">
              <a href="../acount/acount_new.php" class="recordEditComplete_back">トップ画面へ</a>
            </div>
          </div>
        <?php endif ?>
      </article>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
