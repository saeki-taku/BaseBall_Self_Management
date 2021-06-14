<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/function.php');
referer();

$result_record = Player::getPlayerRecord($_GET['record_edit']);
$edit_id = $_GET['record_edit'];
if (!empty($_SESSION['record_err'])) {
  $err_message = $_SESSION['record_err'];
}

$path =  "../player/player.php?id=";

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="apple-touch-icon" sizes="180x180" href="../../assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="../../assets/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="../../assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="../../assets/css/common/header.css" />
  <link rel="stylesheet" href="../../assets/css/common/footer.css" />
  <link rel="stylesheet" href="../../assets/css/common/sidebar.css" />
  <link rel="stylesheet" href="../../assets/css/common/title.css" />
  <link rel="stylesheet" href="../../assets/css/reset.css" />
  <link rel="stylesheet" href="../../assets/css/player/player_record_edit.css" />
  <title>BBSM|記録編集</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php require("../common/header_dark.php") ?>
    <div class="recordEdit">
      <?php $title = "記録編集";
      require("../common/title_dark.php"); ?>
      <article class="recordEdit_wrapper">
        <h3 class="recordEdit_name"><?= h($result_record['players_name']); ?></h3>
        <?php if (!empty($err_message)) : ?>
          <p class="err_message">入力は全て数字になります</p>
        <?php endif; ?>
        <form class="recordEdit_container" action="../player/player_record_edit_complete.php" method="POST">
          <input type="hidden" name="edit_id" value="<?= $edit_id ?>">
          <table class="recordEdit_table">
            <tr class="recordEdit_tr">
              <th></th>
              <th>1年生</th>
              <th>2年生</th>
              <th>3年生</th>
            </tr>
            <tr class="recordEdit_tr">
              <td>身長</td>
              <td>
                <input type="num" name="height" value="<?php if (isset($result_record['height'])) echo h($result_record['height']); ?>" placeholder="例:175">cm
              </td>
              <td>
                <input type="text" name="height_2" value="<?php if (isset($result_record['height_2'])) echo h($result_record['height_2']); ?>">cm
              </td>
              <td>
                <input type="text" name="height_3" value="<?php if (isset($result_record['height_3'])) echo h($result_record['height_3']); ?>">cm
              </td>
            </tr>
            <tr class="recordEdit_tr">
              <td>体重</td>
              <td>
                <input type="text" name="weight" value="<?php if (isset($result_record['weight'])) echo h($result_record['weight']); ?>" placeholder="例:70">kg
              </td>
              <td>
                <input type="text" name="weight_2" value="<?php if (isset($result_record['weight_2'])) echo h($result_record['weight_2']); ?>">kg
              </td>
              <td>
                <input type="text" name="weight_3" value="<?php if (isset($result_record['weight_3'])) echo h($result_record['weight_3']); ?>">kg
              </td>
            </tr>
            <tr class="recordEdit_tr">
              <td>50m走</td>
              <td><input type="text" name="run_time" value="<?php if (isset($result_record['run_time'])) echo h($result_record['run_time']); ?>" placeholder="例:6.40">秒
              </td>
              <td><input type="text" name="run_time_2" value="<?php if (isset($result_record['run_time_2'])) echo h($result_record['run_time_2']); ?>">秒
              </td>
              <td><input type="text" name="run_time_3" value="<?php if (isset($result_record['run_time_3'])) echo h($result_record['run_time_3']); ?>">秒
              </td>
            </tr>
            <tr class="recordEdit_tr">
              <td>遠投</td>
              <td><input type="text" name="long_cast" value="<?php if (isset($result_record['long_cast'])) echo h($result_record['long_cast']); ?>" aceholder="例:85">m
              </td>
              <td><input type="text" name="long_cast_2" value="<?php if (isset($result_record['long_cast_2'])) echo h($result_record['long_cast_2']); ?>">m
              </td>
              <td><input type="text" name="long_cast_3" value="<?php if (isset($result_record['long_cast_3'])) echo h($result_record['long_cast_3']); ?>">m
              </td>
            </tr>
            <tr class="recordEdit_tr">
              <td>球速</td>
              <td><input type="text" name="ballspeed" value="<?php if (isset($result_record['ballspeed'])) echo h($result_record['ballspeed']); ?>" placeholder="例:130">km/h
              </td>
              <td><input type="text" name="ballspeed_2" value="<?php if (isset($result_record['ballspeed_2'])) echo h($result_record['ballspeed_2']); ?>">km/h
              </td>
              <td><input type="text" name="ballspeed_3" value="<?php if (isset($result_record['ballspeed_3'])) echo h($result_record['ballspeed_3']); ?>">km/h
              </td>
            </tr>
            <tr class="recordEdit_tr">
              <td>打率</td>
              <td><input type="text" name="hit_average" value="<?php if (isset($result_record['hit_average'])) echo h($result_record['hit_average']); ?>" placeholder="例:0.350">
              </td>
              <td><input type="text" name="hit_average_2" value="<?php if (isset($result_record['hit_average_2'])) echo h($result_record['hit_average_2']); ?>">
              </td>
              <td><input type="text" name="hit_average_3" value="<?php if (isset($result_record['hit_average_3'])) echo h($result_record['hit_average_3']); ?>">
              </td>
            </tr>
          </table>
          <input class="recordEdit_submit" type="submit" value="更新" />
        </form>
        <div class="recordEdit_action">
          <a href="<?= $path.$edit_id ;?>" class="recordEdit_back">戻る</a>
        </div>
      </article>
    </div>
    <?php require("../common/footer_dark.php"); ?>
  </div>
</body>

</html>
