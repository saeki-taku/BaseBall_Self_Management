<?php
session_start();
require_once('../../model/Acount.php');
require_once('../../model/function.php'); //test_main.php
referer();
//ログインしているかを判定し、していなかったら新規登録画面へ戻す。//test_main
$result = Acount::checkLogin();

if (!$result) {
  $_SESSION['login_err'] = 'ユーザーを登録してください';
  header('Location: ../acount/acount_new.php');
  return;
  exit;
}
$login_user = $_SESSION['login_user'];

if (isset($_SESSION['playerAdd_err'])) { //編集に遷移する前にSESSION['record_err']を空にする
  $_SESSION['playerAdd_err'] = [];
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
  <link rel="stylesheet" href="../../assets/css/reset.css" />
  <link rel="stylesheet" href="../../assets/css/main/main.css" />
  <title>BBSM|メニュー</title>
</head>

<body>
  <div class="wrapper">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="main">
      <ul class="main_list">
        <li class="main_item">
          <a class="main_link" href="../player/player_all.php?user_id=<?php echo $login_user['id'] ?>">
            <p class="main_linkWord">選手一覧</p>
          </a>
        </li>
        <li class="main_item">
          <a class="main_link" href="../condition/condition.php?user_id=<?php echo $login_user['id'] ?>">
            <p class="main_linkWord">コンディションリスト</p>
          </a>
        </li>
        <li class="main_item">
          <a class="main_link" href="../schedule/calendar.php?user_id=<?php echo $login_user['id'] ?>">
            <p class="main_linkWord">日程表</p>
          </a>
        </li>
        <li class="main_item">
          <a class="main_link" href="../coach/coach.php?user_id=<?php echo $login_user['id'] ?>">
            <p class="main_linkWord">監督室</p>
          </a>
        </li>
        <li class="main_item">
          <a class="main_link" href="../player_add/player_add.php?user_id=<?php echo $login_user['id'] ?>">
            <p class="main_linkWord">選手登録</p>
          </a>
        </li>
        <li class="main_item">
          <a class="main_link" href="../acount/acount_edit.php?user_id=<?php echo $login_user['id'] ?>">
            <p class="main_linkWord">アカウント編集</p>
          </a>
        </li>
      </ul>
      <form action="../login_out/logout.php" class="logout_form" method="post">
        <input class="logout_button" type="submit" name="logout" value="ログアウト">
      </form>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
