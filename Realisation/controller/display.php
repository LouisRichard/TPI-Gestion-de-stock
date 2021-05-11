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
    if(isset($_SESSION['username']) && $_SESSION['username'] != ''){
        displayHome();
    }
    else{
        require 'view/login.php';
    }
}

/**
 * Function used to display homepage
 */
function displayHome(){
    if(isset($_SESSION['username']) && $_SESSION['username'] != ''){
        $_SESSION['home'] = 'home';
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
    if(isset($_SESSION['username']) && $_SESSION['username'] != ''){
        if($_SESSION['status'] == 1){
            $_SESSION['adminPanel'] = 'adminPanel';
            require 'view/adminPanel.php';
        }
        else{
            require 'view/home.php';
        }
    }
    else{
        require 'view/login.php';
    }
}

/**
 * Function that display the new user page
 */
function displayNewUser(){
    if(isset($_SESSION['username']) && $_SESSION['username'] != ''){
        if($_SESSION['status'] == 1){
            require 'view/newUser.php';
        }
        else{
            require 'view/home.php';
        }
    }
    else{
        require 'view/login.php';
    }
}

/**
 * Function to display page to add new consumable
 */
function displayNewConsumable(){
    if(isset($_SESSION['username']) && $_SESSION['username'] != ''){
        require 'view/newConsumable.php';
    }
    else{
        require 'view/login.php';
    }
}