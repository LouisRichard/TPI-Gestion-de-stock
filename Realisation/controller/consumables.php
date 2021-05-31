<?php
/**
 *
 */

require_once 'model/dbConnector.php';

function newConsumable($data){
    $name = trim($data['consumableName']);
    $quantity = $data['consumableQuantity'];
    $type = $data['consumableType'];
    $brand = $data['consumableBrand'];
    $linkedProducts = array();
    $actionAvailable = true;

    if(!empty($name)){
        $idProducts = getProductsId();
        foreach($idProducts as $id){
            if(isset($data['consumableLinkedElement'.$id['IDProducts']])){
                $linkedProducts[] = $id['IDProducts'];
            }
        }

        if(!empty($linkedProducts)){
            require_once 'model/consumablesManager.php';
            try {
                addConsumable($name, $quantity, $type, $brand, $linkedProducts);
                $_SESSION['msg'] = "successAddNewConsumable";
            }
            catch (Exception $e){
                $_SESSION['msg'] = "failAddNewConsumable";
            }

        }
        else{
            $actionAvailable = false;
        }
    }
    else{
        $actionAvailable = false;
    }

    if($actionAvailable){
        displayHome();
    }
    else{
        $_SESSION['msg'] = "missingValueNewConsumable";
        displayNewConsumable();
    }
}

function getProductsId(){
    $query = "SELECT IDProducts FROM products";

    return executeQuery($query);
}