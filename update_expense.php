<?php
require_once("admin/init.php");
check_authorization();
require_once(PROJECT_PATH.DS."html".DS."header.php");
require_once(PROJECT_PATH.DS."html".DS."footer.php");

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $expense = get_expense_by_id($id);
}

// require_once("html/header.php");
require_once("html/update_expense_htm.php");
// require_once("html/footer.php");

// }
// закрываем подключение
db_disconnect($connection);