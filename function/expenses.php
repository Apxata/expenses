<?php

function get_balance_sheets(){
    global $connection;

    $query ="SELECT * FROM balance_sheet";
    $result = query($connection, $query);
    return $result_array = fetch_assoc($result);
}

function get_not_del_balance_sheets(){
    global $connection;

    $query ="SELECT * FROM balance_sheet WHERE del = 0";
    $result = query($connection, $query);
    return $result_array = fetch_assoc($result);
}

function query($connection, $query ){
    $result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection)); 
    return $result;
}

function fetch_assoc($result){
        while($row = mysqli_fetch_assoc($result)){
            $result_arr[] = $row;
        }
   return $result_arr;
}

function add_expense($balance_id, $expense_sum, $note){
    global $connection;

    $balance_id = mysqli_real_escape_string($connection, $balance_id);
    $expense_sum = mysqli_real_escape_string($connection, $expense_sum);
    $note = mysqli_real_escape_string($connection, $note);

    $sql = "INSERT INTO expenses (balance_id, expense_sum, comment) VALUES ($balance_id, $expense_sum, '$note')";
    $result = query($connection, $sql);
    return $result;
}

function get_all_visible_expenses(){
    global $connection;

    $sql ="SELECT expenses.id, balance_id, expense_sum, date_created, comment, 
             name FROM expenses JOIN (balance_sheet) ON (balance_sheet.id = expenses.balance_id) ORDER BY expenses.id DESC";
    $result = query($connection, $sql);
    return $result_array = fetch_assoc($result);
}

function get_balance_sheet_name_by_id() {
    global $connection;

}

function delete_expense_by_id($id){
    global $connection;

    $id = mysqli_real_escape_string($connection, $id);

    $sql = "DELETE FROM expenses WHERE id = $id";
    $result = query($connection, $sql);
    return $result;
}

function find_balance_sheet_by_id($id) {
    global $connection;

    $id = mysqli_real_escape_string($connection, $id);

    $sql = "SELECT * FROM balance_sheet WHERE id = $id LIMIT 1";
    $result = query($connection, $sql);
    $result_array = fetch_assoc($result);
    return array_shift($result_array);
}

function update_balance_sheet_name($id, $balance_sheet_name, $balance_sheet_del){
    global $connection;

    $id = mysqli_real_escape_string($connection, $id);
    $balance_sheet_name = mysqli_real_escape_string($connection, $balance_sheet_name);
    $balance_sheet_del = mysqli_real_escape_string($connection, $balance_sheet_del);

    $sql = "UPDATE balance_sheet SET NAME = '$balance_sheet_name', DEL = $balance_sheet_del WHERE ID =  $id LIMIT 1 ";
    $result = query($connection, $sql);
    return $result;
}