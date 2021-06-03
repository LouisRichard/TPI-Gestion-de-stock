<?php
/**
 * Author : Pedroletti Michael
 * Contact : michael@pedroletti.ch
 * Creation date : 28.05.2021
 * Description : File used to add new user to the db
 */

require_once 'dbConnector.php';

if(!userAlreadyExist($_POST['email'])){
    $lastname = $_POST['lName'];
    $firstname = $_POST['fName'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $admin = $_POST['admin'];
    addUser($lastname, $firstname, $email, $pwd, $admin);
}

/**
 * Function used to add new user into db
 * Status for all new user is on
 * @param $lastname - lastname of the new user
 * @param $firstname - firstname of the new user
 * @param $email - email of the new user
 * @param $pwd - password of the new user
 * @param $admin - status admin of the new user
 * @return bool - success = true, failed = false
 */
function addUser($lastname, $firstname, $email, $pwd, $admin){
    $return = false;

    //Prepare query
    $strSep = '\'';
    $query = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `adminStatus`) VALUES (".$strSep.$firstname.$strSep.",".$strSep.$lastname.$strSep.",".$strSep.$email.$strSep.",".$strSep.password_hash($pwd, PASSWORD_DEFAULT).$strSep.",".$admin.")";

    //Try to execute query
    try{
        executeQuery($query, 'insert');
        $return = true;
    }
    catch(Exception $e){
        echo "<script>console.log('".$e."');</script>";
        $return = false;
    }
    return $return;
}

/**
 * Function to know if a user already exist in our DB
 * @param $userEmail - email of the user
 * @return bool - true = user already exit - false = user do not exist
 */
function userAlreadyExist($userEmail){
    $result = false;

    //prepare the query
    $query = "SELECT `email` FROM `users`";

    //execute the query and get the result into a $dbInformation
    $dbInformation = executeQuery($query);

    //check information
    foreach ($dbInformation as $email){
        if($email['email'] == $userEmail){
            $result = true;
        }
    }

    // return information
    return $result;
}