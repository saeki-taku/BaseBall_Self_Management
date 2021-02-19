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
    <link rel="stylesheet" href="../../assets/css/player/player_diary_edit.css" />
    <title>BBSM|日記編集</title>
  </head>
  <body>
    <div class="wrapper wrapper_other">
      <?php $Path = "../../"; require("../common/header.php"); ?>
      <div class="diaryEdit">
        <?php $title = "日記編集"; require("../common/title.php");?>
        <div class="diaryEdit_wrapper">
          <div class="diaryEdit_container">
            <a href="" class="diaryEdit_post">更新する</a>
            <h3 class="diaryEdit_title">タイトル</h3>
            <p class="diaryEdit_text">テキスト</p>
            <div class="diaryEdit_action">
              <a href="../player/player_diary.php" class="diaryEdit_back">戻る</a>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer_menu">
        <p class="footer_word">Copyright&copy;2021 BaseBallSelfManagement</p>
      </footer>
    </div>
  </body>
</html>
