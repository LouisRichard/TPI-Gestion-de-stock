/**
 * Author : Michael Pedroletti
 * Creation : 20.05.2021
 * Description : This file contain function used to filter elements on the home page
 **/


function filterElements(filterType, filter) {
    let cards = document.querySelectorAll(".card");
    console.log(filter);

    cards.forEach((card) => {

        // Filter for linked element
        if(filterType === "linkedElement") {
            let elements = card.querySelectorAll("[name=consumableLinkedElement]");
            let findElement = false;
            elements.forEach((linkedElement) => {
                if(linkedElement.innerHTML.includes(filter)) {
                    findElement = true;
                }
            });

            card.hidden = !findElement;
        }

        else if(filterType === "brand") {

        }
        else if(filterType === "type") {

        }
    });
}