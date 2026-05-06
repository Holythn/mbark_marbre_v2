<?php 
// Config and sessions are handled in the page that includes this header
?>
<!-- Fonts & Bootstrap -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,500;0,600;1,400&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
<link href="css/styles.css" rel="stylesheet" />

<!-- TOP BAR -->
<div class="top-bar py-2 text-white">
    <div class="container d-flex justify-content-end align-items-center">
        <span class="me-4" style="font-size: 0.65rem;">Contactez-nous : +1-800-555-0199</span>
        <span class="mx-2" style="font-size: 0.65rem;">|</span>
        <a href="order.php" class="btn-quote-top">Demander un devis</a>
    </div>
</div>

<!-- MAIN NAVIGATION -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top py-3">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <span class="d-block fw-bold branding-title">M’BARK</span>
            <span class="d-block sub-branding">MARBRE & GRANIT</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-center gap-2">
                <li class="nav-item"><a class="nav-link" href="index,php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="materials.php">Collections</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                
                <?php if(isset($_SESSION['userid'])): ?>
                    <li class="nav-item"><a class="nav-link" href="order.php">Projet</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Mon Compte</a></li>
                    <?php if($_SESSION['role'] == 'Admin'): ?>
                        <li class="nav-item"><a class="nav-link btn btn-warning btn-sm px-3 text-dark fw-bold" href="admin/dashboard.php">Admin</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="auth.php">Connexion</a></li>
                    <li class="nav-item"><a class="btn btn-luxury ms-lg-3" href="auth.php">S'inscrire</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
