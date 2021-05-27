<?php
/**
 * Author : Pedroletti Michael
 * Contact : michael@pedroletti.ch
 * Description : This file will contain function needed to change status of a user
 */

require_once 'dbConnector.php';

$id = $_POST['id'];
$status = $_POST['status'];

if($status == "reactivation"){
    $query = "UPDATE `users` SET `status`=1 WHERE users.IDUsers=".$id;

    executeQuery($query);
}
if($status == "suspend"){
    $query = "UPDATE `users` SET `status`=0 WHERE users.IDUsers=".$id;

    executeQuery($query);
}
elseif($status == "delete"){
    $query = "DELETE FROM `users` WHERE users.IDUsers=".$id;

    executeQuery($query);
}
