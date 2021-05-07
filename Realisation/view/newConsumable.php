<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : new consumable page
 **/

ob_start();

?>

<?php
$content = ob_get_clean();
require "template.php";

?>