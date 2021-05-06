<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : admin panel page
 **/

ob_start();

?>

<?php

$contenu = ob_get_clean();
require "template.php";

?>
