<?php
/**
 *
 */

require_once 'model/dbConnector.php';

/**
 * Function used to add new consumable to the DB
 * @param $data = data needed to add new consumable
 */
function newConsumable($data){
    $name = trim($data['consumableName']);
    $quantity = $data['consumableQuantity'];
    $type = $data['consumableType'];
    $brand = $data['consumableBrand'];
    $linkedProducts = array();
    $actionAvailable = true;

    if(!empty($name)){
        require_once 'model/consumablesManager.php';
        $idProducts = getProductsId();
        foreach($idProducts as $id){
            if(isset($data['consumableLinkedElement'.$id['IDProducts']])){
                $linkedProducts[] = $id['IDProducts'];
            }
        }

        if(!empty($linkedProducts)){
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


