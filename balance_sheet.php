<?php
require_once("admin/init.php");
check_authorization();
require_once(PROJECT_PATH.DS."html".DS."header.php");
require_once(PROJECT_PATH.DS."html".DS."footer.php");


if(isset($_POST["add_new_balance_sheet"])){
    $balance_sheet_name = htmlspecialchars ($_POST['balance_sheet_name']);
    $balance_sheet_del = (int) $_POST['balance_sheet_del'];
    $result = add_new_balance_sheet($balance_sheet_name, $balance_sheet_del );
    if($result){
        echo "Все прошло успешно";
    }else{
        echo "Что-то пошло не так";
    }
}

require_once("html/balance_sheet_htm.php");
