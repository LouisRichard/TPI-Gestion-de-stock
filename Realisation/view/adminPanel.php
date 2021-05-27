<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : admin panel page
 **/

ob_start();
?>
<head>
    <script rel="javascript" src="view/js/adminPanel.js"></script>
</head>

<div class="m-3 border border-dark pl-3 pr-3">
    <div class="w-100 m-2 p-2">
        <a href="?action=newUser" class="btn btn-success float-right">Ajouter un nouvel utilisateur</a>
    </div>

    <form action="?=saveAdminModification" method="post" id="form">
        <table class="table table-bordered table-striped table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user) : ?>
                    <tr class="text-center">
                        <input type="hidden" hidden name="userID" id="userID" value="<?= $user['IDUsers']; ?>">
                        <td><?= $user['lastname']; ?></td>
                        <td><?= $user['firstname']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><input type="checkbox" name="adminStatus<?= $user['IDUsers']; ?>" id="adminStatus<?= $user['IDUsers']; ?>" class="form-check-input" <?php if($user['adminStatus']){ echo "checked"; } ?>></td>
                        <td>
                            <?php if($user['status']) : ?>
                                <a onclick="changeUserStatus('<?= $user['IDUsers']; ?>')" id="status<?= $user['IDUsers']; ?>" class="btn btn-warning">Désactiver</a>
                            <?php else : ?>
                                <a onclick="changeUserStatus('<?= $user['IDUsers']; ?>', true)" id="reaStatus<?= $user['IDUsers']; ?>" class="btn btn-primary">Réactiver</a>
                                <a onclick="changeUserStatus('<?= $user['IDUsers']; ?>')" id="status<?= $user['IDUsers']; ?>" class="btn btn-danger">Supprimer</a>
                            <?php endif; ?>
                        </td>
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
