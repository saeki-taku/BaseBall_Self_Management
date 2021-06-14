<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/function.php');

referer();
$result_condition = Player::getPlayerCondition($_GET['condition_edit']);
$edit_id = $_GET['condition_edit'];
$path = "../player/player.php?id=";

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
  <link rel="stylesheet" href="../../assets/css/player/player_condition_edit.css" />
  <title>BBSM|コンディション編集</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php require("../common/header_dark.php") ?>
    <div class="conditionEdit">
      <?php $title = "コンディション編集";
      require("../common/title_dark.php"); ?>
      <article class="conditionEdit_container">
        <h3 class="conditionEdit_name"><?= h($result_condition['players_name']); ?></h3>
        <form class="conditionEdit_form" action="../player/player_condition_edit_complete.php" method="POST">
          <input type="hidden" name="edit_id" value="<?= $edit_id ?>"">
          <table class=" conditionEdit_table">
          <tr class="conditionEdit_tr">
            <th>部位:</th>
            <td><input class="conditionEdit_input" type="text" name="pain_parts" placeholder="肘" value="<?php if (isset($result_condition['pain_parts'])) echo h($result_condition['pain_parts']); ?>" /></td>
          </tr>
          <tr class="conditionEdit_tr">
            <th>症状:</th>
            <td><input class="conditionEdit_input" type="text" name="pain_contents" placeholder="野球肘" value="<?php if (isset($result_condition['pain_contents'])) echo h($result_condition['pain_contents']); ?>" /></td>
          </tr>
          <tr class="conditionEdit_tr">
            <th>発生時期:</th>
            <td><input class="conditionEdit_input" type="date" name="pain_date" placeholder="2020/10/10" value="<?php if (isset($result_condition['pain_date'])) echo h($result_condition['pain_date']); ?>" /></td>
          </tr>
          <tr class="conditionEdit_tr">
            <th>回復見込み:</th>
            <td><input class="conditionEdit_input" type="date" name="recovery_date" placeholder="2020/12/30" value="<?php if (isset($result_condition['recovery_date'])) echo h($result_condition['recovery_date']); ?>" /></td>
          </tr>
          <tr class="conditionEdit_tr">
            <th>経過:</th>
            <td><input class="conditionEdit_input" type="text" name="pain_progress" placeholder="良好" value="<?php if (isset($result_condition['pain_progress'])) echo h($result_condition['pain_progress']); ?>" /></td>
          </tr>
          <tr class="conditionEdit_tr conditionEdit_tr_intro">
            <th>紹介文:</th>
            <td><textarea class="conditionEdit_textarea" name="pain_memo" id="" cols="" rows="" placeholder="その他・報告メモなど"><?php if (isset($result_condition['pain_memo'])) echo h($result_condition['pain_memo']); ?></textarea>
            </td>
          </tr>
          </table>
          <input class="conditionEdit_submit" type="submit" value="更新" />
        </form>
        <div class="conditionEdit_action">
          <a href="<?= $path.$edit_id ;?>" class="conditionEdit_back">戻る</a>
        </div>
      </article>
    </div>
    <?php require("../common/footer_dark.php"); ?>
  </div>
</body>

</html>
