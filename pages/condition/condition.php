<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/function.php');
referer();
$login_user = $_SESSION['login_user'];

$result_condition_all = Player::getPlayerConditionAll($_GET['user_id']);
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
  <link rel="stylesheet" href="../../assets/css/condition/condition.css" />
  <title>BBSM|コンディション</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php require("../common/header_dark.php") ?>
    <div class="condtion">
      <?php $title = "コンディションリスト";
      require("../common/title_dark.php"); ?>
      <div class="condition_wrapper common_wrapper">
        <article class="condition_container">
          <ul class="condition_list">
            <?php foreach ($result_condition_all as $column) : ?>
              <li class="condition_item">
                <img class="condition_playerImg" src="<?= $column['file_name'] ? $column['file_path'] : "../../assets/img/player_face.jpg"; ?>" alt="" width="90" height="90" />
                <div class="condition_wrap">
                  <p class="condition_playerName"><?= h($column['players_name']); ?></p>
                  <p class="condition_date"><span>発症時期:</span><?= h($column['pain_date']); ?></p>
                  <p class="condition_parts"><span>発症部位:</span><?= h($column['pain_parts']); ?></p>
                  <p class="condition_progress"><span>経過:</span><?= h($column['pain_progress']); ?></p>
                  <div class="condtion_linkWrap">
                    <a href="../player/player.php?id=<?= $column['id']; ?>" class="condition_detailLink">詳しく</a>
                    <a href="../condition/condition_delete.php?delete_id=<?= $column['id'] ?>" onclick="if(!confirm('<?= $column['players_name'] ?>を完治したのでコンディションリストから削除します。よろしいでしょうか？')) return false;" class="condition_recovery">完治</a>
                  </div>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
          <div class="condition_add">
          </div>
        </article>
        <?php require("../common/sidebar_dark.php"); ?>
      </div>
    </div>
    <?php require("../common/footer_dark.php"); ?>
  </div>
</body>

</html>
