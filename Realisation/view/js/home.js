/**
 * Author : Michael Pedroletti
 * Creation : 20.05.2021
 * Description : contain functions used for the display of the home page
 **/

/**
 *
 * @param idConsumable
 * @param action
 */
function manageStock(idConsumable, action){
    let actualElement = document.getElementById(idConsumable).getElementsByTagName("span")[0];
    let stock = parseInt(actualElement.innerHTML, 10);
    if(action === "-"){
        if(stock === 0){
            msgModificationStock.innerHTML = "Seuil atteint nous ne pouvons descendre en dessous de 0 !";
            btnModificationStock.classList.add("btn-danger");
            modificationStock.show();
        }
        else{
            stock --;
        }
    }
    else{
        stock++;
    }

    actualElement.innerHTML = stock.toString();
    score();
}


function scoreOnLoad(){
    // Find all rating items
    const ratings = document.querySelectorAll(".rating");

    // Iterate over all rating items
    ratings.forEach((rating) => {
        // Get content and get score as an int
        const ratingContent = rating.innerHTML;
        const ratingScore = parseInt(ratingContent, 10);

        // Define if the score is good, meh or bad according to its value
        const scoreClass =
            ratingScore < 6 ? "bad" : ratingScore < 15 ? "meh" : "good";

        // Add score class to the rating
        rating.classList.add(scoreClass);

        // Wrap the content in a tag to show it above the pseudo element that masks the bar
        rating.innerHTML = `<span>${ratingScore}</span>`;
    });
}

function score(){
    // Find all rating items
    const ratings = document.querySelectorAll(".rating");

    // Iterate over all rating items
    ratings.forEach((rating) => {
        // Get the score contain in the span element and parse it to int
        const  ratingContent = rating.getElementsByTagName("span")[0].innerHTML;
        const ratingScore = parseInt(ratingContent, 10);

        // Define the score class
        const  scoreClass =
            ratingScore < 6 ? "bad" : ratingScore <15 ? "meh" : "good";

        // Remove the old class list
        if (rating.classList.contains("bad")){
            rating.classList.remove("bad");
        }
        else if (rating.classList.contains("meh")){
            rating.classList.remove("meh");
        }
        else {
            rating.classList.remove("good");
        }

        // Add the new class list
        rating.classList.add(scoreClass);
    });
}

function sendData(data) {
    var XHR = new XMLHttpRequest();
    var FD  = new FormData();

    // Put data in object FormData
    for(name in data) {
        FD.append(name, data[name]);
    }

    // Define text and call modal if the operation is a success
    XHR.addEventListener('load', function(event) {
        msgModificationStock.innerHTML = "La sauvegarde des données a été un succès !";
        btnModificationStock.classList.add("btn-success");
        modificationStock.show();
    });

    // Define text and call modal if the operation is a mess
    XHR.addEventListener('error', function(event) {
        msgModificationStock.innerHTML = "Une erreur inconnue est survenue ! Veuilez réessayer plus tard !";
        btnModificationStock.classList.add("btn-danger");
        modificationStock.show();
    });

    // Configure the request
    XHR.open('POST', 'https://tpi.pedroletti.ch/model/setStock.php');

    // Send object FormData
    XHR.send(FD);
}