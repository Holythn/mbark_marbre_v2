<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>M’bark Marbre | Accès Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container-fluid px-0 auth-wrapper">
        <div class="row g-0">
            
            <!-- LEFT SIDE: FULL SCREEN IMAGE -->
            <div class="col-lg-6 d-none d-lg-flex auth-bg align-items-center justify-content-center text-center text-white p-5">
                <div class="max-w-md">
                    <span class="d-block fw-bold tracking-widest display-4 playfair mb-2">M’BARK</span>
                    <span class="d-block tracking-widest small mb-4" style="letter-spacing: 5px !important;">MARBRE & GRANIT</span>
                    <div class="mx-auto my-4" style="width: 40px; height: 1px; background-color: var(--gold-accent);"></div>
                    <p class="fst-italic playfair text-light-muted px-4">Créer un espace client pour suivre vos projets sur mesure, demander vos devis en ligne et piloter vos commandes.</p>
                </div>
            </div>

            <!-- RIGHT SIDE: FORM -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center p-4 p-md-5">
                <div class="w-100" style="max-width: 450px;">
                    
                    <ul class="nav auth-nav mb-5 text-uppercase tracking-wider fw-medium fs-7" id="authTabs" role="tablist">
                        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#login-panel" type="button" role="tab">Se Connecter</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#register-panel" type="button" role="tab">S'Inscrire</button></li>
                    </ul>

                    <div class="tab-content" id="authTabsContent">
                        <!-- LOGIN -->
                        <div class="tab-pane fade show active" id="login-panel" role="tabpanel">
                            <form action="process_login.php" method="POST">
                                <div class="mb-4">
                                    <label class="form-label small text-uppercase text-muted mb-0">Adresse e-mail</label>
                                    <input type="email" name="email" class="form-control form-control-auth" placeholder="exemple@domaine.com" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label small text-uppercase text-muted mb-0">Mot de passe</label>
                                    <input type="password" name="password" class="form-control form-control-auth" placeholder="••••••••" required>
                                </div>
                                <button type="submit" class="btn btn-luxury w-100 py-3 text-uppercase">Connexion</button>
                            </form>
                        </div>

                        <!-- REGISTER -->
                        <div class="tab-pane fade" id="register-panel" role="tabpanel">
                            <form action="process_register.php" method="POST">
                                <div class="mb-4">
                                    <label class="form-label small text-uppercase text-muted mb-0">Nom complet</label>
                                    <input type="text" name="fullname" class="form-control form-control-auth" placeholder="Nom et Prénom" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label small text-uppercase text-muted mb-0">Adresse e-mail</label>
                                    <input type="email" name="email" class="form-control form-control-auth" placeholder="email@domaine.com" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label small text-uppercase text-muted mb-0">Mot de passe</label>
                                    <input type="password" name="password" class="form-control form-control-auth" placeholder="Mot de passe" required>
                                </div>
                                <button type="submit" class="btn btn-luxury w-100 py-3 text-uppercase">S'inscrire</button>
                            </form>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <a href="index.php" class="text-muted text-decoration-none small"><i class="bi bi-arrow-left me-2"></i>Retour au site</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
