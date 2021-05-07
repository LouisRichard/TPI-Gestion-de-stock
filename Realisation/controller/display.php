<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : This controller file will contains all function that i need to display pages
 **/

/**
 * Function used to display login page
 */
function displayLogin(){
    require 'view/login.php';
}

/**
 * Function used to display homepage
 */
function displayHome(){
    if(isset($_SESSION['username']) && $_SESSION['username'] != ''){
        require 'view/home.php';
    }
    else{
        require 'view/login.php';
    }
}

/**
 * Function used to display the admin panel
 */
function displayAdminPanel(){

}

/**
 * Function that display the new user page
 */
function displayNewUser(){

}

/**
 * Function to display page to add new consumable
 */
function displayNewConsumable(){

}