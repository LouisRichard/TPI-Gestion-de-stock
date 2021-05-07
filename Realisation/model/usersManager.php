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
    $query = "SELECT `mail`, `password` FROM `utilisateurs`";

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
    $query = "SELECT `email`, `lastname`, `firstname` FROM `users` WHERE email =".$strSep.$mail.$strSep;

    //Execute and return query
    return executeQuery($query);
}