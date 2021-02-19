<?php
require_once('DB.php');

class Player
{
  /**
   * 選手一覧の取得
   * @param
   * @return array
   */
  public static function getPlayerAll($user_id)
  {
    // $sql = "SELECT id, user_id,  file_name, file_path, players_name, players_furigana, players_number, school_year FROM player";

    $sql = "SELECT
    p.id,
    p.file_name,
    p.file_path,
    p.players_name,
    p.players_furigana,
    p.players_number,
    p.school_year
    FROM  player AS p
    INNER JOIN  users AS u
    ON p.user_id = u.id
    WHERE p.user_id = ?";

    $arr = [];
    $arr[] = $user_id;

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      $result_player_all = $stmt->fetchAll();
      return $result_player_all;
    } catch (\Exeception $e) {
      return $result_player_all;
    }
  }

  /**
   * 選手個人の情報取得(全て)
   * @param $id
   * @return array
   */
  public static function getPlayer($id)
  {
    $sql = "SELECT p.id, p.user_id, p.file_name, p.file_path, p.players_name, p.players_furigana, p.players_number, p.school_year, p.position, p.position_sub, p.introduce,
    r.r_player_id,
    r.height, r.height_2, r.height_3, r.weight, r.weight_2, r.weight_3, r.run_time, r.run_time_2, r.run_time_3, r.long_cast, r.long_cast_2, r.long_cast_3, r.ballspeed, r.ballspeed_2, r.ballspeed_3, r.hit_average, r.hit_average_2, r.hit_average_3,
    c.c_player_id,
    c.pain_parts, c.pain_contents, c.pain_date, c.recovery_date, c.pain_progress, c.pain_memo
    FROM player AS p
    LEFT OUTER JOIN record AS r
    ON p.id = r.r_player_id
    LEFT OUTER JOIN conditions AS c
    ON r.r_player_id = c.c_player_id
    WHERE p.id = ?";

    $arr = [];
    $arr[] = $id;

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      $result_player = $stmt->fetch();
      return $result_player;
    } catch (\Exeception $e) {
      return false;
    }
  }

  /**
   * 選手情報(記録)のDBの追加
   * @param string $add_id
   * @return array $result
   */

  public static function addPlayerRecord($add_id)
  {
    $result = false;

    $sql = "INSERT INTO record (r_player_id)
    VALUE (?)";

    try {
      $stmt = connect()->prepare($sql);
      $stmt->bindValue(1, $add_id);
      $result = $stmt->execute();
      return $result;
    } catch (\Exeception $e) {
      echo $e->getMessage();
      return $result;
    }
  }
  /**
   * 選手情報(コンディション)のDBの追加
   * @param string $add_id
   * @return array $result
   */

  public static function addPlayerCondition($add_id)
  {
    $result = false;

    $sql = "INSERT INTO conditions (c_player_id)
    VALUE (?)";

    try {
      $stmt = connect()->prepare($sql);
      $stmt->bindValue(1, $add_id);
      $result = $stmt->execute();
      return $result;
    } catch (\Exeception $e) {
      echo $e->getMessage();
      return $result;
    }
  }
  /**
   * 選手個人の情報取得(プロフィール)
   * @param $id
   * @return array
   */

  public static function getPlayerProfile($id)
  {
    $sql = "SELECT * FROM player
    WHERE id = ?";

    $arr = [];
    $arr[] = $id;

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      $result_profile = $stmt->fetch();
      return $result_profile;
    } catch (\Exeception $e) {
      return false;
    }
  }

  /**
   * 選手個人の情報取得(記録)
   * @param $id
   * @return array
   */

  public static function getPlayerRecord($id)
  {
    $sql = "SELECT p.id, p.user_id, p.players_name,
    r.height, r.height_2, r.height_3, r.weight, r.weight_2, r.weight_3, r.run_time, r.run_time_2, r.run_time_3, r.long_cast, r.long_cast_2, r.long_cast_3, r.ballspeed, r.ballspeed_2, r.ballspeed_3, r.hit_average, r.hit_average_2, r.hit_average_3
    FROM player AS p
    LEFT OUTER JOIN record AS r
    ON p.id = r.r_player_id
    WHERE p.id = ?";

    $arr = [];
    $arr[] = $id;

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      $result_record = $stmt->fetch();
      return $result_record;
    } catch (\Exeception $e) {
      return false;
    }
  }

  /**
   * 全ての選手の情報取得(コンディション)
   * @param $id
   * @return array
   */

  public static function getPlayerConditionAll($id)
  {
    $sql = "SELECT p.id, p.user_id, p.players_name, p.file_name, p.file_path, c.pain_parts, c.pain_contents, c.pain_date, c.recovery_date, c.pain_progress, c.pain_memo
    FROM player AS p
    INNER JOIN conditions AS c
    ON p.id = c.c_player_id
    WHERE p.user_id = ?";

    $arr = [];
    $arr[] = $id;

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      $result_condition_all = $stmt->fetchAll();
      return $result_condition_all;
    } catch (\Exeception $e) {
      return false;
    }
  }
  /**
   * 選手個人の情報取得(コンディション)
   * @param $id
   * @return array
   */

  public static function getPlayerCondition($id)
  {
    $sql = "SELECT p.id, p.user_id, p.players_name, c.pain_parts, c.pain_contents, c.pain_date, c.recovery_date, c.pain_progress, c.pain_memo
    FROM player AS p
    LEFT OUTER JOIN conditions AS c
    ON p.id = c.c_player_id
    WHERE p.id = ?";

    $arr = [];
    $arr[] = $id;

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      $result_condition = $stmt->fetch();
      return $result_condition;
    } catch (\Exeception $e) {
      return false;
    }
  }


  /**
   * ファイル(選手)データの保存
   * @param string $filename ファイルデータ
   * @return array $result
   */

  public static function fileSave($file_data) //user_idを参照の元登録処理を後ほど行う。
  {
    $result = false;

    $sql = "INSERT INTO player (user_id, file_name, file_path, players_name, players_furigana, players_number, school_year, position, position_sub, introduce)
    VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
      // connect()->beginTransaction();

      $stmt = connect()->prepare($sql);
      $stmt->bindValue(1, ($file_data[0]));
      $stmt->bindValue(2, ($file_data[1]));
      $stmt->bindValue(3, ($file_data[2]));
      $stmt->bindValue(4, ($file_data[3]));
      $stmt->bindValue(5, ($file_data[4]));
      $stmt->bindValue(6, ($file_data[5]));
      $stmt->bindValue(7, ($file_data[6]));
      $stmt->bindValue(8, ($file_data[7]));
      $stmt->bindValue(9, ($file_data[8]));
      $stmt->bindValue(10, ($file_data[9]));
      $result = $stmt->execute();

      return $result;
    } catch (\Exeception $e) {
      echo $e->getMessage();
      return $result;
    }
  }

  /**
   * 選手個人の情報編集(記録)
   * @param $id
   * @param $record_editData
   * @return array
   */
  public static function editPlayerProfile($profile_editData)
  {
    $result_profile_edit = false;

    $sql = "UPDATE player
    SET players_name = ?,
    players_furigana = ?,
    players_number = ?,
    school_year = ?,
    position = ?,
    position_sub = ?,
    introduce = ?
    WHERE id = ?";

    try {
      $stmt = connect()->prepare($sql);
      for($i = 0; $i <= 7; $i++) {
        $stmt->bindValue($i+1, ($profile_editData[$i]));
      }
      $stmt->execute();
      return $result_profile_edit;
    } catch (\Exeception $e) {
      return false;
    }
  }
  /**
   * 選手個人の情報編集(記録)
   * @param $id
   * @param $record_editData
   * @return array
   */

  public static function editPlayerRecord($record_editData)
  {
    $result_record_edit = false;

    $sql = "UPDATE record
    SET height = ?, height_2 = ?, height_3 = ?,
    weight = ?, weight_2 = ?, weight_3 = ?,
    run_time = ?, run_time_2 = ?, run_time_3 = ?,
    long_cast = ?, long_cast_2 = ?, long_cast_3 = ?,
    ballspeed = ?, ballspeed_2 = ?, ballspeed_3 = ?,
    hit_average = ?, hit_average_2 = ?, hit_average_3 = ?
    WHERE r_player_id = ?";

    try {
      $stmt = connect()->prepare($sql);
      for($i = 0; $i <= 18; $i++) {
        $stmt->bindValue($i+1, ($record_editData[$i]));
      }
      $result_record_edit = $stmt->execute();
      return $result_record_edit;
    } catch (\Exeception $e) {
      return false;
    }
  }

  /**
   * 選手個人の情報編集(コンディション)
   * @param $id
   * @param $record_editData
   * @return array
   */

  public static function editPlayerCondition($condition_editData)
  {
    $result_condition_edit = false;

    $sql = "UPDATE conditions
    SET pain_parts = ?,
    pain_contents = ?,
    pain_date = ?,
    recovery_date = ?,
    pain_progress = ?,
    pain_memo = ?
    WHERE c_player_id = ?";

    try {
      $stmt = connect()->prepare($sql);
      // for($i = 0; $i <= 6; $i++) {
      //   $stmt->bindValue($i+1, ($condition_editData[$i]));
      // }
      $stmt->bindValue(1, ($condition_editData[0]));
      $stmt->bindValue(2, ($condition_editData[1]));
      $stmt->bindValue(3, ($condition_editData[2]));
      $stmt->bindValue(4, ($condition_editData[3]));
      $stmt->bindValue(5, ($condition_editData[4]));
      $stmt->bindValue(6, ($condition_editData[5]));
      $stmt->bindValue(7, ($condition_editData[6]));
      $result_condition_edit = $stmt->execute();
      return $result_condition_edit;
    } catch (\Exeception $e) {
      return false;
    }
  }

  /**
   * 選手情報の削除
   * @param string $add_id
   * @return array $result
   */

  public static function deletePlayer($delete_id)
  {
    $result = false;

    $sql = "DELETE  p, r, c
    FROM player AS p
    RIGHT OUTER JOIN record AS r
    ON p.id = r.r_player_id
    RIGHT OUTER JOIN conditions AS c
    ON p.id = c.c_player_id
    WHERE p.id = ?";

    try {
      $stmt = connect()->prepare($sql);
      $stmt->bindValue(1, $delete_id);
      $result = $stmt->execute();
      return $result;
    } catch (\Exeception $e) {
      echo $e->getMessage();
      return $result;
    }
  }
  /**
   * コンディションの削除
   * @param string $delete_id
   * @return array $result
   */

  public static function deleteCondition($delete_id)
  {
    $result = false;

    $sql = "DELETE FROM conditions WHERE c_player_id = ?";

    try {
      $stmt = connect()->prepare($sql);
      $stmt->bindValue(1, $delete_id);
      $result = $stmt->execute();
      return $result;
    } catch (\Exeception $e) {
      echo $e->getMessage();
      return $result;
    }
  }

}
