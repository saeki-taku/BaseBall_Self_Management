<?php
require_once('DB.php');

class Order
{

  /**
   * オーダーのDBの追加
   * @param string $add_id
   * @return array $result
   */

  public static function addOrder_main($add_id)
  {
    $result = false;

    $sql = "INSERT INTO orders (user_id)
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
  public static function addOrder_sub($add_id)
  {
    $result = false;

    $sql = "INSERT INTO orders_sub (user_id)
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
   * オーダーの取得
   * @param
   * @return array
   */
  public static function getOrder_main($user_id)
  {
    $sql = "SELECT o.user_id, o.orders_title,
    o.position_1, o.position_2, o.position_3, o.position_4, o.position_5, o.position_6, o.position_7, o.position_8, o.position_9,
    o.order_name_1, o.order_name_2, o.order_name_3, o.order_name_4, o.order_name_5, o.order_name_6, o.order_name_7, o.order_name_8, o.order_name_9
    FROM users AS u
    LEFT OUTER JOIN orders AS o
    ON u.id = o.user_id
    WHERE u.id = ?";

    $arr = [];
    $arr[] = $user_id;

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      $result_order = $stmt->fetch();
      return $result_order;
    } catch (\Exeception $e) {
      return false;
    }
  }
  /**
   * オーダーの取得
   * @param $user_id
   * @return array
   */
  public static function getOrder_sub($user_id)
  {
    $sql = "SELECT os.user_id, os.orders_title_sub,
    os.position_1_sub, os.position_2_sub, os.position_3_sub, os.position_4_sub, os.position_5_sub, os.position_6_sub, os.position_7_sub, os.position_8_sub, os.position_9_sub,
    os.order_name_1_sub, os.order_name_2_sub, os.order_name_3_sub, os.order_name_4_sub, os.order_name_5_sub, os.order_name_6_sub, os.order_name_7_sub, os.order_name_8_sub, os.order_name_9_sub
    FROM users AS u
    LEFT OUTER JOIN orders_sub AS os
    ON u.id = os.user_id
    WHERE u.id = ?";

    $arr = [];
    $arr[] = $user_id;

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      $result_order = $stmt->fetch();
      return $result_order;
    } catch (\Exeception $e) {
      return false;
    }
  }
  /**
   * オーダーの取得
   * @param
   * @return array
   */
  public static function getOrderName($user_id)
  {
    $sql = "SELECT player.id, player.players_name FROM player
    WHERE user_id = ?";

    $arr = [];
    $arr[] = $user_id;

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      $result_order = $stmt->fetchAll();
      return $result_order;
    } catch (\Exeception $e) {
      return false;
    }
  }

  /**
   * オーダーの編集
   * @param $order_editData
   * @return array
   */
  public static function editOrder_main($order_editData)
  {
    $result_order_edit = false;

    $sql = "UPDATE orders AS o
    SET o.orders_title = ?,
    o.position_1 = ?, o.position_2 = ?, o.position_3 =?,
    o.position_4 = ?, o.position_5 = ?, o.position_6 =?,
    o.position_7 = ?, o.position_8 = ?, o.position_9 =?,
    o.order_name_1 = ?, o.order_name_2 = ?, o.order_name_3 =?,
    o.order_name_4 = ?, o.order_name_5 = ?, o.order_name_6 =?,
    o.order_name_7 = ?, o.order_name_8 = ?, o.order_name_9 =?
    WHERE o.user_id = ?";

    try {
      $stmt = connect()->prepare($sql);
      for ($i = 0; $i <= 19; $i++) {
        $stmt->bindValue($i + 1, ($order_editData[$i]));
      }
      $stmt->execute();
      return $result_order_edit;
    } catch (\Exeception $e) {
      return false;
    }
  }
  /**
   * オーダーの編集
   * @param $order_editData
   * @return array
   */
  public static function editOrder_sub($order_editData)
  {
    $result_order_edit = false;

    $sql = "UPDATE orders_sub AS os
    SET os.orders_title_sub =?,
    os.position_1_sub = ?, os.position_2_sub = ?, os.position_3_sub =?,
    os.position_4_sub = ?, os.position_5_sub = ?, os.position_6_sub =?,
    os.position_7_sub = ?, os.position_8_sub = ?, os.position_9_sub =?,
    os.order_name_1_sub = ?, os.order_name_2_sub = ?, os.order_name_3_sub =?,
    os.order_name_4_sub = ?, os.order_name_5_sub = ?, os.order_name_6_sub =?,
    os.order_name_7_sub = ?, os.order_name_8_sub = ?, os.order_name_9_sub =?
    WHERE os.user_id = ?";

    try {
      $stmt = connect()->prepare($sql);
      for ($i = 0; $i <= 19; $i++) {
        $stmt->bindValue($i + 1, ($order_editData[$i]));
      }
      $stmt->execute();
      return $result_order_edit;
    } catch (\Exeception $e) {
      return false;
    }
  }
}
