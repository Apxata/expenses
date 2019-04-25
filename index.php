<?php
require_once("admin/connection.php");
require_once("admin/db_function.php");
require_once("function/expenses.php");

require_once("html/header.php");
require_once("html/main.php");

if (isset($_POST['add_expense'])) {
  
// if (isset($_POST['summ'])){
  $balance_id = (int) $_POST['balance_sheet'];
  $expense_sum = (int) $_POST['summ'];
  $comment = htmlspecialchars ($_POST['comment']);
  
    $result = add_expense($balance_id, $expense_sum, $comment );
      if($result){
      echo "Трата добавлена успешно";
      }else{
      echo "Что-то пошло не так";
      }
} 


// }
// закрываем подключение
db_disconnect($connection);

