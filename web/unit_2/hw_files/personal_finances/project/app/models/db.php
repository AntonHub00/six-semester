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
      echo("<scritpt>alert('ERROR: No se pudo conectar con la
        base de datos');</scritpt>");
    }

    return $connection;
  }

}

