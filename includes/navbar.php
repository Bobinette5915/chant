

<nav class="navbar navbar-expand-lg navbar-light py-3">
                <div class="container rounded-4 px-5 bg-white">
                    <a class="navbar-brand" href="accueil.php"><span class="fw-bolder text-primary">Concours de Chant de LONGUENESSE</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                            <li class="nav-item"><a class="nav-link" href="accueil.php">Accueil</a></li>
                            <?php if (($_SESSION["ID-Utilisateur"]!==null) && ($_SESSION['admin'] !== 'ROLE_ADMIN')){
                                echo('<li class="nav-item"><a class="nav-link" href="inscription.php">Inscription</a></li>
                                <li class="nav-item"><a class="nav-link" href="dossier.php">Suivi de Dossier</a></li>');
                            }
                            ?>
                            <?php if (($_SESSION["ID-Utilisateur"]===null) ){
                                echo('<li class="nav-item"><a class="nav-link" href="connectUser.php">Connexion</a></li>');
                            }
                            ?>
                            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                            
                            <li class="nav-item"><a class="nav-link" href="Reglement.php">Reglement</a></li>
                            <?php if ($_SESSION["ID-Utilisateur"]!==null){
                                echo('<li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>');
                            }
                            if ($_SESSION['admin'] === 'ROLE_ADMIN'){
                                echo('<li class="nav-item"><a class="btn btn-primary  " href="administrateur.php"><strong>Administration</strong></a></li>');
                                
                            }
                            
                            ?>
                      
                        
                        </ul>
                    </div>
                </div>
            </nav>