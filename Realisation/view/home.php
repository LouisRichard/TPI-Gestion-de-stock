<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : homepage of the web platform
 **/

ob_start();

?>
    <h1>Page d'accueil</h1>

    <div class="card-deck" style="flex-wrap: wrap; justify-content: space-evenly">
        <div class="card">
            <div class="card-header text-center" >
                <div class="d-flex flex-row" style="justify-content: center">
                    <div class="align-self-center"><i class="fas fa-plus"></i></div>
                    <div class="align-self-center ml-4"><div class="rating">57</div></div>
                    <div class="align-self-center ml-4"><i class="fas fa-minus"></i></div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Titre du consommable</h5>
                <p class="card-text">contenu type et éléments liés à mettre en place</p>
                <btn class="btn btn-primary">sauvegarder</btn>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-center" >
                <div class="d-flex flex-row" style="justify-content: center">
                    <div class="align-self-center"><i class="fas fa-plus"></i></div>
                    <div class="align-self-center ml-4"><div class="rating">78</div></div>
                    <div class="align-self-center ml-4"><i class="fas fa-minus"></i></div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Titre du consommable</h5>
                <p class="card-text">contenu type et éléments liés à mettre en place</p>
                <btn class="btn btn-primary">sauvegarder</btn>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-center" >
                <div class="d-flex flex-row" style="justify-content: center">
                    <div class="align-self-center"><i class="fas fa-plus"></i></div>
                    <div class="align-self-center ml-4"><div class="rating">34</div></div>
                    <div class="align-self-center ml-4"><i class="fas fa-minus"></i></div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Titre du consommable</h5>
                <p class="card-text">contenu type et éléments liés à mettre en place</p>
                <btn class="btn btn-primary">sauvegarder</btn>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-center" >
                <div class="d-flex flex-row" style="justify-content: center">
                    <div class="align-self-center"><i class="fas fa-plus"></i></div>
                    <div class="align-self-center ml-4"><div class="rating">3</div></div>
                    <div class="align-self-center ml-4"><i class="fas fa-minus"></i></div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Titre du consommable</h5>
                <p class="card-text">contenu type et éléments liés à mettre en place</p>
                <btn class="btn btn-primary">sauvegarder</btn>
            </div>
        </div>
    </div>

    <script>
        // Find al rating items
        const ratings = document.querySelectorAll(".rating");

        // Iterate over all rating items
        ratings.forEach((rating) => {
            // Get content and get score as an int
            const ratingContent = rating.innerHTML;
            const ratingScore = parseInt(ratingContent, 10);

            // Define if the score is good, meh or bad according to its value
            const scoreClass =
                ratingScore < 10 ? "bad" : ratingScore < 50 ? "meh" : "good";

            // Add score class to the rating
            rating.classList.add(scoreClass);

            // Wrap the content in a tag to show it above the pseudo element that masks the bar
            rating.innerHTML = `<span>${ratingScore}</span>`;
        });
    </script>

<?php
$content = ob_get_clean();
require "template.php";

?>