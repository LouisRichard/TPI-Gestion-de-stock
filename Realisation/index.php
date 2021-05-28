<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : Serve to redirect the user depending of his actions
 **/

//Start the session
session_start();

//Require all controller's files
require_once 'controller/consumables.php';
require_once 'controller/display.php';
require_once 'controller/users.php';

if(empty($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] !== "on")
{
header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
exit();
}

//Redirect the user request depending of his actions
if(isset($_GET['action'])){
    $action = $_GET['action'];

    //Switch used to redirect different action
    switch ($action){
        /**== Action to display login ==**/
        case 'login':
            displayLogin();
            break;

        /**== Action for login ==**/
        case 'requestLogin':
            login($_POST['userMail'], $_POST['pwd']);
            break;

        /**== Action for log out of the web platform ==**/
        case 'logOut':
            logOut();
            break;

        /**== Action to display page for new consumable ==**/
        case 'newConsumable':
            displayNewConsumable();
            break;

        /**== Action to display the admin panel ==**/
        case 'adminPanel':
            displayAdminPanel();
            break;

        /**== Action to display page for creation of new user ==**/
        case 'newUser':
            displayNewUser();
            break;

        /**== Action to save modification that an admin make on admin panel ==**/
        case 'saveAdminModification':
            saveAdminModification($_POST);
            break;

        case 'requestNewConsumable':
            newConsumable($_POST);
            break;

        /**== Action to display home ==**/
        case 'home':
        default :
            displayHome();
            break;
    }
}
else{
    displayHome();
}
