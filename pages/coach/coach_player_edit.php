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
  <link rel="stylesheet" href="../../assets/css/player/player.css" />
  <link rel="stylesheet" href="../../assets/css/coach/coach_player.css" />
  <link rel="stylesheet" href="../../assets/css/coach/coach_player_edit.css" />
  <title>BBSM|選手情報編集(監督室)</title>
</head>

<body>
  <div class="wrapper">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="player">
      <?php $title = "選手情報編集(監督室)";
      require("../common/title.php"); ?>
      <article class="player_container">
        <section class="playerProfile">
          <div class="playerProfile_head">
            <img class="playerProfile_face" src="../../assets/img/player_face.jpg" alt="" width="90px" height="90px" />
            <div class="playerProfile_headWrap">
              <p class="playerProfile_schoolyear">3年生</p>
              <p class="playerProfile_name">山田　太郎</p>
              <p class="playerProfile_furigana">ヤマダ　タロウ</p>
              <p class="playerProfile_position">捕手/遊撃手</p>
            </div>
            <span class="playerProfile_num">31</span>
            <a class="playerProfile_link" href="../../pages/player_/player.php">日記</a>
          </div>
          <div class="playerProfile_foot">
            <p class="playerProfile_introduce">ここに紹介文が入る</p>
          </div>
        </section>
        <section class="playerManagement">
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
                <td>160cm</td>
                <td>170cm</td>
                <td>180cm</td>
              </tr>
              <tr class="playerRecord_tr">
                <td>体重</td>
                <td>60kg</td>
                <td>70kg</td>
                <td>80kg</td>
              </tr>
              <tr class="playerRecord_tr">
                <td>50m走</td>
                <td>160cm</td>
                <td>170cm</td>
                <td>180cm</td>
              </tr>
              <tr class="playerRecord_tr">
                <td>遠投</td>
                <td>160cm</td>
                <td>170cm</td>
                <td>180cm</td>
              </tr>
              <tr class="playerRecord_tr">
                <td>球速</td>
                <td>120km</td>
                <td>130cm</td>
                <td>140km</td>
              </tr>
              <tr class="playerRecord_tr">
                <td>打率</td>
                <td>0.220</td>
                <td>0.240</td>
                <td>0.350</td>
              </tr>
            </table>
          </div>
          <div class="playerCondition">
            <ul class="playerCondition_list">
              <li class="playerCondition_item">
                <div class="playerCondition_head">
                  <p class="playerCondtion_parts"><span>部位:</span>肘</p>
                  <p class="playerCondtion_parts"><span>症状:</span>内側側副靭帯損傷</p>
                  <p class="playerCondtion_parts"><span>発症時期:</span>2021/1/1</p>
                  <p class="playerCondtion_parts"><span>回復見込み(専門家の見立て):</span>2021/4/1</p>
                  <p class="playerCondtion_parts"><span>経過:</span>良好</p>
                </div>
                <div class="playerCondition_foot">
                  <p class="playerCondition_memo"><span>メモ(その他報告)：</span><br />投球の禁止、その他練習の参加可。</p>
                </div>
              </li>
            </ul>
          </div>
        </section>
        <section class="coachMemoEdit">
          <p class="coachMemoEdit_text">ここにメモが入る</p>
          <div class="coachMemoEdit_Action">
            <a href="../coach/coach.php" class="coachMemoEdit_complete">完了</a>
            <a href="../coach/coach.php" class="coachMemoEdit_back">戻る</a>
          </div>
        </section>
      </article>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
