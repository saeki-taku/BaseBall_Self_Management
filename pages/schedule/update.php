<?php
require_once('../../model/DB.php');

if (isset($_POST['id'])) {

  $sql = "UPDATE calendar
          SET title = :title, start_event = :start_event, end_event = :end_event
          WHERE id = :id";

  try {
    $stmt = connect()->prepare($sql);
    $stmt->execute(

      array(
        ':title'       => $_POST["title"],
        ':start_event' => $_POST["start"],
        ':end_event'   => $_POST["end"],
        ':id'   => $_POST["id"]
      )
    );
  } catch (\Exeception $e) {
    return false;
  }
}
