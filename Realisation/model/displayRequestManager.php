<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 18.05.2021
 * Description : In this file I will stock all function that i need to get
 *               information for display
 */
require_once 'dbConnector.php';

/**
 * This function return all needed information for home display about all consumables
 * @return array
 */
function getAllConsumables(){
    $return = array("consumablesDanger", "consumables");

    $query = "SELECT * FROM consumablesInformations WHERE consumablesInformations.stock < 6;";
    $consumablesDanger = executeQuery($query);

    foreach($consumablesDanger as $consumableDanger){
        if(!isset($return['consumablesDanger'][$consumableDanger['IDConsumables']])){
            $tab = array(
                "IDConsumables" => $consumableDanger['IDConsumables'],
                "name" => $consumableDanger['name'],
                "stock" => $consumableDanger['stock'],
                "type" => $consumableDanger['type'],
                "brand" => $consumableDanger['brand'],
                "products" => array()
            );
            $return['consumablesDanger'][$consumableDanger['IDConsumables']] = $tab;
        }

        $return['consumablesDanger'][$consumableDanger['IDConsumables']]['products'][] = array(
            "productName" => $consumableDanger['productName'],
            "productType" => $consumableDanger['productType'],
            "productBrands" => $consumableDanger['productBrands']
        );
    }

    $query = "SELECT * FROM consumablesInformations WHERE consumablesInformations.stock >= 6;";
    $consumables = executeQuery($query);

    foreach($consumables as $consumable){
        if(!isset($return['consumables'][$consumable['IDConsumables']])){
            $tab = array(
                "IDConsumables" => $consumable['IDConsumables'],
                "name" => $consumable['name'],
                "stock" => $consumable['stock'],
                "type" => $consumable['type'],
                "brand" => $consumable['brand'],
                "products" => array()
            );
            $return['consumables'][$consumable['IDConsumables']] = $tab;
        }

        $return['consumables'][$consumable['IDConsumables']]['products'][] = array(
            "productName" => $consumable['productName'],
            "productType" => $consumable['productType'],
            "productBrands" => $consumable['productBrands']
        );
    }

    return $return;
}

/**
 * Get all brands name
 * @return array
 */
function getBrands(){
    $query = "SELECT name FROM brands";

    return executeQuery($query);
}

/**
 * Get all consumable types
 * @return array
 */
function getConsumableTypes(){
    $query = "SELECT name FROM consumable_types";

    return executeQuery($query);
}

/**
 * Get all information about all products
 * @return array
 */
function getProducts(){
    $query = "SELECT products.name, brands.name AS brand, product_types.name AS type FROM `products`
        INNER JOIN product_types ON products.FKProductTypes = product_types.IDProductTypes
        INNER JOIN brands ON products.FKBrand = brands.IDBrands";

    return executeQuery($query);
}

