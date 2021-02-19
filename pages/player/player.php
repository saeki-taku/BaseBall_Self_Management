<?php
session_start();
require_once('../../model/Player.php');
require_once('../../model/function.php');
referer();

if (isset($_SESSION['record_err'])) { //編集に遷移する前にSESSION['record_err']を空にする
  $_SESSION['record_err'] = [];
}
if (isset($_SESSION['profile_err'])) { //編集に遷移する前にSESSION['profile_err']を空にする
  $_SESSION['profile_err'] = [];
}
$login_user = $_SESSION['login_user'];


$result_player = Player::getPlayer($_GET['id']);

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
  <link rel="stylesheet" href="../../assets/css/player/player.css" />
  <title>BBSM|選手情報</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php require("../common/header_dark.php") ?>
    <div class="player">
      <?php $title = "選手情報";
      require("../common/title_dark.php"); ?>
      <div class="player_wrapper">
        <article class="player_container">
          <section class="playerProfile">
            <div class="playerProfile_head">
              <img class="playerProfile_face" src="<?= ($result_player['file_name']) ? $result_player['file_path'] : "../../assets/img/player_face.jpg"; ?>" alt="" width="90" height="90" />
              <div class="playerProfile_headWrap">
                <p class="playerProfile_schoolyear"><?= h($result_player['school_year']); ?>年生</p>
                <p class="playerProfile_name"><?= h($result_player['players_name']); ?></p>
                <p class="playerProfile_furigana"><?= h($result_player['players_furigana']); ?></p>
                <p class="playerProfile_position"><?= h($result_player['position']); ?>/<?= h($result_player['position_sub']); ?></p>
              </div>
              <span class="playerProfile_num"><?= h($result_player['players_number']); ?></span>
              <a class="playerProfile_link" href="#">日記</a>
              <!-- <a class="playerProfile_link" href="../player/player_diary.php">日記</a> -->
            </div>
            <div class="playerProfile_foot">
              <p class="playerProfile_introduce"><?= h($result_player['introduce']) ?></p>
            </div>
          </section>
          <section class="playerManagement">
            <?php if ($result_player['r_player_id'] > 0) : ?>
              <div class="playerRecord">
                <table class="playerRecord_table">
                  <tr class="playerRecord_tr">
                    <th></th>
                    <th>1年生</th>
                    <th>2年生</th>
                    <th>3年生</th>
                  </tr>
                  <tr class="playerRecord_tr">
                    <td>身長</td>
                    <td><?= h($result_player['height']); ?>cm</td>
                    <td><?= h($result_player['height_2']); ?>cm</td>
                    <td><?= h($result_player['height_3']); ?>cm</td>
                  </tr>
                  <tr class="playerRecord_tr">
                    <td>体重</td>
                    <td><?= h($result_player['weight']); ?>kg</td>
                    <td><?= h($result_player['weight_2']); ?>kg</td>
                    <td><?= h($result_player['weight_3']); ?>kg</td>
                  </tr>
                  <tr class="playerRecord_tr">
                    <td>50m走</td>
                    <td><?= h($result_player['run_time']); ?></td>
                    <td><?= h($result_player['run_time_2']); ?></td>
                    <td><?= h($result_player['run_time_3']); ?></td>
                  </tr>
                  <tr class="playerRecord_tr">
                    <td>遠投</td>
                    <td><?= h($result_player['long_cast']); ?>m</td>
                    <td><?= h($result_player['long_cast_2']); ?>m</td>
                    <td><?= h($result_player['long_cast_3']); ?>m</td>
                  </tr>
                  <tr class="playerRecord_tr">
                    <td>球速</td>
                    <td><?= h($result_player['ballspeed']); ?>km/h</td>
                    <td><?= h($result_player['ballspeed_2']); ?>km/h</td>
                    <td><?= h($result_player['ballspeed_3']); ?>km/h</td>
                  </tr>
                  <tr class="playerRecord_tr">
                    <td>打率</td>
                    <td><?= h($result_player['hit_average']); ?></td>
                    <td><?= h($result_player['hit_average_2']); ?></td>
                    <td><?= h($result_player['hit_average_3']); ?></td>
                  </tr>
                </table>

                <a href="../player/player_record_edit.php?record_edit=<?php echo $result_player['id'] ?>" class="player_edit">編集(記録)</a>
              </div>
            <?php else : ?>
              <div class="add_button add_record">
                <a class="add_buttonLink" href="../player/player_record_add.php?record_add=<?php echo $result_player['id']; ?>">記録の追加</a>
              </div>
            <?php endif; ?>
            <?php if ($result_player['c_player_id'] > 0) : ?>
              <div class="playerCondition">
                <ul class="playerCondition_list">
                  <li class="playerCondition_item">
                    <div class="playerCondition_head">
                      <p class="playerCondtion_word condition_parts"><span>部位:</span><?= h($result_player['pain_parts']); ?></p>
                      <p class="playerCondtion_word condition_symptoms"><span>症状:</span><?= h($result_player['pain_contents']); ?></p>
                      <p class="playerCondtion_word condition_date"><span>発症時期:</span><?= h($result_player['pain_date']); ?></p>
                      <p class="playerCondtion_word condition_recovery"><span>回復見込み:</span><?= h($result_player['recovery_date']); ?></p>
                      <p class="playerCondtion_word condition_progress"><span>経過:</span><?= h($result_player['pain_progress']); ?></p>
                    </div>
                    <div class="playerCondition_foot">
                      <p class="playerCondition_memo"><span>メモ(その他報告)：</span><br /><?= h($result_player['pain_memo']); ?></p>
                    </div>
                  </li>
                </ul>
                <a href="../player/player_condition_edit.php?condition_edit=<?php echo $result_player['id']; ?>" class="player_edit condition_edit">編集(コンディション)</a>
              </div>
            <?php else : ?>
              <div class="add_button add_condition">
                <a class="add_buttonLink" href="../player/player_condition_add.php?condition_add=<?php echo $result_player['id']; ?>">コンディションの追加</a>
              </div>
            <?php endif; ?>
          </section>
          <a href="../player/player_profile_edit.php?profile_edit=<?php echo $result_player['id']; ?>" class="player_edit">編集(プロフィール)</a>
        </article>
        <?php require("../common/sidebar_dark.php"); ?>
      </div>
    </div>
    <footer class="footer footer_other">
      <p class="footer_word footer_other_word">Copyright&copy;2021 BaseBSelfManagement</p>
    </footer>
  </div>
</body>

</html>
