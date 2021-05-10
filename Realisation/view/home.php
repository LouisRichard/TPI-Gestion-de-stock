<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : homepage of the web platform
 **/

ob_start();

?>
    <h1>BIENVENUE SUR LA PAGE D'ACCUEIL !!!</h1>
    <div class="d-flex flex-wrap">
        <div class="d-flex align-items-stretch w-20 m-2 p-2 border border-dark">élément 1</div>
        <div class="d-flex align-items-stretch w-20 m-2 p-2 border border-dark">élément 2</div>
        <div class="d-flex align-items-stretch w-20 m-2 p-2 border border-dark">élément 3</div>
        <div class="d-flex align-items-stretch w-20 m-2 p-2 border border-dark">élément 4</div>
        <div class="d-flex align-items-stretch w-20 m-2 p-2 border border-dark">élément 5</div>
        <div class="d-flex align-items-stretch w-20 m-2 p-2 border border-dark">élément 6</div>
        <div class="d-flex align-items-stretch w-20 m-2 p-2 border border-dark">élément 7</div>
    </div>


<?php
$content = ob_get_clean();
require "template.php";

?>