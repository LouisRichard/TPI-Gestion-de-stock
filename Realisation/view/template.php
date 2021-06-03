<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : template of the web platform
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
            <title>Accueil</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
            <link href="view/style/styles.css" rel="stylesheet">
            <link href="view/style/circle.css" rel="stylesheet">
        </head>
        <body class="sb-nav-fixed">
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <a class="navbar-brand" href="?action=home">Gestionnaire de stock</a>
                <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0 text-white"></div>
                <!-- Navbar-->
                <ul class="navbar-nav ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                        <a href="?action=logOut" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-in-alt"></i></a>
                    </li>
                </ul>
            </nav>
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <div class="sb-sidenav-menu-heading">Utilisateurs</div>
                                <a class="nav-link" href="?action=home">
                                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                    Accueil
                                </a>
                                <?php if(isset($_SESSION['home']) && $_SESSION['home'] == 'home') : ?>
                                    <a class="nav-link ml-4" data-bs-toggle="modal" data-bs-target="#typeFilterModal">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-filter"></i>
                                        </div>Types de consommables
                                    </a>
                                    <a class="nav-link ml-4" data-bs-toggle="modal" data-bs-target="#brandFilterModal">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-filter"></i>
                                        </div>Marques
                                    </a>
                                    <a class="nav-link ml-4" data-bs-toggle="modal" data-bs-target="#linkedProductFilterModal">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-filter"></i>
                                        </div>Produits liés
                                    </a>
                                <?php unset($_SESSION['home']); endif; ?>
                                <a class="nav-link" href="?action=newConsumable">
                                    <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                                    Nouveau consommable
                                </a>
                                <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 1) : ?>
                                    <div class="sb-sidenav-menu-heading">Administrateurs</div>
                                    <a class="nav-link" href="?action=adminPanel">
                                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                        Panneau administrateur
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="sb-sidenav-footer">
                            <div class="small">Connecté en tant que :</div>
                            <?= $_SESSION['username']; ?>
                        </div>
                    </nav>
                </div>
                <div id="layoutSidenav_content">
                    <main class="m-3">
                        <?= $content; ?>
                    </main>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
            <script src="view/js/scripts.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        </body>
    </html>