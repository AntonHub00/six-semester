<?php

class Account extends DB_handler{

  public static function register($username, $name, $number, $balance){
    $query = "INSERT INTO account (user_id, name, number, balance)
      VALUES('$username', '$name', '$number', $balance);";

    $result = self::connect()->query($query);

    if($result)
      return true;
    else
      return false;
  }

  public static function get($username, $account_name){
    $query = "SELECT * FROM account
      WHERE user_id = '$username' AND name = '$account_name'";

    $result = self::connect()->query($query);

    if($result->num_rows > 0)
      return true;
    else
      return false;
  }

  public static function get_all($username){
    $query = "SELECT * FROM account
      WHERE user_id = '$username'";

    $result = self::connect()->query($query);

    if($result->num_rows > 0)
      return $result;
    else
      return false;
  }

  public static function update($username, $name, $current_name, $number, $balance){
    $query = "UPDATE account SET name = '$name', number = '$number',
      balance = $balance WHERE user_id = '$username' AND name = '$current_name'";

    $result = self::connect()->query($query);

    if($result)
      return true;
    else
      return false;
  }

  public static function delete($username, $name){
    $query = "DELETE FROM account
      WHERE user_id = '$username' AND name = '$name'";

    $result = self::connect()->query($query);

    if($result)
      return true;
    else
      return false;
  }

}
