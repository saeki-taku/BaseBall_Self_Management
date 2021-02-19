<aside class="sidebar footMenu">
  <ul class="sidebar_list sidebar_other_list">
    <li class="sidebar_item sidebar_other_item">
      <a class="sidebar_link sidebar_other_link" href="../main/main.php">メニュー</a>
    </li>
    <li class="sidebar_item sidebar_other_item">
      <a class="sidebar_link sidebar_other_link" href="../player/player_all.php?user_id=<?php echo $login_user['id'] ?>">選手一覧</a>
    </li>
    <li class="sidebar_item sidebar_other_item">
      <a class="sidebar_link sidebar_other_link sp-sidebar_link" href="../condition/condition.php?user_id=<?php echo $login_user['id'] ?>">コンディション<span>リスト</span></a>
    </li>
    <li class="sidebar_item sidebar_other_item">
      <a class="sidebar_link sidebar_other_link" href="../schedule/calendar.php?user_id=<?php echo $login_user['id'] ?>">日程表</a>
    </li>
    <li class="sidebar_item sidebar_other_item sp-sidebar_item">
      <a class="sidebar_link sidebar_other_link" href="../player_add/player_add.php?user_id=<?php echo $login_user['id'] ?>">選手登録</a>
    </li>
    <li class="sidebar_item sidebar_other_item sp-sidebar_item">
      <a class="sidebar_link sidebar_other_link" href="../coach/coach.php?user_id=<?php echo $login_user['id'] ?>">監督室</a>
    </li>
  </ul>
</aside>
