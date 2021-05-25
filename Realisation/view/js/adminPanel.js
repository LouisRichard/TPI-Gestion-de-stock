/**
 * Author : Pedroletti Michael
 * Contact : michael@pedroletti.ch
 * Creation date : 25.05.2021
 * Description : This file will contain all js function needed for the admin panel page
 */

/**
 * This function call php function to change a user status with all needed information.
 * @param idUser = id of the user that we need to modify
 */
function changeUserStatus(idUser){
    let adminStatusField = document.getElementById("status"+idUser);

    if(adminStatusField.innerHTML === "Désactiver"){
        //TODO appeler la fonction de désactivation de l'utilisateur de manière dynamique
    }
    else{
        //TODO appeler la fonction de suppression de l'utilisateur de manière dynamique
    }

    //TODO gérer par la suite les erreurs des différentes action effectuées
}

/**
 * This function will prepare needed information to make the easiest way possible to modify data in php for next step
 */
function prepareInformationForUsersStatusModification(){

}