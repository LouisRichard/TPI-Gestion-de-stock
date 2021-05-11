<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : new user page
 **/

ob_start();
?>

    <form action="?action=requestNewUser">
        <input name="firstname" type="text" maxlength="55" required placeholder="John">
        <input name="lastname" type="text" maxlength="60" required placeholder="Doe">
        <input name="email" type="email" maxlength="256" required placeholder="john.doe@gmail.com">
        <input name="pwd" type="password" maxlength="256" required placeholder="Mot de passe">
        <input name="admin" type="checkbox" required>
    </form>

<?php
$content = ob_get_clean();
require "template.php";
?>
