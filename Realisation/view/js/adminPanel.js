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
    let success = false;
    let error = false;

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
        success = true;
    });

    // Define text and call modal if the operation is a mess
    XHR.addEventListener('error', function(event) {
        error = true;
    });

    // Configure the request
    XHR.open('POST', 'https://tpi.pedroletti.ch/model/changeUsersStatus.php');

    // Send object FormData
    XHR.send(FD);


    if(!success && error){
        msgNotificationModal.innerHTML = "Une erreur inconnue est survenue ! Veuillez réessayer !";
        btnNotificationModal.classList.add("btn-danger");
        notificationModal.show();
    }
    else{
        msgNotificationModal.innerHTML = "La modification du statut de l'utilisateur a été effectuée avec succès !";
        btnNotificationModal.classList.add("btn-success");
        notificationModal.show();
    }
}

/**
 * This function call a php page that permit to add a new user into the data base
 */
function createNewUser(){
    const XHR = new XMLHttpRequest();
    const FD = new FormData();
    let firstname = document.getElementById("firstname").value;
    let lastname = document.getElementById("lastname").value;
    let email = document.getElementById("email").value;
    let pwd = document.getElementById("pwd").value;
    let adminStatus = document.getElementById("admin").checked;
    var data = null;
    let success = false;

    if(firstname.trim() !== ""){
        if(lastname.trim() !== ""){
            if(email.trim() !== ""){
                if(pwd.trim() !== ""){
                    if(adminStatus){
                        data = {fName:firstname,lName:lastname,email:email,pwd:pwd,admin:1};
                    }
                    else{
                        data = {fName:firstname,lName:lastname,email:email,pwd:pwd,admin:0};
                    }

                    // Put data in object FormData
                    for(name in data) {
                        FD.append(name, data[name]);
                    }

                    // Define text and call modal if the operation is a success
                    XHR.addEventListener('load', function(event) {
                        success = true;
                    });

                    // Define text and call modal if the operation is a mess
                    XHR.addEventListener('error', function(event) {
                        success = "unknownIssue";
                    });

                    // Configure the request
                    XHR.open('POST', 'https://tpi.pedroletti.ch/model/addNewUser.php');

                    // Send object FormData
                    XHR.send(FD);

                    success = true;
                }
            }
        }
    }

    if(!success){
        msgNotificationModal.innerHTML = "Une erreur est survenue lors de la tentative d'ajout d'un nouvel utilisateur ! Un champ a été mal complété !";
        btnNotificationModal.classList.add("btn-danger");
        notificationModal.show();
    }
    else if(success === "unknownIssue"){
        msgNotificationModal.innerHTML = "Une erreur inconnue est survenue lors de la tentative d'ajout d'un nouvel utilisateur ! Veuillez réessayer !";
        btnNotificationModal.classList.add("btn-danger");
        notificationModal.show();
    }
    else{
        msgNotificationModal.innerHTML = "L'ajout du nouvel utilisateur \""+lastname+" "+firstname+"\" a été un succès !";
        btnNotificationModal.classList.add("btn-success");
        notificationModal.show();
    }
}