<?php
session_start();
$title = "Formulaire d'inscription";
include("includes/head.php");
include("includes/connexionBDD.php");
$to = "flavien.grammont@gmail.com"
?>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php
include("includes/navbar.php");
?>
                
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Formulaire de contact</h1>
                            <p class="lead fw-normal text-muted mb-0">A la moindre question...!</p>
                            
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                            
                                <form method="POST" action="https://api.web3forms.com/submit">
                                    <input type="hidden" name="access_key" value="2be4286a-fa42-4a91-b635-2e423a39b922">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" name="name" type="text" placeholder="Nom" required />
                                        <label for="name">Nom</label>
                                        
                                    </div>
                                
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" type="email" name="email" placeholder="Adresse Mail" required />
                                        <label for="email">Adresse Mail</label>
                                        
                                        
                                    </div>
                    
                                    <!-- Message input-->
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="message" type="text" name="message" placeholder="Ecrivez votre message ici." style="height: 10rem"  required></textarea>
                                        <label for="message">Message</label>
                                        
                                    </div>
                                    <input type="hidden" name="redirect" value="http://178.33.104.51/html/TP_Chant/valide.php">
                                    <!-- Submit Button-->
                                    <button class="btn btn-primary btn-lg " id="submitButton" type="submit" required>Envoyer</button>
                                
                                
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <?php include("includes/footer.php"); ?>
    </body>
</html>
