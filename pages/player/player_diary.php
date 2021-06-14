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
  <link rel="stylesheet" href="../../assets/css/player/player_diary.css" />
  <title>BBSM|日記</title>
</head>

<body>
  <div class="wrapper wrapper_other">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="diary">
      <?php $title = "日記";
      require("../common/title.php"); ?>
      <div class="diary_wrapper">
        <div class="diary_container">
          <a href="../player/player_diary_new.php" class="diary_new">新規投稿</a>
          <ul class="diary_list">
            <li class="diary_item">
              <h3 class="diary_title">タイトル</h3>
              <p class="diary_text">
                ここに日記のテキストが入る<br />
                ここに日記のテキストが入る<br />
                ここに日記のテキストが入る<br />
                ここに日記のテキストが入る
              </p>
              <div class="diary_action">
                <a href="../player/player_diary_edit.php" class="diary_edit">編集</a>
                <a href="" class="diary_delete">削除</a>
              </div>
            </li>
            <li class="diary_item">
              <h3 class="diary_title">タイトル</h3>
              <p class="diary_text">
                ここに日記のテキストが入る<br />
                ここに日記のテキストが入る<br />
                ここに日記のテキストが入る<br />
                ここに日記のテキストが入る
              </p>
              <div class="diary_action">
                <a href="" class="diary_edit">編集</a>
                <a href="" class="diary_delete">削除</a>
              </div>
            </li>
          </ul>
        </div>
        <?php require("../common/sidebar.php"); ?>
      </div>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
