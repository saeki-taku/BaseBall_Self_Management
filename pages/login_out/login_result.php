<?php
session_start();
require_once('../../model/Acount.php');


//エラーメッセージ
$err = [];
//バリデート
$mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
if (!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD', $mail)) {
  $err['mail'] = "メールアドレスを入力してください";
}
if (!$password = filter_input(INPUT_POST, 'password')) {
  $err['password'] = "パスワードを入力してください";
};
if (count($err) > 0) {
  //エラーがあった場合はページを戻す
  $_SESSION = $err;
  header('Location: ../../index.php');
  return;
}
//ログインをする処理
$result = Acount::login($mail, $password);
 if(!$result) {
   header('Location: ../../index.php');
   return;
 } else {
   header('Location: ../main/main.php');
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ログイン完了</title>
</head>
<body>
  <p>ログイン完了</p>
  <a href="../main/main.php">マイページへ</a>
</body>
</html>
