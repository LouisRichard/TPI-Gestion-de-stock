<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : new consumable page
 **/

ob_start();
?>
<head>
    <title>Nouveau consommable</title>
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
                                <?php if ($_SESSION['msg'] == "missingValueNewConsumable") {
                                    echo '<p>Vous avez oublié d\'entrer un nom valide et/ou oublier de sélectionner un produit lié!</p>';
                                    echo '<button type="submit" class="btn btn-danger float-right btn-close-phone" data-bs-dismiss="modal">Fermer</button>';
                                }
                                ?>
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

<div class="m-3 border border-dark pl-3 pr-3">
    <form method="post" action="?action=requestNewConsumable">
        <h1 class="mt-3 text-center">Nouveau consommable</h1>
        <div class="mt-3 border-top border-dark d-flex flex-wrap w-100">
            <div class="flex-column p-5 border-right border-dark w-50">
                <div class="mb-3 w-100">
                    <label for="consumableName" class="form-label">Nom du consommable :</label>
                    <input type="text" class="form-control" name="consumableName" id="consumableName" aria-describedby="consumableNameHelp" placeholder="TNP49-Y">
                    <div id="consumableNameHelp" class="form-text">Entrez le nom du nouveau consommable.</div>
                </div>
                <div class="mb-3 w-100">
                    <label for="consumableQuantity" class="form-label">Quantité de base :</label>
                    <input type="number" class="form-control" name="consumableQuantity" id="consumableQuantity" aria-describedby="consumableQuantityHelp" value="1" min="0" max="100">
                    <div id="consumableQuantityHelp" class="form-text">Indiquez la quantité de base du consommable.</div>
                </div>
                <div class="mb-3 w-100">
                    <label for="consumableType" class="form-label">Type du consommable :</label>
                    <select class="form-select mb-3" id="consumableType" name="consumableType" aria-label="consumableType">
                        <?php if(isset($consumableTypes)) : foreach($consumableTypes as $type) : ?>
                            <option value="<?= $type['IDConsumableTypes']; ?>"><?= $type['name']; ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                </div>
            </div>
            <div class="flex-column p-5 w-50">
                <div class="mb-3 w-100">
                    <label for="consumableBrand" class="form-label">Marque du consommable :</label>
                    <select class="form-select mb-3" id="consumableBrand" name="consumableBrand" aria-label="consumableBrand">
                        <?php if(isset($brands)) : foreach($brands as $brand) : ?>
                            <option value="<?= $brand['IDBrands']; ?>"><?= $brand['name']; ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="mb-2 w-100">
                    <label class="form-label">Produit(s) lié(s) :</label>
                </div>
                <?php if(isset($products)) : foreach($products as $product) :?>
                    <div class="pl-4 w-100">
                        <input class="form-check-input" type="checkbox" id="consumableLinkedElement<?= $product['IDProducts']; ?>" name="consumableLinkedElement<?= $product['IDProducts']; ?>">
                        <label class="form-check-label" for="consumableLinkedElement<?= $product['IDProducts']; ?>">
                            <?= $product['name']; ?>
                        </label>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
        <div class="w-100 text-center">
            <button type="submit" class="btn btn-success w-25 p-2 m-3">Ajouter le nouveau consommable</button>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require "template.php";
?>