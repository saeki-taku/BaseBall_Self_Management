<?php
require_once(dirname(__FILE__)."/../config/config.php");
// require_once("../../config/config.php");

function connect() {
  $host = DB_HOST;
  $db   = DB_NAME;
  $user = DB_USER;
  $pass = DB_PASS;

  $dsn = "mysql:host=$host;dbname=$db;charaset=utf8";
  // $dsn = "mysql:host=$host;dbname=$db;";

  try {
    $pdo = new PDO($dsn, $user, $pass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
  } catch(PDOException $e) {
    echo "接続失敗です";
    exit ($e->getMessage());
    // echo "接続失敗です".$e->getMessage();
  }
}

