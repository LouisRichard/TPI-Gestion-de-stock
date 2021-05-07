<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : login page
 **/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Gestionnaire de stock - TPI 2021" />
    <meta name="author" content="Pedroletti Michael" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="view/style/styles.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Connexion</h3></div>
                            <div class="card-body">
                                <form method="post" action="/?action=requestLogin">
                                    <div class="form-group">
                                        <label class="small mb-1" for="userMail">E-mail</label>
                                        <input class="form-control py-4" id="userMail" name="userMail" type="email" placeholder="Entrer votre adresse e-mail" />
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="pwd">Mot de passe</label>
                                        <input class="form-control py-4" id="pwd" name="pwd" type="password" placeholder="Entrer votre mot de passe" />
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary">Connexion</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="view/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

