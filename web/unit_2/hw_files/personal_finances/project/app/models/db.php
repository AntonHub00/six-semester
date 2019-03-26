<?php

class DB_handler{

  private $host;
  private $user;
  private $password;
  private $db;

  protected function connect(){
    $this->host = "127.0.0.1";
    $this->user = "root";
    $this->password = "";
    $this->db = "personal_finances_db";

    $connection = new mysqli($this->host,
                             $this->user,
                             $this->password,
                             $this->db);

    if($connection->connect_errno){
      echo("<script>alert('ERROR: No se pudo conectar con la base de datos');
      window.location.replace('".SITE_URL."?controller=login');</script>");
    }
    else{
      return $connection;
    }
  }
}

