<?php
session_start();
require_once('../../model/Order.php');
require_once('../../model/function.php');
referer();

$edit_id = $_POST['edit_id'];

$order_title_sub = filter_input(INPUT_POST, 'orders_title_sub', FILTER_SANITIZE_SPECIAL_CHARS);

$order_name_1_sub = filter_input(INPUT_POST, 'order_name_1_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_2_sub = filter_input(INPUT_POST, 'order_name_2_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_3_sub = filter_input(INPUT_POST, 'order_name_3_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_4_sub = filter_input(INPUT_POST, 'order_name_4_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_5_sub = filter_input(INPUT_POST, 'order_name_5_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_6_sub = filter_input(INPUT_POST, 'order_name_6_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_7_sub = filter_input(INPUT_POST, 'order_name_7_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_8_sub = filter_input(INPUT_POST, 'order_name_8_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_9_sub = filter_input(INPUT_POST, 'order_name_9_sub', FILTER_SANITIZE_SPECIAL_CHARS);

$position_1_sub = filter_input(INPUT_POST, 'position_1_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$position_2_sub = filter_input(INPUT_POST, 'position_2_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$position_3_sub = filter_input(INPUT_POST, 'position_3_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$position_4_sub = filter_input(INPUT_POST, 'position_4_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$position_5_sub = filter_input(INPUT_POST, 'position_5_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$position_6_sub = filter_input(INPUT_POST, 'position_6_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$position_7_sub = filter_input(INPUT_POST, 'position_7_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$position_8_sub = filter_input(INPUT_POST, 'position_8_sub', FILTER_SANITIZE_SPECIAL_CHARS);
$position_9_sub = filter_input(INPUT_POST, 'position_9_sub', FILTER_SANITIZE_SPECIAL_CHARS);

$order_editData = array(
  $order_title_sub,
  $position_1_sub,$position_2_sub,$position_3_sub,$position_4_sub,$position_5_sub,$position_6_sub,$position_7_sub,$position_8_sub,$position_9_sub,
  $order_name_1_sub,$order_name_2_sub,$order_name_3_sub,$order_name_4_sub,$order_name_5_sub,$order_name_6_sub,$order_name_7_sub,$order_name_8_sub,$order_name_9_sub,
  $edit_id
);

echo "<br>";
var_dump($order_editData);
Order::editOrder_sub($order_editData);

header('Location: ./coach.php?user_id='.$edit_id);
