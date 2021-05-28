<?php


function addConsumable($name, $quantity, $type, $brand, $linkedProducts){
    //Prepare query
    $strSep = '\'';
    $query = "INSERT INTO `consumables`(`name`, `stock`, `FKConsumableTypes`, `FKBrand`) VALUES (".$strSep.$name.$strSep.",".$quantity.",".$type.",".$brand.")";

    executeQuery($query, 'insert');

    $query = "SELECT max(IDConsumables) AS idConsumable FROM `consumables`";
    $idConsumable = executeQuery($query);
    foreach($linkedProducts as $product) {
        $query = "INSERT INTO `consumables_products`(`FKConsumables`, `FKProducts`) VALUES (".$idConsumable[0]['idConsumable'].", ".$product.")";

        executeQuery($query, 'insert');
    }
}