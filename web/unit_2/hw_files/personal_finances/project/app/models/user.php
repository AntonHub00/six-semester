<?php

class User extends DB_handler{

  public static function signin($username, $name, $fln, $sln, $birthdate,
                            $email, $phone, $password){

    $query = "INSERT INTO user (username, name, first_last_name,
              second_last_name, birthdate, email, phone, password)
              VALUES('$username', '$name', '$fln', '$sln', '$birthdate',
              '$email', '$phone', '$password')";

    $result = self::connect()->query($query);

    if($result)
      return true;
    else
      return false;
  }

  public static function update($username, $name, $fln, $sln, $birthdate,
                            $email, $phone, $password, $current_username){

    $query = "UPDATE user SET username = '$username', name = '$name', first_last_name = '$fln', second_last_name = '$sln', birthdate = '$birthdate', email = '$email', phone = '$phone', password = '$password' WHERE username = '$current_username';";

    $result = self::connect()->query($query);

    if($result)
      return true;
    else
      return false;
  }

  public static function exists($username){
    $query = "SELECT username FROM user WHERE username = '$username'";

    $result = self::connect()->query($query);

    if($result->num_rows > 0)
      return true;
    else
      return false;
  }

  public static function check_credentials($username, $password){
    $query = "SELECT username FROM user WHERE
      username = '$username' AND password = '$password'";

    $result = self::connect()->query($query);

    if($result->num_rows > 0)
      return true;
    else
      return false;
  }

  public static function get_name($username){
    $query = "SELECT name FROM user WHERE username = '$username'";

    $result = self::connect()->query($query);

    if($result->num_rows > 0)
      return $result->fetch_assoc()["name"];
    else
      return false;
  }

  public static function get_all($username){
    $query = "SELECT * FROM user WHERE username = '$username'";

    $result = self::connect()->query($query);

    if($result->num_rows > 0)
      return $result->fetch_assoc();
    else
      return false;
  }

  public static function get_categories($username){
    $query = "SELECT description FROM categories WHERE user_id = '$username'";

    $result = self::connect()->query($query);

    if($result->num_rows > 0)
      return $result;
    else
      return false;
  }

  public static function add_categorie($username, $category){
    $query = "INSERT INTO categories (user_id, description) VALUES('$username', '$category')";

    $result = self::connect()->query($query);

    if($result)
      return true;
    else
      return false;
  }

  public static function category_exists($username, $category){
    $query = "SELECT description FROM categories
      WHERE description = '$category' AND user_id = '$username'";

    $result = self::connect()->query($query);

    if($result->num_rows > 0)
      return true;
    else
      return false;
  }

  public static function update_category($username, $category, $current_category){
    $query = "UPDATE categories SET description = '$category' WHERE description = '$current_category' AND user_id = '$username';";

    $result = self::connect()->query($query);

    if($result)
      return true;
    else
      return false;
  }

  public static function delete_category($username, $category){
    $query = "DELETE FROM categories WHERE description = '$category' AND user_id = '$username'";

    $result = self::connect()->query($query);

    if($result)
      return true;
    else
      return false;
  }

}
