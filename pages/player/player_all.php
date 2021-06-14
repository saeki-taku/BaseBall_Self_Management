<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/function.php');
referer();
$login_user = $_SESSION['login_user'];

$result_player_all = Player::getPlayerAll($_GET['user_id']);

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
  <link rel="stylesheet" href="../../assets/css/player/player_all.css" />
  <script type="text/javascript" src="../../assets/js/index.js"></script>
  <title>BBSM|選手一覧</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php require("../common/header_dark.php") ?>
    <div class="playerAll">
      <?php $title = "選手一覧";
      require("../common/title_dark.php"); ?>
      <div class="playerAll_wrapper">
        <article class="playerAll_container">
          <!-- 切り替えタブ -->
          <ul class="tab_list">
            <li class="tab_item">
              <a href="#" id="" class="tab_button js-tab_button is-active" data-id="tab_third">3学年</a>
            </li>
            <li class="tab_item">
              <a href="#" id="" class="tab_button js-tab_button" data-id="tab_second">2学年</a>
            </li>
            <li class="tab_item">
              <a href="#" id="" class="tab_button js-tab_button" data-id="tab_first">1学年</a>
            </li>
          </ul>
          <!-- 三学年 -->
          <ul id="tab_third" class="playerAll_list js-tab_target is-active">
            <?php foreach ($result_player_all as $column) : ?>
              <?php if ($column['school_year'] == 3) : ?>
                <li class="playerAll_item">
                  <img class="playerInfo_face" src="<?= $column['file_name'] ? $column['file_path'] : "../../assets/img/player_face.jpg"; ?>" alt="" width="90" height="90" />
                  <div class="playerInfo_wrap">
                    <p class="playerInfo_schoolyear"><?= h($column['school_year']); ?>年生</p>
                    <p class="playerInfo_name"><?= h($column['players_name']); ?></p>
                    <p class="playerInfo_furigana"><?= h($column['players_furigana']); ?></p>
                  </div>
                  <span class="playerInfo_num"><?= h($column['players_number']); ?></span>
                  <a class="playerInfo_link" href="../../pages/player/player.php?id=<?php echo $column['id'] ?>">詳しく</a>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
          <!-- 二学年 -->
          <ul id="tab_second" class="playerAll_list js-tab_target">
            <?php foreach ($result_player_all as $column) : ?>
              <?php if ($column['school_year'] == 2) : ?>
                <li class="playerAll_item">
                  <img class="playerInfo_face" src="<?= $column['file_name'] ? $column['file_path'] : "../../assets/img/player_face.jpg"; ?>" alt="" width="90" height="90" />
                  <div class="playerInfo_wrap">
                    <p class="playerInfo_schoolyear"><?= h($column['school_year']); ?>生年</p>
                    <p class="playerInfo_name"><?= h($column['players_name']); ?></p>
                    <p class="playerInfo_furigana"><?= h($column['players_furigana']); ?></p>
                  </div>
                  <span class="playerInfo_num"><?= h($column['players_number']); ?></span>
                  <a class="playerInfo_link" href="../../pages/player/player.php?id=<?php echo $column['id'] ?>">詳しく</a>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
          <!-- 一学年 -->
          <ul id="tab_first" class="playerAll_list js-tab_target">
            <?php foreach ($result_player_all as $column) : ?>
              <?php if ($column['school_year'] == 1) : ?>
                <li class="playerAll_item">
                  <img class="playerInfo_face" src="<?= $column['file_name'] ? $column['file_path'] : "../../assets/img/player_face.jpg"; ?>" alt="" width="90" height="90" />
                  <div class="playerInfo_wrap">
                    <p class="playerInfo_schoolyear"><?= h($column['school_year']); ?>生年</p>
                    <p class="playerInfo_name"><?= h($column['players_name']); ?></p>
                    <p class="playerInfo_furigana"><?= h($column['players_furigana']); ?></p>
                  </div>
                  <span class="playerInfo_num"><?= h($column['players_number']); ?></span>
                  <a class="playerInfo_link" href="../../pages/player/player.php?id=<?php echo $column['id'] ?>">詳しく</a>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </article>
        <?php require("../common/sidebar_dark.php"); ?>
      </div>
    </div>
    <?php require("../common/footer_dark.php"); ?>
  </div>
</body>

</html>
