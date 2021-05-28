<?php
/**
 *
 */

require_once 'model/dbConnector.php';

function newConsumable($data){
    $name = $data['consumableName'];
    $quantity = $data['consumableQuantity'];
    $type = $data['consumableType'];
    $brand = $data['consumableBrand'];
    $linkedProducts = array();

    $idProducts = getProductsId();
    foreach($idProducts as $id){
        if(isset($data['consumableLinkedElement'.$id['IDProducts']])){
            $linkedProducts[] = $id['IDProducts'];
        }
    }

    require_once 'model/consumablesManager.php';
    try {
        addConsumable($name, $quantity, $type, $brand, $linkedProducts);
        $_SESSION['msg'] = "successAddNewConsumable";
    }
    catch (Exception $e){
        $_SESSION['msg'] = "failAddNewConsumable";
    }
    displayHome();
}

function getProductsId(){
    $query = "SELECT IDProducts FROM products";

    return executeQuery($query);
}