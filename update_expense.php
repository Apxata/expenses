<?php
require_once("admin/init.php");
check_authorization();


if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $expense = get_expense_by_id($id);
}

if (isset($_POST['update_expense'])) {
    
    $balance_id = (int) $_POST['balance_sheet'];
    $expense_sum = (int) $_POST['summ'];
    $expense_id = (int) $_POST['id'];
    $comment = htmlspecialchars ($_POST['comment']);
    
      $result = update_expense($expense_id, $balance_id, $expense_sum, $comment );
        if($result){
          header("Location: index.php");
        }else{
        echo "Что-то пошло не так";
        }
  } 
  
  require_once(PROJECT_PATH.DS."html".DS."header.php");
  require_once(PROJECT_PATH.DS."html".DS."footer.php");
// require_once("html/header.php");
require_once("html/update_expense_htm.php");
// require_once("html/footer.php");

// }
// закрываем подключение
db_disconnect($connection);