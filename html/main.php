<body>
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
                <?php $result_array = get_balance_sheets(); ?>
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
                <td><?php echo $item["name"]; ?></td>
                <td><?php echo $item["comment"]; ?></td>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>