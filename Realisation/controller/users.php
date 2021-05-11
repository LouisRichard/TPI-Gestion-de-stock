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
        $return = userConnection($userMail, $pwd);
        if($return != false){
            createSession($return[0]['email'], $return[0]['lastname'], $return[0]['firstname'], $return[0]['adminStatus']);

            $_SESSION['msg'] = 'loginSuccess';
            displayHome();
        }
        else{
            $_SESSION['msg'] = 'loginError';
            displayLogin();
        }
    }
}

/**
 * Function's used to create the session for a new connection of a user
 * @param $email - email of the user
 * @param $lastname - lastname of the user
 * @param $firstname - firstname of the user
 * @param $status - admin status to know if user is an user or an admin
 */
function createSession($email, $lastname, $firstname, $status){
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $lastname. " " .$firstname;
    $_SESSION['status'] = $status;
}

/**
 * Function used to signOut of the web platform
 */
function logOut()
{
    $_SESSION = array();
    session_destroy();

    displayLogin();
}

/**
 * Function used to add new user
 * @param $post - contain all information about the new user
 */
function newUser($post){
    $lastname = $post['lastname'];
    $firstname = $post['firstname'];
    $email = $post['email'];
    $pwd = $post['pwd'];
    $admin = 0;
    if(isset($post['admin'])){
        $admin = 1;
    }

    require_once 'model/usersManager.php';
    if(!userAlreadyExist($email)){
        if(addUser($lastname, $firstname, $email, $pwd, $admin)){
            $_SESSION['newUsername'] = $lastname . " " . $firstname;
            $_SESSION['msg'] = 'newUserSuccess';
        }
        else{
            $_SESSION['msg'] = 'newUserFailed';
        }
    }
    else{
        $_SESSION['msg'] = 'newUserAlreadyExist';
    }

    displayNewUser();
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