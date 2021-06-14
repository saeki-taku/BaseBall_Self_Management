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
  <link rel="stylesheet" href="../../assets/css/schedule/schedule.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js'></script>
  <script>
    $(document).ready(function() {
      var calendar = $('#calendar').fullCalendar({
        editable: true,
        header: {
          left: 'prev, next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        events: 'load.php',
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {

          var title = prompt("内容を入力してください");
          if (title) {
            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

            $.ajax({
              url: "insert.php",
              type: "POST",
              data: {
                title: title,
                start: start,
                end: end
              },
              success: function() {
                calendar.fullCalendar('refetchEvents');
                alert("追加完了しました");
              }
            });
          }
        },
        editable: true,
        eventResize: function(event) {

          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
          var title = event.title;
          var id = event.id;
          $.ajax({
            url: "update.php",
            type: "POST",
            data: {
              title: title,
              start: start,
              end: end,
              id: id
            },
            success: function() {
              calendar.fullCalendar('refetchEvents');
              alert("日程の変更をします");
            }
          })
        },
        eventDrop: function(event) {

          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
          var title = event.title;
          var id = event.id;
          $.ajax({
            url: "update.php",
            type: "POST",
            data: {
              title: title,
              start: start,
              end: end,
              id: id
            },
            success: function() {
              calendar.fullCalendar('refetchEvents');
              alert("日時を変更しました");
            }
          })
        },
        eventClick: function(event) {

          if (confirm("この日程を削除します、宜しいでしょうか？")) {

            var id = event.id;
            $.ajax({
              url: "delete.php",
              type: "POST",
              data: {
                id: id
              },
              success: function() {
                calendar.fullCalendar('refetchEvents');
                alert("削除完了しました");
              }
            })
          }
        }
      });
    });
  </script>
  <title>BBSM|日程表</title>
</head>

<body>
  <div class="wrapper">
    <?php $linkPath = "../main/main.php";
    $imgPath = "../../";
    require("../common/header.php"); ?>
    <div class="schedule">
      <?php $title = "日程表";
      require("../common/title.php"); ?>
      <div class="container">
        <div id="calendar"></div>
      </div>
    </div>
    <?php require("../common/footer.php"); ?>
  </div>
</body>

</html>
