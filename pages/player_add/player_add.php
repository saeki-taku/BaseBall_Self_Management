<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/function.php');

$user_id = $_SESSION['login_user']['id']; //user_id毎の登録

if (!empty($_SESSION['playerAdd_err'])) {
  $err_message = $_SESSION['playerAdd_err'];
}
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
  <link rel="stylesheet" href="../../assets/css/common/title.css" />
  <link rel="stylesheet" href="../../assets/css/reset.css" />
  <link rel="stylesheet" href="../../assets/css/player_add/player_add.css" />
  <title>BBSM|選手登録</title>
</head>

<body>
  <div class="wrapper">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="playerAdd">
      <?php $title = "選手登録";
      require("../common/title.php"); ?>
      <article class="playerAdd_container">
        <p class="playerAdd_carefull">
          下記に必要な情報の入力をしてください。<br />
          <span>※</span>は必須項目になります。
        </p>
        <form class="playerAdd_form" action="../player_add/player_add_result.php" enctype="multipart/form-data" method="POST">
          <table class="playerAdd_table">
            <tr class="playerAdd_tr">
              <input type="hidden" name="user_id" value="<?= $user_id ?>">
              <th>顔写真</th>
              <td>
                <input class="err_message" type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                <input class="playerAdd_face" name="img" type="file" accept="image/*" />
                <?php if (isset($err_message['fileselect_err'])) : ?>
                  <p class="err_message"><?php echo $err_message['fileselect_err'] ?></p>
                <?php elseif (isset($err_message['filesize_err'])) : ?>
                  <p class="err_message"><?php echo $err_message['filesize_err'] ?></p>
                <?php endif; ?>
              </td>
            </tr>
            <tr class="playerAdd_tr">
              <th><span>※</span>名前</th>
              <td><input class="playerAdd_name playerAdd_input" type="text" name="player_name" placeholder="山田　太郎" />
                <?php if (isset($err_message['player_name'])) : ?>
                  <p class="err_message"><?php echo $err_message['player_name'] ?></p>
                <?php endif; ?>
              </td>
            </tr>
            <tr class="playerAdd_tr">
              <th><span>※</span>フリガナ</th>
              <td><input class="playerAdd_furigana playerAdd_input" type="text" name="player_furigana" placeholder="ヤマダ　タロウ" />
                <?php if (isset($err_message['player_furigana'])) : ?>
                  <p class="err_message"><?php echo $err_message['player_furigana'] ?></p>
                  <p class="err_message"><?php echo $err_message['player_kana'] ?></p>
                <?php endif; ?>
              </td>
            </tr>
            <tr class="playerAdd_tr">
              <th>学年</th>
              <td>
                <select class="playerAdd_schoolyear-select" name="school_year" id="">
                  <option value="3">3学年</option>
                  <option value="2">2学年</option>
                  <option value="1">1学年</option>
                </select>
              </td>
            </tr>
            <tr class="playerAdd_tr">
              <th>背番号</th>
              <td><input class="playerAdd_num playerAdd_input" type="text" name="player_num" placeholder="18 *半角数字のみ" />
                <?php if (isset($err_message['player_num'])) : ?>
                  <p class="err_message"><?php echo $err_message['player_num'] ?></p>
                <?php endif; ?>
              </td>
            </tr>
            <tr class="playerAdd_tr">
              <th>ポジション</th>
              <td>
                <select class="playerAdd_position-select" name="position" id="">
                  <option value="投手">投手</option>
                  <option value="捕手">捕手</option>
                  <option value="一塁手">一塁手</option>
                  <option value="二塁手">二塁手</option>
                  <option value="三塁手">三塁手</option>
                  <option value="遊撃手">遊撃手</option>
                  <option value="外野手">外野手</option>
                </select>
              </td>
            </tr>
            <tr class="playerAdd_tr">
              <th>サブポジション</th>
              <td>
                <select class="playerAdd_position-select" name="position_sub" id="">
                  <option value="-">-</option>
                  <option value="投手">投手</option>
                  <option value="捕手">捕手</option>
                  <option value="一塁手">一塁手</option>
                  <option value="二塁手">二塁手</option>
                  <option value="三塁手">三塁手</option>
                  <option value="遊撃手">遊撃手</option>
                  <option value="外野手">外野手</option>
                </select>
              </td>
            </tr>
            <tr class="playerAdd_tr">
              <th class="playerAdd_th_introduce">紹介文</th>
              <td>
                <textarea class="playerAdd_introduce" name="introduce" id="" cols="" rows="" placeholder="140文字以内"></textarea>
                <?php if (isset($err_message['introduce'])) : ?>
                  <p class="err_message"><?php echo $err_message['introduce'] ?></p>
                <?php endif; ?>
              </td>
            </tr>
          </table>
          <input class="playerAdd_submit" type="submit" value="登録" />
        </form>
      </article>
    </div>
    <div>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
