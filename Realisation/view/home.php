<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : homepage of the web platform
 **/

ob_start();

?>

<h1>BIENVENUE SUR LA PAGE D'ACCUEIL !!!</h1>

<?php
$content = ob_get_clean();
require "template.php";

?>