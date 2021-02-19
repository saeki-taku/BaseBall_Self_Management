<?php
session_start();
require_once('../../model/Order.php');
require_once('../../model/function.php');
referer();

var_dump($_GET['order_add']);
$add_id = $_GET['order_add'];
var_dump($add_id);
Order::addOrder_sub($add_id);
$path = 'Location: ./coach.php?user_id=';
header($path . $add_id);
?>
