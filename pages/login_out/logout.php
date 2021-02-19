<?php
session_start();
require_once('../../model/Acount.php');

if (!$logout = filter_input(INPUT_POST, 'logout')) { //logoutのnameがなければ(logoutボタンが押されてなければ実行)
  exit('不正なリクエスト');
}
//ログインしているかを判定し、セッションが切れていたらログインしてくださいとメッセージを出す。
$result = Acount::checkLogin();

if (!$result) {
  exit('セッションが切れましたので再ログインしてください。');
}
//ログアウト
Acount::logout();//ログアウト関数の実行

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="../../assets/css/common/header.css" />
  <link rel="stylesheet" href="../../assets/css/common/footer.css" />
  <link rel="stylesheet" href="../../assets/css/common/title.css" />
  <link rel="stylesheet" href="../../assets/css/reset.css" />
  <link rel="stylesheet" href="../../assets/css/login_out/logout.css" />
  <title>BBSM|ログアウト</title>
</head>

<body>
  <div class="wrapper">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="logout">
      <?php $title = "ログアウト";
      require("../common/title.php"); ?>
      <div class="logout_box">
        <p class="logout_text">ログアウトしました。</p>
        <a href="../../index.php" class="logout_link">ログイン画面へ</a>
      </div>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
  <h2>ログアウト</h2>
  </form>
</body>

</html>
