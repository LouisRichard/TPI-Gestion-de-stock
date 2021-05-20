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
        <script rel="javascript" src="view/js/home.js"></script>
        <script rel="javascript" src="view/js/filter.js"></script>
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
                            <?php $i=0; foreach ($types as $type) : if($i%2 != 1) : ?>
                                <button class="btn btn-primary w-100 mb-3" onclick="filterElements('type', '<?= $type['name']; ?>')"><?= $type['name']; ?></button>
                            <?php endif; $i++; endforeach; ?>
                        </div>
                        <div class="w-50 p-2 flex-column">
                            <?php $i=0; foreach ($types as $type) :  if($i%2 == 1) : ?>
                            <button class="btn btn-primary w-100 mb-3" onclick="filterElements('type', '<?= $type['name']; ?>')"><?= $type['name']; ?></button>
                            <?php endif; $i++; endforeach; ?>
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
                            <?php $i=0; foreach ($brands as $brand) : if($i%2 != 1) : ?>
                                <button class="btn btn-primary w-100 mb-3" onclick="filterElements('brand', '<?= $brand['name']; ?>')"><?= $brand['name']; ?></button>
                            <?php endif; $i++; endforeach; ?>
                        </div>
                        <div class="w-50 p-2 flex-column">
                            <?php $i=0; foreach ($brands as $brand) :  if($i%2 == 1) : ?>
                                <button class="btn btn-primary w-100 mb-3" onclick="filterElements('brand', '<?= $brand['name']; ?>')"><?= $brand['name']; ?></button>
                            <?php endif; $i++; endforeach; ?>
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
                            <?php $i=0; foreach ($productsInformation as $product) : if($i%2 != 1) : ?>
                                <button class="btn btn-primary w-100 mb-3" onclick="filterElements('linkedElement', '<?= $product['type']." ".$product['brand']." ".$product['name']; ?>')"><?= $product['type']." ".$product['brand']." ".$product['name']; ?></button>
                            <?php endif; $i++; endforeach; ?>
                        </div>
                        <div class="w-50 p-2 flex-column">
                            <?php $i=0; foreach ($productsInformation as $product) :  if($i%2 == 1) : ?>
                                <button class="btn btn-primary w-100 mb-3" onclick="filterElements('linkedElement', '<?= $product['type']." ".$product['brand']." ".$product['name']; ?>')"><?= $product['type']." ".$product['brand']." ".$product['name']; ?></button>
                            <?php endif; $i++; endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php if($dangerConsumables != null) : ?>
        <h1 class="mb-1">Attention quantités faibles</h1>
        <div class="card-deck mb-3" id="lowQuantityConsumable" style="flex-wrap: wrap; justify-content: space-evenly">
            <?php foreach($dangerConsumables as $consumable) : ?>
                <div class="card">
                    <div class="card-header text-center" >
                        <div class="d-flex flex-row" style="justify-content: center">
                            <div class="align-self-center"><i class="fas fa-plus" type="button" onclick="manageStock('<?= $consumable['IDConsumables']; ?>', '+')"></i></div>
                            <div class="align-self-center ml-4"><div class="rating" id="<?= $consumable['IDConsumables']; ?>"><?= $consumable['stock']; ?></div></div>
                            <div class="align-self-center ml-4"><i class="fas fa-minus" type="button" onclick="manageStock('<?= $consumable['IDConsumables']; ?>', '-')"></i></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" name="consumableBrand"><?= $consumable['brand']." ".$consumable['name']; ?></h5>
                        <p class="card-text">
                        <p class="p-2" name="consumableType">Type : <?= $consumable['type']; ?> </p>
                        <div class="d-flex flex-wrap">
                            <div class="w-50 p-2 flex-column">
                                <p>Elément lié :</p>
                            </div>
                            <div class="w-50 p-2 flex-column">
                                <?php foreach($consumable['products'] as $product) : ?>
                                    <div class="text-left" name="consumableLinkedElement"><?= $product['productType']." ".$product['productBrands']." ".$product['productName'] ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        </p>
                        <div class="text-center">
                            <btn class="btn btn-primary">Sauvegarder</btn>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <h1 class="mb-1">Consommables</h1>
    <div class="card-deck" id="consumable" style="flex-wrap: wrap; justify-content: space-evenly">
        <?php foreach($consumables as $consumable) : ?>
            <div class="card">
                <div class="card-header text-center" >
                    <div class="d-flex flex-row" style="justify-content: center">
                        <div class="align-self-center"><i class="fas fa-plus" type="button" onclick="manageStock('<?= $consumable['IDConsumables']; ?>', '+')"></i></div>
                        <div class="align-self-center ml-4"><div class="rating" id="<?= $consumable['IDConsumables']; ?>"><?= $consumable['stock']; ?></div></div>
                        <div class="align-self-center ml-4"><i class="fas fa-minus" type="button" onclick="manageStock('<?= $consumable['IDConsumables']; ?>', '-')"></i></div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title" name="consumableBrand"><?= $consumable['brand']." ".$consumable['name']; ?></h5>
                    <p class="card-text">
                    <p class="p-2" name="consumableType">Type : <?= $consumable['type']; ?> </p>
                    <div class="d-flex flex-wrap">
                        <div class="w-50 p-2 flex-column">
                            <?php if(count($consumable['products']) > 1) :?>
                                <p>Eléments liés :</p>
                            <?php else : ?>
                                <p>Elément lié :</p>
                            <?php endif; ?>
                        </div>
                        <div class="w-50 p-2 flex-column">
                            <?php foreach($consumable['products'] as $product) : ?>
                                <div class="text-left" name="consumableLinkedElement"><?= $product['productType']." ".$product['productBrands']." ".$product['productName'] ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    </p>
                    <div class="text-center">
                        <btn class="btn btn-primary">Sauvegarder</btn>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        window.onload = scoreOnLoad;
    </script>

<?php
$content = ob_get_clean();
require "template.php";

?>