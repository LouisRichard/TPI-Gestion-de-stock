<?php
/**
 * Author : Michael Pedroletti
 * Creation : 20.05.2021
 * Description : File used to set new stock for consumable
 */
require_once 'dbConnector.php';

$strSep = '\'';
$userId = executeQuery("SELECT IDUsers FROM users WHERE email=".$strSep.$_POST['emailUser'].$strSep);

$query = "INSERT INTO consumables_users (consumables_users.quantity, consumables_users.FKConsumables, consumables_users.FKUsers) VALUES (".$_POST['stock'].", ".$_POST['id'].", ".$userId[0]['IDUsers'].")";
executeQuery($query);

$query = "UPDATE consumables SET consumables.stock=".$_POST['stock']." WHERE consumables.IDConsumables=".$_POST['id'];
executeQuery($query);
