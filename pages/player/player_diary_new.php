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
  <link rel="stylesheet" href="../../assets/css/player/player_diary_new.css" />
  <title>BBSM|日記新規投稿</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="diaryNew">
      <?php $title = "日記新規投稿";
      require("../common/title.php"); ?>
      <div class="diaryNew_wrapper">
        <div class="diaryNew_container">
          <a href="" class="diaryNew_post">投稿する</a>
          <h3 class="diaryNew_title">タイトル</h3>
          <p class="diaryNew_text">テキスト</p>
          <div class="diaryNew_action">
            <a href="../player/player_diary.php" class="diaryNew_back">戻る</a>
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
