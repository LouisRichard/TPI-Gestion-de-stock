<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : admin panel page
 **/

ob_start();
?>

<div class="m-3 border border-dark pl-3 pr-3">
    <div class="w-100 m-3 p-2">
        <button class="btn btn-success float-right">Ajouter un nouvel utilisateur</button>
    </div>

    <form action="?=saveAdminModification" method="post">
        <table class="table table-bordered table-striped table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user) : ?>
                    <tr class="text-center">
                        <td><?= $user['lastname'] ?></td>
                        <td><?= $user['firstname'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><input type="checkbox" class="form-check-input" <?php if($user['adminStatus']){ echo "checked"; } ?>></td>
                        <td><button class="btn <?php if($user['status']){ echo 'btn-warning">Désactiver'; }else{ echo 'btn-danger">Supprimer'; } ?></button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="w-100 m-3 p-2 text-center">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </div>
    </form>
</div>
<?php

$content = ob_get_clean();
require "template.php";

?>
