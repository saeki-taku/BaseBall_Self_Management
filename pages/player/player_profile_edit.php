<?php
session_start();

require_once('../../model/Player.php');
require_once('../../model/function.php');
referer();

$result_profile = Player::getPlayerProfile($_GET['profile_edit']);
$edit_id = $_GET['profile_edit'];
$path =  "../player/player.php?id=";

if (!empty($_SESSION['profile_err'])) {
  $err_message = $_SESSION['profile_err'];
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="../../assets/css/common/header.css" />
  <link rel="stylesheet" href="../../assets/css/common/footer.css" />
  <link rel="stylesheet" href="../../assets/css/common/title.css" />
  <link rel="stylesheet" href="../../assets/css/reset.css" />
  <link rel="stylesheet" href="../../assets/css/player/player_profile_edit.css" />
  <title>BBSM|選手情報編集</title>
</head>

<body>
  <div class="wrapper">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="profileEdit">
      <?php $title = "選手情報編集";
      require("../common/title.php"); ?>
      <article class="profileEdit_container">
        <p class="profileEdit_carefull">
          下記に必要な情報の入力をしてください。<br />
          <span>※</span>は必須項目になります。
        </p>
        <form class="profileEdit_form" action="../player/player_profile_edit_complete.php" enctype="multipart/form-data" method="post">
          <table class="profileEdit_table">
            <!-- <tr class="profileEdit_tr">
              <th>顔写真</th>
              <td>
                <input class="" type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                <input class="profileEdit_face" type="file" accept="image/*" />
              </td>
            </tr> -->
            <input type="hidden" name="edit_id" value="<?= $edit_id ?>">
            <tr class="profileEdit_tr">
              <th><span>※</span>名前</th>
              <td><input class="profileEdit_name profileEdit_input" type="text" name="players_name" placeholder="山田　太郎" value="<?php if (isset($result_profile['players_name'])) echo h($result_profile['players_name']); ?>" />
                <?php if (isset($err_message['players_name'])) : ?>
                  <p class="err_message"><?php echo $err_message['players_name'] ?></p>
                <?php endif; ?>
              </td>
            </tr>
            <tr class="profileEdit_tr">
              <th><span>※</span>フリガナ</th>
              <td><input class="profileEdit_furigana profileEdit_input" type="text" name="players_furigana" placeholder="ヤマダ　タロウ" value="<?php if (isset($result_profile['players_furigana'])) echo h($result_profile['players_furigana']); ?>" pattern="(?=.*?[\u30A1-\u30FC])[\u30A1-\u30FC\s]*" /></td>
            </tr>
            <tr class="profileEdit_tr">
              <th>学年</th>
              <td>
                <select class="profileEdit_schoolyear-select" name="school_year" id="">
                  <option value="<?php if (isset($result_profile['school_year'])) echo h($result_profile['school_year']); ?>">
                    <?php if (isset($result_profile['school_year'])) echo h($result_profile['school_year'] . "学年"); ?>
                  </option>
                  <option value="1学年">1学年</option>
                  <option value="2学年">2学年</option>
                  <option value="3学年">3学年</option>
                </select>
              </td>
            </tr>
            <tr class="profileEdit_tr">
              <th>背番号</th>
              <td><input class="profileEdit_num profileEdit_input" type="text" name="players_number" placeholder="18 *半角数字のみ" value="<?php if (isset($result_profile['players_number'])) echo h($result_profile['players_number']); ?>" /></td>
            </tr>
            <tr class="profileEdit_tr">
              <th>ポジション</th>
              <td>
                <select class="profileEdit_position-select" name="position" id="">
                  <option value="<?php if (isset($result_profile['position'])) echo h($result_profile['position']); ?>">
                    <?php if (isset($result_profile['position'])) echo h($result_profile['position']); ?>
                  </option>
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
            <tr class="profileEdit_tr">
              <th>サブポジション</th>
              <td>
                <select class="profileEdit_position-select" name="position_sub" id="">
                  <option value="<?php if (isset($result_profile['position_sub'])) echo h($result_profile['position_sub']); ?>">
                    <?php if (isset($result_profile['position_sub'])) echo h($result_profile['position_sub']); ?>
                  </option>
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
            <tr class="profileEdit_tr">
              <th class="profileEdit_th_introduce">紹介文</th>
              <td>
                <textarea class="profileEdit_introduce" name="introduce" id="" cols="" rows=""><?php if (isset($result_profile['introduce'])) echo h($result_profile['introduce']); ?></textarea>
              </td>
            </tr>
          </table>
          <input class="profileEdit_submit" type="submit" value="更新" />
        </form>
        <div class="profileEdit_action">
          <a href="../player/player.php?id=<?= $edit_id; ?>" class="profileEdit_back">戻る</a>
          <a href="../player/player_delete.php?player_delete=<?= $edit_id ;?>" class="profileEdit_delete">削除</a>
        </div>
      </article>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
