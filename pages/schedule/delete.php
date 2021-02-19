<?php
require_once('../../model/DB.php');

if (isset($_POST['id'])) {

  $sql = "DELETE FROM calendar
          WHERE id = :id";

  try {
    $stmt = connect()->prepare($sql);
    $stmt->execute(

      array(
        ':id'   => $_POST["id"]
      )
    );
  } catch (\Exeception $e) {
    return false;
  }
}
