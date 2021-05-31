<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : admin panel page
 **/

ob_start();
?>
<head>
    <title>Panneau administrateur</title>
</head>

<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog"
     aria-labelledby="newUserModal" aria-hidden="true">
    <div class="modal-dialog modal-xl m-auto" role="document" style="top: 20%;">
        <div class="modal-content w-100">
            <div class="modal-body">
                <div class="w-100 mb-2">
                    <h6 class="text-center pt-2">
                        Ajout de nouvel utilisateur
                    </h6>
                </div>
                <div class="w-100 m-1 p-2">
                    <div class="d-flex flex-wrap border-top border-dark mt-2">
                        <div class="flex-column p-5 border-right border-dark w-50">
                            <label for="firstname" class="form-label">Prénom :</label>
                            <input class="form-control mb-2" id="firstname" name="firstname" type="text" maxlength="55" required placeholder="John">
                            <label for="lastname" class="form-label">Nom :</label>
                            <input class="form-control mb-2" id="lastname" name="lastname" type="text" maxlength="60" required placeholder="Doe">
                            <label for="email" class="form-label">E-mail :</label>
                            <input class="form-control mb-2" id="email" name="email" type="email" maxlength="256" required placeholder="john.doe@gmail.com">
                        </div>
                        <div class="flex-column p-5 w-50">
                            <label for="pwd" class="form-label">Mot de passe :</label>
                            <input class="form-control mb-2" id="pwd" name="pwd" type="password" maxlength="256" required placeholder="Mot de passe">

                            <input class="form-check-input ml-0" id="admin" name="admin" type="checkbox">
                            <label for="admin" class="form-check-label ml-4">Administrateur</label>
                        </div>
                    </div>
                    <div class="text-center w-100 mt-2">
                        <a onclick="createNewUser()" type="submit" class="btn btn-primary">Ajouter le nouvel utilisateur</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="m-3 border border-dark pl-3 pr-3">
    <div class="w-100 m-2 p-2">
        <a data-bs-toggle="modal" data-bs-target="#newUserModal" class="btn btn-success float-right">Ajouter un nouvel utilisateur</a>
    </div>

    <form action="?action=saveAdminModification" method="post" id="form">
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


<script rel="javascript" src="view/js/adminPanel.js"></script>
<?php

$content = ob_get_clean();
require "template.php";

?>
