<?php
require_once('../../model/DB.php');

if (isset($_POST['title'])) {

  $sql = "INSERT INTO calendar(title, start_event, end_event)
          VALUES(:title, :start_event, :end_event)";

  try {
    $stmt = connect()->prepare($sql);
    $stmt->execute(

      array(
        ':title'       => $_POST["title"],
        ':start_event' => $_POST["start"],
        ':end_event'   => $_POST["end"]
      )
    );
  } catch (\Exeception $e) {
    return false;
  }
}
