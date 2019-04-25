<?php

require_once("admin/connection.php");
require_once("admin/db_function.php");
require_once("function/expenses.php");

if (isset($_GET['id'])){
   $id = (int) $_GET['id'];
   $result = delete_expense_by_id($id);
   if($result){
       header("Location:index.php");
   }else{
        echo "Что-то пошло не так";
   }
}
