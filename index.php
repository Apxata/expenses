<?php
require_once('admin/init.php');
check_authorization();


if (isset($_POST['add_expense'])) {

  $balance_id = (int) $_POST['balance_sheet'];
  $expense_sum = (int) $_POST['summ'];
  $comment = htmlspecialchars ($_POST['comment']);
  
    $result = add_expense($balance_id, $expense_sum, $comment );
      if($result){
        header("Location: index.php");
      }else{
      echo "Что-то пошло не так";
      }
} 

require_once(PROJECT_PATH.DS."html".DS."header.php");
require_once(PROJECT_PATH.DS."html".DS."footer.php");

// require_once("html/header.php");
require_once("html/main.php");
// require_once("html/footer.php");

// }
// закрываем подключение
db_disconnect($connection);

