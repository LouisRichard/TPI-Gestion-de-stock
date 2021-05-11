<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : new user page
 **/

ob_start();
?>
<head>
    <script rel="javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script rel="javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
    <!-- Notifications -->
    <?php if (isset($_SESSION['msg'])) : ?>
        <div class="modal fade" id="messages" tabindex="-1" role="dialog"
             aria-labelledby="messages" aria-hidden="true">
            <div class="modal-dialog m-auto w-470-px" role="document" style="top: 45%;">
                <div class="modal-content w-100">
                    <div class="modal-body">
                        <div class="w-100">
                            <h6 class="float-left pt-2 text-center">
                                <?php if ($_SESSION['msg'] == "newUserSuccess") {
                                    echo 'Succès lors de l\'ajout du nouvel utilisateur : '.$_SESSION['newUsername'];
                                    echo '<button type="submit" class="btn btn-success float-right btn-close-phone" data-bs-dismiss="modal">Fermer</button>';
                                    unset($_SESSION['newUsername']);
                                } elseif ($_SESSION['msg'] == "newUserFailed") {
                                    echo 'Erreur inconnue, veuillez réessayer plus tard! Si le problème persiste, veuillez contacter le support!';
                                    echo '<button type="submit" class="btn btn-danger float-right btn-close-phone" data-bs-dismiss="modal">Fermer</button>';
                                } elseif ($_SESSION['msg'] == "newUserAlreadyExist"){
                                    echo "L'utilisateur existe déjà dans la base de données. Veuillez utiliser une autre adresse e-mail!";
                                    echo '<button type="submit" class="btn btn-danger float-right btn-close-phone" data-bs-dismiss="modal">Fermer</button>';
                                }?>
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

    <form action="?action=requestNewUser" method="post">
        <input name="firstname" type="text" maxlength="55" required placeholder="John">
        <input name="lastname" type="text" maxlength="60" required placeholder="Doe">
        <input name="email" type="email" maxlength="256" required placeholder="john.doe@gmail.com">
        <input name="pwd" type="password" maxlength="256" required placeholder="Mot de passe">
        <input name="admin" type="checkbox">
        <button type="submit" class="btn-primary">Ajouter le nouvel utilisateur</button>
    </form>


<?php
$content = ob_get_clean();
require "template.php";
?>
