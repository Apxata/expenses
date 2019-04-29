<?php
require_once("admin/connection.php");
require_once("admin/db_function.php");
require_once("function/expenses.php");
require_once("admin/init.php");

if (isset($_POST["password"])) {
    if ($_POST["simplepswd"] == 198719882016){
      $_SESSION["authorize"] = 1;
      header("Location: index.php");
    }else{
      echo "Что-то пошло не так";
    }
}

require_once("html/header.php");
require_once("html/footer.php");
?>

<form action=login.php method="POST" class="form-inline">
  <div class="form-group mb-2">
    <label for="staticEmail2" class="sr-only">Email</label>
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Введите пароль">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Password</label>
    <input type="password" name="simplepswd" class="form-control" id="inputPassword2" placeholder="Password">
  </div>
  <button type="submit" name="password" class="btn btn-primary mb-2">Confirm identity</button>
</form>