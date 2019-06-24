<?php

function db_connect() {
  $connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if (!mysqli_set_charset($connection, "utf8")) {
     var_dump(mysqli_error($connection));
     die();
  // } else {
  //   return mysqli_character_set_name($connection);
   }
  //mysqli_set_charset($connection, 'uft8');
  var_dump(mysqli_get_charset($connection));
  die();
  confirm_db_connect($connection);
  return $connection;
}

function confirm_db_connect($connection) {
  if($connection->connect_errno) {
    $msg = "Database connection failed: ";
    $msg .= $connection->connect_error;
    $msg .= " (" . $connection->connect_errno . ")";
    exit($msg);
  }
}

function db_disconnect($connection) {
  if(isset($connection)) {
    $connection->close();
  }
}

// подключаемся к серверу
$connection = db_connect();
