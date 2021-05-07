<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : This file contains all model function used to do a connection with DB
 **/

require 'encryption.php';

/**
 * Function used to open connexion with an DB.
 */
function openDBConnexion(){
    $tempDbConnexion = null;

    $sqlDriver = 'mysql';
    $hostname = 'gg110.myd.infomaniak.com';
    $port = 3306;
    $charset = 'utf8';
    $dbName = 'gg110_tpi';
    $userName = 'gg110_tpi_viewer';
    $userPwd = '';

    $dsn = $sqlDriver . ':host=' . $hostname . ';dbname=' . $dbName . ';port=' . $port . ';charset=' . $charset;

    try {
        $tempDbConnexion = new PDO($dsn, $userName, $userPwd);
    } catch (PDOException $exception) {
        echo 'Connection failed: ' . $exception->getMessage() . ' ' . $userPwd;
    }
    return $tempDbConnexion;
}

/**
 * Function used to execute a query to the db
 * @param $query - query
 * @param null $type - define if we user a select or a set - null = select query
 * @return array|bool - can return a table of data or true/false
 */
function executeQuery($query, $type=null){
    $queryResult = null;

    $dbConnexion = openDBConnexion();

    if ($dbConnexion != null) {
        $statement = $dbConnexion->prepare($query);
        $statement->execute();
        if ($type == null){
            $queryResult = $statement->fetchAll();
        }
        else{
            $queryResult = $statement;
        }
    }

    $dbConnexion = null;
    return $queryResult;
}