<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/Order.php');
require_once('../../model/function.php');
referer();
$login_user = $_SESSION['login_user'];
$edit_id = $_GET['user_id'];

$result_order = Order::getOrder_sub($_GET['user_id']);
$result_order_name = Order::getOrderName($_GET['user_id']);
$path = "../player/player.php?id=";
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="../../assets/css/common/header.css" />
  <link rel="stylesheet" href="../../assets/css/common/footer.css" />
  <link rel="stylesheet" href="../../assets/css/common/sidebar.css" />
  <link rel="stylesheet" href="../../assets/css/common/title.css" />
  <link rel="stylesheet" href="../../assets/css/reset.css" />
  <link rel="stylesheet" href="../../assets/css/coach/coach.css" />
  <link rel="stylesheet" href="../../assets/css/coach/coach_order_edit.css" />
  <script type="text/javascript" src="../../assets/js/index.js"></script>
  <title>BBSM|オーダー編集</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="coach">
      <?php $title = "オーダー";
      require("../common/title.php"); ?>
      <div class="coach_wrapper">
        <div class="coach_conatinerBottom">
          <section class="coach_order" id="anker_order">
            <!-- 送信フォーム -->
            <form action="./coach_order_edit_complete_sub.php" method="post">
              <input type="hidden" name="edit_id" value="<?= $edit_id ?>">
              <div class="order_list order_edit_list">
                <div class="order_item">
                  <h3 class="order_title">
                    <input type="text" name="orders_title_sub" placeholder="4/1 第一試合" value="<?= $result_order['orders_title_sub'] ?>">
                  </h3>
                  <table class="order_table">
                    <tr class="order_tr">
                      <th>1</th>
                      <td>
                        <select name="order_name_1_sub" id="">
                          <option value="<?= $result_order['order_name_1_sub'] ?>">
                            <?= $result_order['order_name_1_sub'] ?>
                          </option>
                          <?php foreach ($result_order_name as $column_name) : ?>
                            <option value="<?= $column_name['players_name'] ?>">
                              <?= $column_name['players_name'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </td>
                      <td>
                        <select name="position_1_sub" id="">
                          <option value="<?= $result_order['position_1_sub'] ?>">
                            <?= $result_order['position_1_sub'] ?>
                          </option>
                          <option value="投">投</option>
                          <option value="捕">捕</option>
                          <option value="一">一</option>
                          <option value="二">二</option>
                          <option value="三">三</option>
                          <option value="遊">遊</option>
                          <option value="左">左</option>
                          <option value="中">中</option>
                          <option value="右">右</option>
                        </select>
                      </td>
                    </tr>
                    <tr class="order_tr">
                      <th>2</th>
                      <td>
                        <select name="order_name_2_sub" id="">
                          <option value="<?= $result_order['order_name_2_sub'] ?>">
                            <?= $result_order['order_name_2_sub'] ?>
                          </option>
                          <?php foreach ($result_order_name as $column_name) : ?>
                            <option value="<?= $column_name['players_name'] ?>">
                              <?= $column_name['players_name'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </td>
                      <td>
                        <select name="position_2_sub" id="">
                          <option value="<?= $result_order['position_2_sub'] ?>">
                            <?= $result_order['position_2_sub'] ?>
                          </option>
                          <option value="投">投</option>
                          <option value="捕">捕</option>
                          <option value="一">一</option>
                          <option value="二">二</option>
                          <option value="三">三</option>
                          <option value="遊">遊</option>
                          <option value="左">左</option>
                          <option value="中">中</option>
                          <option value="右">右</option>
                        </select>
                      </td>
                    </tr>
                    <tr class="order_tr">
                      <th>3</th>
                      <td>
                        <select name="order_name_3_sub" id="">
                          <option value="<?= $result_order['order_name_3_sub'] ?>">
                            <?= $result_order['order_name_3_sub'] ?>
                          </option>
                          <?php foreach ($result_order_name as $column_name) : ?>
                            <option value="<?= $column_name['players_name'] ?>">
                              <?= $column_name['players_name'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </td>
                      <td>
                        <select name="position_3_sub" id="">
                          <option value="<?= $result_order['position_3_sub'] ?>">
                            <?= $result_order['position_3_sub'] ?>
                          </option>
                          <option value="投">投</option>
                          <option value="捕">捕</option>
                          <option value="一">一</option>
                          <option value="二">二</option>
                          <option value="三">三</option>
                          <option value="遊">遊</option>
                          <option value="左">左</option>
                          <option value="中">中</option>
                          <option value="右">右</option>
                        </select>
                      </td>
                    </tr>
                    <tr class="order_tr">
                      <th>4</th>
                      <td>
                        <select name="order_name_4_sub" id="">
                          <option value="<?= $result_order['order_name_4_sub'] ?>">
                            <?= $result_order['order_name_4_sub'] ?>
                          </option>
                          <?php foreach ($result_order_name as $column_name) : ?>
                            <option value="<?= $column_name['players_name'] ?>">
                              <?= $column_name['players_name'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </td>
                      <td>
                        <select name="position_4_sub" id="">
                          <option value="<?= $result_order['position_4_sub'] ?>">
                            <?= $result_order['position_4_sub'] ?>
                          </option>
                          <option value="投">投</option>
                          <option value="捕">捕</option>
                          <option value="一">一</option>
                          <option value="二">二</option>
                          <option value="三">三</option>
                          <option value="遊">遊</option>
                          <option value="左">左</option>
                          <option value="中">中</option>
                          <option value="右">右</option>
                        </select>
                      </td>
                    </tr>
                    <tr class="order_tr">
                      <th>5</th>
                      <td>
                        <select name="order_name_5_sub" id="">
                          <option value="<?= $result_order['order_name_5_sub'] ?>">
                            <?= $result_order['order_name_5_sub'] ?>
                          </option>
                          <?php foreach ($result_order_name as $column_name) : ?>
                            <option value="<?= $column_name['players_name'] ?>">
                              <?= $column_name['players_name'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </td>
                      <td>
                        <select name="position_5_sub" id="">
                          <option value="<?= $result_order['position_5_sub'] ?>">
                            <?= $result_order['position_5_sub'] ?>
                          </option>
                          <option value="投">投</option>
                          <option value="捕">捕</option>
                          <option value="一">一</option>
                          <option value="二">二</option>
                          <option value="三">三</option>
                          <option value="遊">遊</option>
                          <option value="左">左</option>
                          <option value="中">中</option>
                          <option value="右">右</option>
                        </select>
                      </td>
                    </tr>
                    <tr class="order_tr">
                      <th>6</th>
                      <td>
                        <select name="order_name_6_sub" id="">
                          <option value="<?= $result_order['order_name_6_sub'] ?>">
                            <?= $result_order['order_name_6_sub'] ?>
                          </option>
                          <?php foreach ($result_order_name as $column_name) : ?>
                            <option value="<?= $column_name['players_name'] ?>">
                              <?= $column_name['players_name'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </td>
                      <td>
                        <select name="position_6_sub" id="">
                          <option value="<?= $result_order['position_6_sub'] ?>">
                            <?= $result_order['position_6_sub'] ?>
                          </option>
                          <option value="投">投</option>
                          <option value="捕">捕</option>
                          <option value="一">一</option>
                          <option value="二">二</option>
                          <option value="三">三</option>
                          <option value="遊">遊</option>
                          <option value="左">左</option>
                          <option value="中">中</option>
                          <option value="右">右</option>
                        </select>
                      </td>
                    </tr>
                    <tr class="order_tr">
                      <th>7</th>
                      <td>
                        <select name="order_name_7_sub" id="">
                          <option value="<?= $result_order['order_name_7_sub'] ?>">
                            <?= $result_order['order_name_7_sub'] ?>
                          </option>
                          <?php foreach ($result_order_name as $column_name) : ?>
                            <option value="<?= $column_name['players_name'] ?>">
                              <?= $column_name['players_name'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </td>
                      <td>
                        <select name="position_7_sub" id="">
                          <option value="<?= $result_order['position_7_sub'] ?>">
                            <?= $result_order['position_7_sub'] ?>
                          </option>
                          <option value="投">投</option>
                          <option value="捕">捕</option>
                          <option value="一">一</option>
                          <option value="二">二</option>
                          <option value="三">三</option>
                          <option value="遊">遊</option>
                          <option value="左">左</option>
                          <option value="中">中</option>
                          <option value="右">右</option>
                        </select>
                      </td>
                    </tr>
                    <tr class="order_tr">
                      <th>8</th>
                      <td>
                        <select name="order_name_8_sub" id="">
                          <option value="<?= $result_order['order_name_8_sub'] ?>">
                            <?= $result_order['order_name_8_sub'] ?>
                          </option>
                          <?php foreach ($result_order_name as $column_name) : ?>
                            <option value="<?= $column_name['players_name'] ?>">
                              <?= $column_name['players_name'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </td>
                      <td>
                        <select name="position_8_sub" id="">
                          <option value="<?= $result_order['position_8_sub'] ?>">
                            <?= $result_order['position_8_sub'] ?>
                          </option>
                          <option value="投">投</option>
                          <option value="捕">捕</option>
                          <option value="一">一</option>
                          <option value="二">二</option>
                          <option value="三">三</option>
                          <option value="遊">遊</option>
                          <option value="左">左</option>
                          <option value="中">中</option>
                          <option value="右">右</option>
                        </select>
                      </td>
                    </tr>
                    <tr class="order_tr">
                      <th>9</th>
                      <td>
                        <select name="order_name_9_sub" id="">
                          <option value="<?= $result_order['order_name_9_sub'] ?>">
                            <?= $result_order['order_name_9_sub'] ?>
                          </option>
                          <?php foreach ($result_order_name as $column_name) : ?>
                            <option value="<?= $column_name['players_name'] ?>">
                              <?= $column_name['players_name'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </td>
                      <td>
                        <select name="position_9_sub" id="">
                          <option value="<?= $result_order['position_9_sub'] ?>">
                            <?= $result_order['position_9_sub'] ?>
                          </option>
                          <option value="投">投</option>
                          <option value="捕">捕</option>
                          <option value="一">一</option>
                          <option value="二">二</option>
                          <option value="三">三</option>
                          <option value="遊">遊</option>
                          <option value="左">左</option>
                          <option value="中">中</option>
                          <option value="右">右</option>
                        </select>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <input class="orderEdit_Complete" type="submit" value="完了">
            </form>
            <div class="orderEdit_buttonWrap">
              <a href="../coach/coach.php?user_id=<?= $edit_id ?>" class="orderEdit_backLink">戻る</a>
            </div>
          </section>
        </div>
      </div>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
