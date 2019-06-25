
        <!-- тут пишем сумму  -->
        <form action=index.php method="POST" class="form-inline">
        <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">сколько денег</label>
            <div class="input-group">
            <div class="input-group-addon">РУБ</div>
            <input type="number" name="summ" required class="form-control" id="exampleInputAmount" placeholder="Сумма">
            <div class="input-group-addon"></div>
            </div>
        </div>
        <!-- делаем запрос и достаем статьи расхода (еда, авто и т.д.) -->
                <?php $result_array = get_not_del_balance_sheets(); ?>
                <select class="form-control" name="balance_sheet">
                    <?php foreach($result_array as $item){ ?>
                        <option value="<?php echo $item["id"];  ?>"><?php echo $item["name"]; ?></option>
                     <?php } ?>
                </select>
                <!-- здесь краткий комент на что потратили -->
                <input type="text" required name="comment" class="form-control" placeholder="Text input">
                <input type="submit" name="add_expense" class="btn btn-primary">
        </form>
        
        <?php $all_expenses = get_all_visible_expenses(); ?>
        
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Дата</th>
                <th scope="col">Сумма</th>
                <th scope="col">Статья</th>
                <th scope="col">Коммент</th>
                <th scope="col">Ред</th>
                <th scope="col">Удалить</th>
                </tr>
            </thead>
           
            <tbody>
            <?php 
            if(!empty($all_expenses)){
                foreach ($all_expenses as $item) { 
                
            ?>
                <tr>
                <th scope="row"><?php $i=$i+1; echo $i; $item["id"]; ?></th>
                <td><?php echo $item["date_created"]; ?></td>
                <td>
                    <?php 
                        echo $item["expense_sum"];
                        $summ_expenses = $summ_expenses + $item["expense_sum"]; 
                    ?>
                 </td>
                <td>
                    <?php if($expense["id"] == $item["expense_id"]){
                        echo '<select class="form-control" name="balance_sheet">';
                        foreach($result_array as $item2){
                            echo "<option value=\"" . $item2["id"] . "\""; 
                                if($item2["id"] == $item["balance_id"]){
                                    echo "selected";
                                } 
                            echo ">";
                            
                            echo $item2["name"];
                            echo "</option>";
                        }
                        echo "</select>";
                    } 
                    ?>
                    <!-- <select class="form-control" name="balance_sheet"> -->
                        <?php // foreach($result_array as $item2){ ?>
                            <!-- <option value="<?php // echo $item2["id"];?>" -->
                                <?php
                                //if($item2["id"] == $item["balance_id"]){
                                    //echo "selected";
                                //}?>
                                <!-- > -->
                                <?php // echo $item2["name"];                           
                            ?> 
                            <!-- </option> -->
                        <?php //} ?>
                    <!-- </select> -->
                </td>
                <td><input type="text" required name="comment" class="form-control" value="<?php echo $item["comment"]; ?>"></td>
                <td><a href="update_expense.php?id=<?php echo  $item["id"]; ?>">Ред</a> </td>
                <td><a href="delete_expense.php?id=<?php echo  $item["id"]; ?>">удалить</a> </td>
                </tr>
            <?php 
                }
            } 
            ?>
                <tr>
                    <td>Итого</td>
                    <td></td>
                    <td><?php echo $summ_expenses; ?> </td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
           
        </table>

  