<table class="table table-dark">
    <h1> Добавить новую статью баланса</h1>
    <form action="balance_sheet_sheet.php" method="POST" class="form-inline">
        <div class="form-group lg-6">
            <label for="inputPassword2" class="sr-only"></label>
            <input type="text" class="form-control" name="balance_sheet_name" id="bs_name">
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
    <button type="submit" name="add_new_balance_sheet" class="btn btn-primary mb-2">Отредактировать</button>
    </form>
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Название баланса</th>
                    <th scope="col">Удалено</th>
                    <th scope="col">Ред</th>
                </tr>
            </thead>
                
        <?php 
            // получаем список всех статей баланса  
            $result_array = get_balance_sheets(); 
        ?>
            <tbody>
                <?php foreach($result_array as $item){ ?>
                    <tr>
                        <td><?php echo $item["id"]; ?></td>
                        <td><?php echo $item["name"]; ?></td>
                        <td><?php if ($item["del"] == 0){echo "Нет"; }else{echo "Да";} ?></td>
                        <td><a href="html/balance_sheet_edit.php?id=<?php  echo $item["id"]; ?>">ред</a></td>
                    </tr>
                <?php 
                    }
                ?>
            </tbody>


</table>