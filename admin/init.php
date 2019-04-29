<?php

define("ADMIN_PATH", __DIR__);
define("PROJECT_PATH", dirname(ADMIN_PATH));
DEFINE('DS', DIRECTORY_SEPARATOR); 

require_once("connection.php");
require_once("db_function.php");
require_once(PROJECT_PATH.DS."function".DS."expenses.php");


session_set_cookie_params(2592000);
session_start();

if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}

if ($_SESSION['authorize'] != 1){
    header("Location: login.php");
  }

require_once(PROJECT_PATH.DS."html".DS."header.php");
require_once(PROJECT_PATH.DS."html".DS."footer.php");