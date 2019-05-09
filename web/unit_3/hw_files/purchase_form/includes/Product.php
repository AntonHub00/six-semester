<?php

class Product extends DB{
  public static function get_all(){
    $query = "SELECT * FROM producto";

    $result = DB::connect()->query($query);

    if($result->num_rows > 0)
      return $result;
    else
      return false;
  }
}

?>

