        <!-- тут пишем сумму  -->
        <form action=update_expense.php method="POST" class="form-inline">
        <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">сколько денег</label>
            <div class="input-group">
            <div class="input-group-addon">РУБ</div>
            <input type="number" name="summ" required class="form-control" id="exampleInputAmount" value="<?php echo $expense['expense_sum']; ?>" placeholder="Сумма">
            <div class="input-group-addon"></div>
            </div>
        </div>
        <!-- делаем запрос и достаем статьи расхода (еда, авто и т.д.) -->
                <?php $result_array = get_not_del_balance_sheets(); ?>
                <select class="form-control" name="balance_sheet">
                    <?php foreach($result_array as $item) { ?>
                        <option value="<?php echo $item["id"];  ?>"  <?php if($item['id'] == $expense['balance_id']) echo "selected" ; ?> >
                            <?php echo $item["name"]; ?>
                        </option>
                     <?php } ?>
                </select>
                <!-- здесь краткий комент на что потратили -->
                <input type="text" required name="comment" class="form-control" placeholder="Text input" value="<?php echo $expense["comment"] ;?>">
                <input type="hidden" name="id" value="<?php echo $expense['id']; ?>">
                <input type="submit" name="update_expense" class="btn btn-primary">
        </form>
        
        
        
  