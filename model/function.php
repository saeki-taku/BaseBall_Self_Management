<?php
/**
 * XSS対策: エスケープ処理
 *
 * @param string $str 対象の文字列
 * @return string 処理された文字列
 */

 function h($str) {
   return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
 }
 /**
 * CSRF対策
 *
 * @param void
 * @return string $csrf_token
 */
 function setToken() {
   //トークン生成
   //フォームからそのトークンを送信
   //送信後の画面でそのトークンを照会
   //トークンを削除
   $csrf_token = bin2hex(random_bytes(32));
   $_SESSION['csrf_token'] = $csrf_token;

   return $csrf_token;
 }
 /**
 * リファーラー
 * @param void
 */
 function referer() {
  $referer = $_SERVER['HTTP_REFERER'];

  if (!isset($referer)) {
    header('Location: ../main/main.php');
    exit();
  }
 }

 /**
 * recordバリデート
 * @param void
 */
 function record_validate($record_array) {
  $err_message = [];

  if (!empty($record_array['height']) && (!is_numeric($record_array['height']))) {
    $err_message['height'] = "数字のみの入力になります";
  }
  if (!empty($record_array['height_2']) && (!is_numeric($record_array['height_2']))) {
    $err_message['height_2'] = "数字のみの入力になります";
  }
  if (!empty($record_array['height_3']) && (!is_numeric($record_array['height_3']))) {
    $err_message['height_3'] = "数字のみの入力になります";
  }
  if (!empty($record_array['weight']) && (!is_numeric($record_array['weight']))) {
    $err_message['weight'] = "数字のみの入力になります";
  }
  if (!empty($record_array['weight_2']) && (!is_numeric($record_array['weight_2']))) {
    $err_message['weight_2'] = "数字のみの入力になります";
  }
  if (!empty($record_array['weight_3']) && (!is_numeric($record_array['weight_3']))) {
    $err_message['weight_3'] = "数字のみの入力になります";
  }
  if (!empty($record_array['run_time']) && (!is_numeric($record_array['run_time']))) {
    $err_message['run_time'] = "数字のみの入力になります";
  }
  if (!empty($record_array['run_time_2']) && (!is_numeric($record_array['run_time_2']))) {
    $err_message['run_time_2'] = "数字のみの入力になります";
  }
  if (!empty($record_array['run_time_3']) && (!is_numeric($record_array['run_time_3']))) {
    $err_message['run_time_3'] = "数字のみの入力になります";
  }
  if (!empty($record_array['long_cast']) && (!is_numeric($record_array['long_cast']))) {
    $err_message['long_cast'] = "数字のみの入力になります";
  }
  if (!empty($record_array['long_cast_2']) && (!is_numeric($record_array['long_cast_2']))) {
    $err_message['long_cast_2'] = "数字のみの入力になります";
  }
  if (!empty($record_array['long_cast_3']) && (!is_numeric($record_array['long_cast_3']))) {
    $err_message['long_cast_3'] = "数字のみの入力になります";
  }
  if (!empty($record_array['ballspeed']) && (!is_numeric($record_array['ballspeed']))) {
    $err_message['ballspeed'] = "数字のみの入力になります";
  }
  if (!empty($record_array['ballspeed_2']) && (!is_numeric($record_array['ballspeed_2']))) {
    $err_message['ballspeed_2'] = "数字のみの入力になります";
  }
  if (!empty($record_array['ballspeed_3']) && (!is_numeric($record_array['ballspeed_3']))) {
    $err_message['ballspeed_3'] = "数字のみの入力になります";
  }
  if (!empty($record_array['hit_average']) && (!is_numeric($record_array['hit_average']))) {
    $err_message['hit_average'] = "数字のみの入力になります";
  }
  if (!empty($record_array['hit_average_2']) && (!is_numeric($record_array['hit_average_2']))) {
    $err_message['hit_average_2'] = "数字のみの入力になります";
  }
  if (!empty($record_array['hit_average_3']) && (!is_numeric($record_array['hit_average_3']))) {
    $err_message['hit_average_3'] = "数字のみの入力になります";
  }
  return $err_message;
 }


?>
