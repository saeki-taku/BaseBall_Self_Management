<?php
session_start();
require_once('../../model/Order.php');
require_once('../../model/function.php');
referer();

$edit_id = $_POST['edit_id'];

$order_title = filter_input(INPUT_POST, 'orders_title', FILTER_SANITIZE_SPECIAL_CHARS);

$order_name_1 = filter_input(INPUT_POST, 'order_name_1', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_2 = filter_input(INPUT_POST, 'order_name_2', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_3 = filter_input(INPUT_POST, 'order_name_3', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_4 = filter_input(INPUT_POST, 'order_name_4', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_5 = filter_input(INPUT_POST, 'order_name_5', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_6 = filter_input(INPUT_POST, 'order_name_6', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_7 = filter_input(INPUT_POST, 'order_name_7', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_8 = filter_input(INPUT_POST, 'order_name_8', FILTER_SANITIZE_SPECIAL_CHARS);
$order_name_9 = filter_input(INPUT_POST, 'order_name_9', FILTER_SANITIZE_SPECIAL_CHARS);

$position_1 = filter_input(INPUT_POST, 'position_1', FILTER_SANITIZE_SPECIAL_CHARS);
$position_2 = filter_input(INPUT_POST, 'position_2', FILTER_SANITIZE_SPECIAL_CHARS);
$position_3 = filter_input(INPUT_POST, 'position_3', FILTER_SANITIZE_SPECIAL_CHARS);
$position_4 = filter_input(INPUT_POST, 'position_4', FILTER_SANITIZE_SPECIAL_CHARS);
$position_5 = filter_input(INPUT_POST, 'position_5', FILTER_SANITIZE_SPECIAL_CHARS);
$position_6 = filter_input(INPUT_POST, 'position_6', FILTER_SANITIZE_SPECIAL_CHARS);
$position_7 = filter_input(INPUT_POST, 'position_7', FILTER_SANITIZE_SPECIAL_CHARS);
$position_8 = filter_input(INPUT_POST, 'position_8', FILTER_SANITIZE_SPECIAL_CHARS);
$position_9 = filter_input(INPUT_POST, 'position_9', FILTER_SANITIZE_SPECIAL_CHARS);

$order_editData = array(
  $order_title,
  $position_1,$position_2,$position_3,$position_4,$position_5,$position_6,$position_7,$position_8,$position_9,
  $order_name_1,$order_name_2,$order_name_3,$order_name_4,$order_name_5,$order_name_6,$order_name_7,$order_name_8,$order_name_9,
  $edit_id
);

echo "<br>";
var_dump($order_editData);
Order::editOrder_main($order_editData);

header('Location: ./coach.php?user_id='.$edit_id);
