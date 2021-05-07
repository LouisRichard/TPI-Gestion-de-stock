<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : This controller file will contains all function related to users
 **/

require_once 'display.php';

/**
 * Function used to login user
 * @param $userMail - contain mail that the user send
 * @param $pwd - contain password that the user send
 */
function login($userMail, $pwd){
    if($userMail != '' && $pwd != ''){
        require_once 'model/usersManager.php';
        if(userConnection($userMail, $pwd) != false){
            createSession();

            displayHome();
        }
        else{
            $_SESSION['msg'] = 'loginError';
            displayLogin();
        }
    }
}

/**
 * Function used to add new user
 * @param $post - contain all information about the new user
 */
function newUser($post){

}

/**
 * Function used to disable user
 * @param $post - contain information about user that we need to disable
 */
function disableUser($post){

}

/**
 * Function used to delete user
 * @param $post - contain information about user that we need to delete
 */
function deleteUser($post){

}

/**
 * @param $post - contain all information that we need to save,
 * after that an admin modify status, on admin panel
 */
function saveAdminModification($post){

}