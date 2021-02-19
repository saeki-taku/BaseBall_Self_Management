<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/function.php');
referer();
$login_user = $_SESSION['login_user']['id'];

$delete_id = $_GET['delete_id'];
$result =  Player::deleteCondition($delete_id);
header('Location: ./condition.php?user_id='.$login_user);
return;
echo $result;
