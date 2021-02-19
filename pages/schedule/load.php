<?php
require_once('../../model/DB.php');


    $data= array();

    $sql = "SELECT * FROM calendar ORDER BY id";


    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();

      foreach($result as $row)
      {
        $data[] = array(
          'id'    => $row["id"],
          'title' => $row["title"],
          'start' => $row["start_event"],
          'end'   => $row["end_event"]
        );
      }
      echo json_encode($data);

    } catch (\Exeception $e) {
      return false;
    }

