<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : new consumable page
 **/

ob_start();
?>

<div class="m-3 border border-dark pl-3 pr-3">
    <h1 class="mt-3 text-center">Ajout de nouveaux consommables</h1>
    <div class="mt-3 border-top border-dark d-flex flex-wrap w-100">
        <div class="flex-column pt-5 pl-5 border-right border-dark w-50">
            test
        </div>
        <div class="flex-column p-5 w-50">
            test
        </div>
    </div>
    <div class="w-100 text-center">
        <button type="submit" class="btn btn-success w-25 p-2 m-3">Ajouter le nouveau consommable</button>
    </div>
</div>
<h1>Page en construction ! Veuillez revenir plus tard !</h1>
<?php
$content = ob_get_clean();
require "template.php";
?>