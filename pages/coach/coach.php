<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/Order.php');
require_once('../../model/function.php');
referer();
$login_user = $_SESSION['login_user'];

$result_player_all = Player::getPlayerAll($_GET['user_id']);
$result_order = Order::getOrder_main($_GET['user_id']);
$result_order_sub = Order::getOrder_sub($_GET['user_id']);

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
  <link rel="stylesheet" href="../../assets/css/coach/coach.css" />
  <script type="text/javascript" src="../../assets/js/index.js"></script>
  <title>BBSM|監督室</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="coach">
      <?php $title = "監督室";
      require("../common/title.php"); ?>
      <div class="coach_wrapper">
        <div class="coach_containerTop">
          <section class="coach_playerAll">
            <!-- 切り替えタブ -->
            <ul class="tab_list">
              <li class="tab_item" id="">
                <a href="#" id="" class="tab_button js-tab_button is-active" data-id="tab_third">3学年</a>
              </li>
              <li class="tab_item" id="">
                <a href="#" id="" class="tab_button js-tab_button" data-id="tab_second">2学年</a>
              </li>
              <li class="tab_item">
                <a href="#" id="" class="tab_button js-tab_button" data-id="tab_first">1学年</a>
              </li>
            </ul>
            <!-- 三学年 -->
            <ul id="tab_third" class="coach-playerAll_list js-tab_target is-active">
              <?php foreach ($result_player_all as $column) : ?>
                <?php if ($column['school_year'] == 3) : ?>
                  <li class="coach-playerAll_item">
                    <img class="playerInfo_face" src="<?= $column['file_name'] ? $column['file_path'] : "../../assets/img/player_face.jpg"; ?>" alt="" width="90px" height="90px" />
                    <div class="playerInfo_wrap">
                      <p class="playerInfo_schoolyear"><?= h($column['school_year']); ?>年生</p>
                      <p class="playerInfo_name"><?= h($column['players_name']); ?></p>
                      <p class="playerInfo_furigana"><?= h($column['players_furigana']); ?></p>
                    </div>
                    <span class="playerInfo_num"><?= h($column['players_number']); ?></span>
                    <a class="playerInfo_link" href="../player/player.php?id=<?php echo $column['id'] ?>">詳しく</a>
                    <!-- <a class="playerInfo_link" href="../coach/coach_player.php?id=<?php echo $column['id'] ?>">詳しく</!-->
                  </li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
            <!-- 二学年 -->
            <ul id="tab_second" class="coach-playerAll_list js-tab_target">
              <?php foreach ($result_player_all as $column) : ?>
                <?php if ($column['school_year'] == 2) : ?>
                  <li class="coach-playerAll_item">
                    <img class="playerInfo_face" src="<?= $column['file_name'] ? $column['file_path'] : "../../assets/img/player_face.jpg"; ?>" alt="" width="90px" height="90px" />
                    <div class="playerInfo_wrap">
                      <p class="playerInfo_schoolyear"><?= h($column['school_year']); ?>年生</p>
                      <p class="playerInfo_name"><?= h($column['players_name']); ?></p>
                      <p class="playerInfo_furigana"><?= h($column['players_furigana']); ?></p>
                    </div>
                    <span class="playerInfo_num"><?= h($column['players_number']); ?></span>
                    <a class="playerInfo_link" href="../player/player.php?id=<?php echo $column['id'] ?>">詳しく</a>
                    <!-- <a class="playerInfo_link" href="../coach/coach_player.php?id=<?php echo $column['id'] ?>">詳しく</a> -->
                  </li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
            <!-- 一学年 -->
            <ul id="tab_first" class="coach-playerAll_list js-tab_target">
              <?php foreach ($result_player_all as $column) : ?>
                <?php if ($column['school_year'] == 1) : ?>
                  <li class="coach-playerAll_item">
                    <img class="playerInfo_face" src="<?= $column['file_name'] ? $column['file_path'] : "../../assets/img/player_face.jpg"; ?>" alt="" width="90px" height="90px" />
                    <div class="playerInfo_wrap">
                      <p class="playerInfo_schoolyear"><?= h($column['school_year']); ?>年生</p>
                      <p class="playerInfo_name"><?= h($column['players_name']); ?></p>
                      <p class="playerInfo_furigana"><?= h($column['players_furigana']); ?></p>
                    </div>
                    <span class="playerInfo_num"><?= h($column['players_number']); ?></span>
                    <a class="playerInfo_link" href="../player/player.php?id=<?= $column['id'] ?>">詳しく</a>
                    <!-- <a class="playerInfo_link" href="../coach/coach_player.php?id=<?php echo $column['id'] ?>">詳しく</a> -->
                  </li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </section>
          <?php require("../common/sidebar.php"); ?>
        </div>
        <div class="coach_conatinerBottom">
          <section class="coach_order" id="anker_order">
            <ul class="order_list">
            <?php if ($result_order['user_id'] > 0) : ?>
              <li class="order_item">
                <h3 class="order_title"><?= $result_order['orders_title'] ?></h3>
                <table class="order_table">
                  <tr class="order_tr">
                    <th>1</th>
                    <td><?= $result_order['order_name_1'] ?></td>
                    <td><?= $result_order['position_1'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>2</th>
                    <td><?= $result_order['order_name_2'] ?></td>
                    <td><?= $result_order['position_2'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>3</th>
                    <td><?= $result_order['order_name_3'] ?></td>
                    <td><?= $result_order['position_3'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>4</th>
                    <td><?= $result_order['order_name_4'] ?></td>
                    <td><?= $result_order['position_4'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>5</th>
                    <td><?= $result_order['order_name_5'] ?></td>
                    <td><?= $result_order['position_5'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>6</th>
                    <td><?= $result_order['order_name_6'] ?></td>
                    <td><?= $result_order['position_6'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>7</th>
                    <td><?= $result_order['order_name_7'] ?></td>
                    <td><?= $result_order['position_7'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>8</th>
                    <td><?= $result_order['order_name_8'] ?></td>
                    <td><?= $result_order['position_8'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>9</th>
                    <td><?= $result_order['order_name_9'] ?></td>
                    <td><?= $result_order['position_9'] ?></td>
                  </tr>
                </table>
                <a href="../coach/coach_order_edit.php?user_id=<?= $login_user['id'] ?>" class="order_editLink">オーダー編集</a>
              </li>
              <?php else : ?>
              <div class="add_button add_condition">
                <a class="add_buttonLink" href="../coach/coach_order_add.php?order_add=<?= $login_user['id']; ?>">オーダー①の追加</a>
              </div>
            <?php endif; ?>
            <?php if ($result_order_sub['user_id'] > 0) : ?>
              <li class="order_item">
                <h3 class="order_title"><?= $result_order_sub['orders_title_sub'] ?></h3>
                <table class="order_table">
                  <tr class="order_tr">
                    <th>1</th>
                    <td><?= $result_order_sub['order_name_1_sub'] ?></td>
                    <td><?= $result_order_sub['position_1_sub'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>2</th>
                    <td><?= $result_order_sub['order_name_2_sub'] ?></td>
                    <td><?= $result_order_sub['position_2_sub'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>3</th>
                    <td><?= $result_order_sub['order_name_3_sub'] ?></td>
                    <td><?= $result_order_sub['position_3_sub'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>4</th>
                    <td><?= $result_order_sub['order_name_4_sub'] ?></td>
                    <td><?= $result_order_sub['position_4_sub'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>5</th>
                    <td><?= $result_order_sub['order_name_5_sub'] ?></td>
                    <td><?= $result_order_sub['position_5_sub'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>6</th>
                    <td><?= $result_order_sub['order_name_6_sub'] ?></td>
                    <td><?= $result_order_sub['position_6_sub'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>7</th>
                    <td><?= $result_order_sub['order_name_7_sub'] ?></td>
                    <td><?= $result_order_sub['position_7_sub'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>8</th>
                    <td><?= $result_order_sub['order_name_8_sub'] ?></td>
                    <td><?= $result_order_sub['position_8_sub'] ?></td>
                  </tr>
                  <tr class="order_tr">
                    <th>9</th>
                    <td><?= $result_order_sub['order_name_9_sub'] ?></td>
                    <td><?= $result_order_sub['position_9_sub'] ?></td>
                  </tr>
                </table>
                <a href="../coach/coach_order_edit_sub.php?user_id=<?= $login_user['id'] ?>" class="order_editLink">オーダー編集</a>
              </li>
              <?php else : ?>
              <div class="add_button add_condition">
                <a class="add_buttonLink" href="../coach/coach_order_add_sub.php?order_add=<?= $login_user['id']; ?>">オーダー②の追加</a>
              </div>
            <?php endif; ?>
            </ul>
            <!-- <a href="../coach/coach_order_edit.php?user_id=<?= $login_user['id'] ?>" class="order_editLink">オーダー編集</a> -->
          </section>
        </div>
      </div>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
