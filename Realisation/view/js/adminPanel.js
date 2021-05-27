/**
 * Author : Pedroletti Michael
 * Contact : michael@pedroletti.ch
 * Creation date : 25.05.2021
 * Description : This file will contain all js function needed for the admin panel page
 */

/**
 * This function call php function to change a user status with all needed information.
 * @param idUser = id of the user that we need to modify
 * @param reactivation = if we need to reactive a user
 */
function changeUserStatus(idUser, reactivation = false){
    let adminStatusField = document.getElementById("status"+idUser);
    const XHR = new XMLHttpRequest();
    const FD = new FormData();

    // Load array with needed value
    if(reactivation === true){
        var data = {id:idUser, status:'reactivation'}
    }
    else if(adminStatusField.innerHTML === "Désactiver"){
        var data = {id:idUser, status:'suspend'};
    }
    else{
        var data = {id:idUser, status:'delete'};
    }

    // Put data in object FormData
    for(name in data) {
        FD.append(name, data[name]);
    }

    // Define text and call modal if the operation is a success
    XHR.addEventListener('load', function(event) {
        alert("La sauvegarde des données a été un succès !");
    });

    // Define text and call modal if the operation is a mess
    XHR.addEventListener('error', function(event) {
        alert("Une erreur inconnue est survenue ! Veuilez réessayer plus tard !");
    });

    // Configure the request
    XHR.open('POST', 'https://tpi.pedroletti.ch/model/changeUsersStatus.php');

    // Send object FormData
    XHR.send(FD);

    // Reload the page
    location.reload();
    //TODO We need to change this and just reload display not the page
}