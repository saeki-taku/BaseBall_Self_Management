<?php
require_once('DB.php');

class Acount
{
  /**
   * 新規とユーザーの登録
   * @param array $userData
   * @return bool $result
   */
  public static function createUser($userData)
  {

    $result = false;

    $sql = "INSERT INTO users(team_name, mail, password) VALUES(?, ?, ?)";

    //ユーザーデータを配列に入れる
    $arr = [];
    $arr[] = $userData['team_name'];
    $arr[] = $userData['mail'];
    $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT);

    try {
      $stmt = connect()->prepare($sql);
      $result = $stmt->execute($arr);
      return $result;
    } catch (\Exeception $e) {
      return $result;
    }
  }

  /**
   * ログイン処理
   * @param string $mail
   * @param string $password
   * @return bool $result
   */

  public static function login($mail, $password)
  {
    //結果
    $result = false;
    //ユーザーをメールアドレスから検索して取得
    $user = self::getUserByMail($mail);
    //ユーザーの有無を確認し処理
    if (!$user) {
      $_SESSION['msg'] = 'メールアドレスが一致しません';
      return $result;
    }

    //パスワードの照会
    if (password_verify($password, $user['password'])) {
      //ログイン成功
      session_regenerate_id(true);
      $_SESSION['login_user'] = $user;
      $result = true;
      return $result;
    }
    $_SESSION['msg'] = 'パスワードが一致しません';
    return $result;

    var_dump($user);
    return;
  }

  /**
   * mailからユーザーを取得
   * @param string $mail
   * @return array|bool $user|false
   */

  public static function getUserByMail($mail)
  {
    //SQLの準備
    //SQLの実行
    //SQLの結果
    $sql = "SELECT * FROM users WHERE mail = ?";

    //ユーザーデータを配列に入れる
    $arr = []; //一度、空にする
    $arr[] = $mail; //入力された$mailを取得

    try {
      $stmt = connect()->prepare($sql);
      $stmt->execute($arr);
      $user = $stmt->fetch();
      return $user;
    } catch (\Exeception $e) {
      return false;
    }
  }
  /**
   * mailからユーザーを取得
   * @param void
   * @return bool $result
   */
  public static function checkLogin()
  {
    $result = false;

    //セッショにログインユーザーが入っていなかったらfalse
    if (isset($_SESSION['login_user']) && $_SESSION['login_user']['id'] > 0) {
      return $result = true;
    }
    // header('Location: ../../index.php');
    return $result;
  }

  /**
   * mailからユーザーを取得
   * @param void
   * @return bool $result
   */
  public static function logout()
  {

    $_SESSION = array();
    session_destroy();
  }


  /**
   **アカウント編集
   * @param array $team_name
   * @param array $mail
   * @param array $new_password_hash
   * @param array $login_user_id
   * @return bool $result
   */
  public static function updateUser($team_name, $mail, $new_password_hash, $login_user_id)
  {
    $result = false;

    $sql = "UPDATE users
    SET team_name = ?, mail = ?, password = ?
    WHERE id = ?";

    try {
      $stmt = connect()->prepare($sql);
      $stmt->bindValue(1, $team_name);
      $stmt->bindValue(2, $mail);
      $stmt->bindValue(3, $new_password_hash);
      $stmt->bindValue(4, $login_user_id);
      $result = $stmt->execute();
      return $result;
    } catch (\Exeception $e) {
      return false;
    }
  }

  /**
   * アカウントの削除
   * @param string $delete_id
   * @return array $result
   */

  public static function deleteAcount($delete_id)
  {
    $result = false;

    $sql = "DELETE us, p, c, r, os FROM users AS us
    LEFT OUTER JOIN player AS p
    ON us.id = p.user_id
    LEFT OUTER JOIN orders AS o
    ON us.id = o.user_id
    LEFT OUTER JOIN orders_sub AS os
    ON us.id = os.user_id
    LEFT OUTER JOIN record AS r
    ON p.id = r.r_player_id
    LEFT OUTER JOIN conditions AS c
    ON p.id = c.c_player_id
    WHERE us.id = ?
    ";

    try {
      $stmt = connect()->prepare($sql);
      $stmt->bindValue(1, $delete_id);
      $result = $stmt->execute();
      return $result;
    } catch (\Exeception $e) {
      echo $e->getMessage();
      return false;
    }
  }

}
