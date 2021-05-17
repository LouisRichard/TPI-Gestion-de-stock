<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : homepage of the web platform
 **/

ob_start();

?>
    <head>
        <script rel="javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script rel="javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <!-- Modal notification -->
    <?php if (isset($_SESSION['msg'])) : ?>
    <div class="modal fade" id="messages" tabindex="-1" role="dialog"
         aria-labelledby="messages" aria-hidden="true">
        <div class="modal-dialog m-auto w-470-px" role="document" style="top: 45%;">
            <div class="modal-content w-100">
                <div class="modal-body">
                    <div class="w-100">
                        <h6 class="text-center pt-2">
                            <?php if ($_SESSION['msg'] == "loginSuccess") {
                                echo '<p>Succès de la connexion !</p>';
                                echo '<button type="submit" class="btn btn-success float-right btn-close-phone" data-bs-dismiss="modal">Fermer</button>';
                            } ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var messages = new bootstrap.Modal(document.getElementById('messages'), {
            keyboard: false
        })
        messages.show();
    </script>
    <?php unset($_SESSION['msg']); endif; ?>

    <!-- FILTER MODAL -->
    <div class="modal fade" id="typeFilterModal" tabindex="-1" role="dialog"
         aria-labelledby="typeFilterModal" aria-hidden="true">
        <div class="modal-dialog modal-xl m-auto" role="document" style="top: 45%;">
            <div class="modal-content w-100">
                <div class="modal-body">
                    <div class="w-100 mb-2">
                        <h6 class="text-center pt-2">
                            Filtres par type de consommable
                        </h6>
                    </div>
                    <div class="w-100 d-flex flex-wrap">
                        <div class="w-50 p-2 flex-column">
                            <button class="btn btn-primary w-100 mb-3">Cartouche d'encre</button>
                            <button class="btn btn-primary w-100 mb-3">Waste toner</button>
                        </div>
                        <div class="w-50 p-2 flex-column">
                            <button class="btn btn-primary w-100 mb-3">Papier</button>
                            <button class="btn btn-primary w-100 mb-3">Drum</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="brandFilterModal" tabindex="-1" role="dialog"
         aria-labelledby="brandFilterModal" aria-hidden="true">
        <div class="modal-dialog modal-xl m-auto" role="document" style="top: 45%;">
            <div class="modal-content w-100">
                <div class="modal-body">
                    <div class="w-100 mb-2">
                        <h6 class="text-center pt-2">
                            Filtres par marque de consommable
                        </h6>
                    </div>
                    <div class="w-100 d-flex flex-wrap">
                        <div class="w-50 p-2 flex-column">
                            <button class="btn btn-primary w-100 mb-3">Brother</button>
                            <button class="btn btn-primary w-100 mb-3">HP</button>
                        </div>
                        <div class="w-50 p-2 flex-column">
                            <button class="btn btn-primary w-100 mb-3">Canon</button>
                            <button class="btn btn-primary w-100 mb-3">Xerox</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="linkedProductFilterModal" tabindex="-1" role="dialog"
         aria-labelledby="linkedProductFilterModal" aria-hidden="true">
        <div class="modal-dialog modal-xl m-auto" role="document" style="top: 45%;">
            <div class="modal-content w-100">
                <div class="modal-body">
                    <div class="w-100 mb-2">
                        <h6 class="text-center pt-2">
                            Filtres par produit lié aux consommables
                        </h6>
                    </div>
                    <div class="w-100 d-flex flex-wrap">
                        <div class="w-50 p-2 flex-column">
                            <button class="btn btn-primary w-100 mb-3">Brother XC-500</button>
                            <button class="btn btn-primary w-100 mb-3">HP Printer 5000</button>
                        </div>
                        <div class="w-50 p-2 flex-column">
                            <button class="btn btn-primary w-100 mb-3">Canon R-300</button>
                            <button class="btn btn-primary w-100 mb-3">Xerox y-4</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <h1 class="mb-1">Attentions quantités faibles</h1>
    <div class="card-deck mb-3" id="lowQuantityConsumable" style="flex-wrap: wrap; justify-content: space-evenly">
        <div class="card">
            <div class="card-header text-center" >
                <div class="d-flex flex-row" style="justify-content: center">
                    <div class="align-self-center"><i class="fas fa-plus"></i></div>
                    <div class="align-self-center ml-4"><div class="rating">4</div></div>
                    <div class="align-self-center ml-4"><i class="fas fa-minus"></i></div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Cartouche d'encre Y RW-100</h5>
                <p class="card-text">
                <p class="p-2">Type : cartouche d'encre</p>
                <div class="d-flex flex-wrap">
                    <div class="w-50 p-2 flex-column">
                        <p>Elément lié :</p>
                    </div>
                    <div class="w-50 p-2 flex-column">
                        <div class="text-center">Brother XC-500</div>
                    </div>
                </div>
                </p>
                <div class="text-center">
                    <btn class="btn btn-primary">sauvegarder</btn>
                </div>
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
                <h5 class="card-title">Cartouche d'encre C RW-100</h5>
                <p class="card-text">
                <p class="p-2">Type : cartouche d'encre</p>
                <div class="d-flex flex-wrap">
                    <div class="w-50 p-2 flex-column">
                        <p>Elément lié :</p>
                    </div>
                    <div class="w-50 p-2 flex-column">
                        <div class="text-center">Brother XC-500</div>
                    </div>
                </div>
                </p>
                <div class="text-center">
                    <btn class="btn btn-primary">sauvegarder</btn>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-center" >
                <div class="d-flex flex-row" style="justify-content: center">
                    <div class="align-self-center"><i class="fas fa-plus"></i></div>
                    <div class="align-self-center ml-4"><div class="rating">1</div></div>
                    <div class="align-self-center ml-4"><i class="fas fa-minus"></i></div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Cartouche d'encre M RW-100</h5>
                <p class="card-text">
                <p class="p-2">Type : cartouche d'encre</p>
                <div class="d-flex flex-wrap">
                    <div class="w-50 p-2 flex-column">
                        <p>Elément lié :</p>
                    </div>
                    <div class="w-50 p-2 flex-column">
                        <div class="text-center">Brother XC-500</div>
                    </div>
                </div>
                </p>
                <div class="text-center">
                    <btn class="btn btn-primary">sauvegarder</btn>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-center" >
                <div class="d-flex flex-row" style="justify-content: center">
                    <div class="align-self-center"><i class="fas fa-plus"></i></div>
                    <div class="align-self-center ml-4"><div class="rating">5</div></div>
                    <div class="align-self-center ml-4"><i class="fas fa-minus"></i></div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Cartouche d'encre B RW-100</h5>
                <p class="card-text">
                <p class="p-2">Type : cartouche d'encre</p>
                <div class="d-flex flex-wrap">
                    <div class="w-50 p-2 flex-column">
                        <p>Eléments liés :</p>
                    </div>
                    <div class="w-50 p-2 flex-column">
                        <div class="text-center">Brother XC-500</div>
                        <div class="text-center">Brother XC-500</div>
                    </div>
                </div>
                </p>
                <div class="text-center">
                    <btn class="btn btn-primary">sauvegarder</btn>
                </div>
            </div>
        </div>
    </div>

    <h1 class="mb-1">Consommables</h1>
    <div class="card-deck" id="consumable" style="flex-wrap: wrap; justify-content: space-evenly">
        <div class="card">
            <div class="card-header text-center" >
                <div class="d-flex flex-row" style="justify-content: center">
                    <div class="align-self-center"><i class="fas fa-plus"></i></div>
                    <div class="align-self-center ml-4"><div class="rating">13</div></div>
                    <div class="align-self-center ml-4"><i class="fas fa-minus"></i></div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Cartouche d'encre Y RW-400</h5>
                <p class="card-text">
                    <p class="p-2">Type : cartouche d'encre</p>
                    <div class="d-flex flex-wrap">
                        <div class="w-50 p-2 flex-column">
                            <p>Elément lié :</p>
                        </div>
                        <div class="w-50 p-2 flex-column">
                            <div class="text-center">Brother XC-500</div>
                        </div>
                    </div>
                </p>
                <div class="text-center">
                    <btn class="btn btn-primary">sauvegarder</btn>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-center" >
                <div class="d-flex flex-row" style="justify-content: center">
                    <div class="align-self-center"><i class="fas fa-plus"></i></div>
                    <div class="align-self-center ml-4"><div class="rating">36</div></div>
                    <div class="align-self-center ml-4"><i class="fas fa-minus"></i></div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Cartouche d'encre M RW-400</h5>
                <p class="card-text">
                <p class="p-2">Type : cartouche d'encre</p>
                <div class="d-flex flex-wrap">
                    <div class="w-50 p-2 flex-column">
                        <p>Elément lié :</p>
                    </div>
                    <div class="w-50 p-2 flex-column">
                        <div class="text-center">Brother XC-500</div>
                    </div>
                </div>
                </p>
                <div class="text-center">
                    <btn class="btn btn-primary">sauvegarder</btn>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-center" >
                <div class="d-flex flex-row" style="justify-content: center">
                    <div class="align-self-center"><i class="fas fa-plus"></i></div>
                    <div class="align-self-center ml-4"><div class="rating">15</div></div>
                    <div class="align-self-center ml-4"><i class="fas fa-minus"></i></div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Cartouche d'encre C RW-400</h5>
                <p class="card-text">
                <p class="p-2">Type : cartouche d'encre</p>
                <div class="d-flex flex-wrap">
                    <div class="w-50 p-2 flex-column">
                        <p>Elément lié :</p>
                    </div>
                    <div class="w-50 p-2 flex-column">
                        <div class="text-center">Brother XC-500</div>
                    </div>
                </div>
                </p>
                <div class="text-center">
                    <btn class="btn btn-primary">sauvegarder</btn>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-center" >
                <div class="d-flex flex-row" style="justify-content: center">
                    <div class="align-self-center"><i class="fas fa-plus"></i></div>
                    <div class="align-self-center ml-4"><div class="rating">9</div></div>
                    <div class="align-self-center ml-4"><i class="fas fa-minus"></i></div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Cartouche d'encre B RW-400</h5>
                <p class="card-text">
                <p class="p-2">Type : cartouche d'encre</p>
                <div class="d-flex flex-wrap">
                    <div class="w-50 p-2 flex-column">
                        <p>Elément lié :</p>
                    </div>
                    <div class="w-50 p-2 flex-column">
                        <div class="text-center">Brother XC-500</div>
                    </div>
                </div>
                </p>
                <div class="text-center">
                    <btn class="btn btn-primary">sauvegarder</btn>
                </div>
            </div>
        </div>
    </div>

    <script>
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
    </script>

<?php
$content = ob_get_clean();
require "template.php";

?>