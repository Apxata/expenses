<?php
require_once("admin/init.php");

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

require_once("html/balance_sheet.php");
