<?php
/**
 * Author : Pedroletti Michael
 * Description : This file is used to manage all component in relation with consumable
 * Creation date : 28.05.2021
 */


/**
 * This function is used to add a new consumable to the DB
 * @param $name = name of the new consumable
 * @param $quantity = base quantity of the new consumable
 * @param $type = type of the new consumable
 * @param $brand = brand of the new consumable
 * @param $linkedProducts = linked product of the new consumable
 */
function addConsumable($name, $quantity, $type, $brand, $linkedProducts){
    //Prepare query
    $strSep = '\'';
    $query = "INSERT INTO `consumables`(`name`, `stock`, `FKConsumableTypes`, `FKBrand`) VALUES (".$strSep.$name.$strSep.",".$quantity.",".$type.",".$brand.")";
    //Insert the new consumable
    executeQuery($query, 'insert');

    $query = "SELECT max(IDConsumables) AS idConsumable FROM `consumables`";
    $idConsumable = executeQuery($query);

    //Add the relation with linked product
    foreach($linkedProducts as $product) {
        $query = "INSERT INTO `consumables_products`(`FKConsumables`, `FKProducts`) VALUES (".$idConsumable[0]['idConsumable'].", ".$product.")";

        executeQuery($query, 'insert');
    }
}

/**
 * Get products ID
 * @return array
 */
function getProductsId(){
    $query = "SELECT IDProducts FROM products";

    return executeQuery($query);
}