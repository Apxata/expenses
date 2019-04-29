<?php
require_once("../admin/init.php");

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $balance_sheet = find_balance_sheet_by_id($id);
}

if(isset($_POST["balance_sheet_edit"])){
    $balance_sheet_name = htmlspecialchars ($_POST["balance_sheet_name"]);
    $balance_sheet_del = (int) $_POST["balance_sheet_del"];
    $id = (int) $_GET['id'];
    $result = update_balance_sheet_name($id, $balance_sheet_name, $balance_sheet_del);
    if($result){
        echo "Страница успешно обновлена";
    }
}

?>

<form action="balance_sheet_edit.php?id=<?php echo $id;?>" method="POST" class="form-inline">
  <div class="form-group mb-2">
    <label for="id_balance_sheet" class="sr-only">id</label>
    <input type="text" readonly class="form-control-plaintext" id="bs_id" value="id = <?php echo $balance_sheet["id"]; ?>">
  </div>
    <div class="form-group lg-6">
        <label for="inputPassword2" class="sr-only"></label>
        <input type="text" class="form-control" name="balance_sheet_name" id="bs_name" value="<?php echo $balance_sheet["name"]; ?>">
        <div class="form-check">
    <input class="form-check-input" type="radio" name="balance_sheet_del" id="exampleRadios1" value="0" <?php if($balance_sheet["del"] == 0){echo "checked"; } ; ?>>
    <label class="form-check-label" for="exampleRadios1">
        Включено
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="radio" name="balance_sheet_del" id="exampleRadios2" value="1" <?php if($balance_sheet["del"] == 1){echo "checked"; }?>>
    <label class="form-check-label" for="exampleRadios2">
        Отключено
    </label>
    </div>
  <button type="submit" name="balance_sheet_edit" class="btn btn-primary mb-2">Отредактировать</button>
</form>
