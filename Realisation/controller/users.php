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
 * @param $post - contain all information that we need to save,
 * after that an admin modify status, on admin panel
 */
function saveAdminModification($post){
    require_once 'model/usersManager.php';
    $users = getUsersID();

    foreach($users as $user){
        if(isset($post['adminStatus'.$user['IDUsers']])){
            setStatusUserAdmin($user['IDUsers'], true);
        }
        else{
            setStatusUserAdmin($user['IDUsers']);
        }
    }

    displayAdminPanel();
}