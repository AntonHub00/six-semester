<?php

#mysqli_data_seek();

class Provider extends DB{
  public static function get_all(){
    $query = "SELECT * FROM proveedor";

    $result = DB::connect()->query($query);

    if($result->num_rows > 0)
      return $result;
    else
      return false;
  }
}

?>
