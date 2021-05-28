<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : This file contains all model function that have a connection with user
 **/

require_once 'model/dbConnector.php';

/**
 * This function check if the credentials of an user connection is correct or not
 * @param $userMail - email of the request
 * @param $pwd - pwd of the request
 * @return false|array - return array with user information if the connection is a success - else return false
 */
function userConnection($userMail, $pwd){
    //Get information about all users from the db
    $dbUsersInformation = getUsersConnectionInformation();

    //Check if a connection is good or not
    foreach($dbUsersInformation as $userInformation){
        if($userInformation['email'] == $userMail){
            if(password_verify($pwd, $userInformation['password'])){
                return getUserInformation($userInformation['email']);
            }
        }
    }

    return false;
}

/**
 * This function get all users information that we need to use to connect a user
 * @return array - return array with all information
 */
function getUsersConnectionInformation(){
    //Prepare query
    $query = "SELECT `email`, `password` FROM `users` WHERE `status` = 1";

    //Execute and return the query
    return executeQuery($query);
}

/**
 * Get information about an existent user
 * @param $mail - mail of the user
 * @return array - return array with information that we need
 */
function getUserInformation($mail){
    //Prepare query
    $strSep = '\'';
    $query = "SELECT `email`, `lastname`, `firstname`, `adminStatus` FROM `users` WHERE email =".$strSep.$mail.$strSep;

    //Execute and return query
    return executeQuery($query);
}

/**
 * Function used to set a user as a default user or an admin
 * @param $id = id of the user
 * @param $action = to know if we need to set admin or default user
 */
function setStatusUserAdmin($id, $action = false){
    $query = "";

    if(!$action){
        $query = "UPDATE `users` SET `adminStatus`=0 WHERE users.IDUsers=".$id;
    }
    else{
        $query = "UPDATE `users` SET `adminStatus`=1 WHERE users.IDUsers=".$id;
    }

    echo $query;
    executeQuery($query);
}

/**
 * Get all id of all users in the DB
 * @return array = array with ID of the users
 */
function getUsersID(){
    $query = "SELECT `IDUsers` FROM `users`";

    return executeQuery($query);
}

/**
 * This function is used to know if the userLogin exist in an AD and if the password of the user is correct.
 * If this two parameters are correct, the function give back basics information about the user (mail, first and last name)
 * @param $userLogin - login of the user
 * @param $userPwd - password of the user
 * @return array - return userInformation
 */
function adVerification($userLogin, $userPwd){
    putenv('LDAPTLS_REQCERT=never');
    $result = null;

    //verify if the ldaps path is correct and open a connection path
    $ds=ldap_connect("ldaps://LDAPSPath:636");

    ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);

    if ($ds) {
        //connect the user(login + pwd) with the ldap path
        $r=ldap_bind($ds, $userLogin."@LDAPPath", $userPwd); // Connection of the user

        if($r){
            $result = array();

            //search information about the specified user (samaccountname)
            $sr=ldap_search($ds, "path where we need to check account", "samaccountname=".$userLogin);
            //example of path "ou=personnel,dc=pedroletti,dc=ch"

            $info = ldap_get_entries($ds, $sr);

            //push information needed into the table result
            array_push($result, $info[0]["sn"][0]);
            array_push($result, $info[0]["givenname"][0]);
            array_push($result, $info[0]["mail"][0]);

            //close the ldap connection
            ldap_close($ds);
        }
        else{
            //close the ldap connection
            ldap_close($ds);
        }



    }

    return $result;
}