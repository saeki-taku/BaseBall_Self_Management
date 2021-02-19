<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/function.php');
referer();

$add_id = $_GET['record_add'];

Player::addPlayerRecord($add_id);
$path = 'Location: ./player.php?id=';
header($path . $add_id);
?>
