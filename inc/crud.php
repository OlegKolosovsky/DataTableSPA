<?php

session_start();
$login = $_SESSION['login'];

require_once '../inc/db.php';

$date = date('Y-m-d H:i:s');

$value1 = (isset($_POST['value1'])) ? $_POST['value1'] : '';
$value2 = (isset($_POST['value2'])) ? $_POST['value2'] : '';
$value3 = (isset($_POST['value3'])) ? $_POST['value3'] : '';
$value4 = (isset($_POST['value4'])) ? $_POST['value4'] : '';
$value5 = (isset($_POST['value5'])) ? $_POST['value5'] : '';

$option = (isset($_POST['option'])) ? $_POST['option'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch ($option) {
    case 1:
        $query = "INSERT INTO data_table (login, num_rew, date, value1, value2, value3, value4, value5) VALUES ('$login', '1', '$date', '$value1', '$value2', '$value3', '$value4', '$value5') ";
        $result = $database->prepare($query);
        $result->execute();
        break;
        /*         $query = "SELECT * FROM data_table ORDER BY id DESC LIMIT 1";
        $result = $database->prepare($query);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC); */
    case 2:

        $stmt = $database->query("SELECT num_rew FROM data_table WHERE id = '$id' ");
        $row = $stmt->fetch();
        $num_rew = $row['num_rew'] + 1;

        $query = "UPDATE data_table SET login='$login', num_rew='$num_rew', date='$date', value1='$value1', value2='$value2', value3='$value3', value4='$value4', value5='$value5' WHERE id='$id' ";
        $result = $database->prepare($query);
        $result->execute();
        break;
        /*         $query = "SELECT * FROM data_table WHERE id='$id' ";
        $result = $database->prepare($query);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC); */
    case 3:
        $query = "DELETE FROM data_table WHERE id='$id' ";
        $result = $database->prepare($query);
        $result->execute();

        $query = "INSERT INTO delete_log (login, date, value1, value2, value3, value4, value5) VALUES('$login', '$date', '$value1', '$value2', '$value3', '$value4', '$value5') ";
        $result = $database->prepare($query);
        $result->execute();
        break;
    case 4:
        $query = "SELECT id, value1, value2, value3, value4, value5 FROM data_table";
        $result = $database->prepare($query);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);
