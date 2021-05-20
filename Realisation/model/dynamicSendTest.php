<?php
/**
 * Author : Michael Pedroletti
 * Creation : 20.05.2021
 * Description : Test with dynamic send of function via JS
 */

require_once 'dbConnector.php';

$query = "UPDATE consumables SET consumables.stock=".$_POST['stock']." WHERE consumables.IDConsumables=".$_POST['id'];

executeQuery($query);