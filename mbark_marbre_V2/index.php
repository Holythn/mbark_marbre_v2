<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M’bark Marbre | Signature Minérale de Prestige</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <!-- HERO SECTION -->
    <header class="hero-section">
        <div class="container">
            <div class="hero-card">
                <h6 class="text-gold tracking-widest text-uppercase fw-semibold mb-3 fs-7">M’BARK MARBRE & GRANIT | EST. 2026</h6>
                <p class="text-muted fst-italic playfair mb-2">L'élégance sculptée dans la pierre</p>
                <h1 class="display-4 playfair mb-4" style="color: #111;">Un Marbre & Granit d'Exception pour des Espaces Extraordinaires.</h1>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <a href="materials.php" class="btn btn-luxury">Explore the Collection</a>
                    <a href="order.php" class="btn btn-outline-dark rounded-0 px-4 py-2 text-uppercase fs-7">Request Quote</a>
                </div>
            </div>
        </div>
    </header>

    <!-- COLLECTION SECTION -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="playfair text-uppercase tracking-widest" style="font-size: 2.2rem;">Nos Collections Vedettes</h2>
                <div style="width: 60px; height: 2px; background: var(--gold-accent); margin: 20px auto;"></div>
            </div>
            <div class="row g-4">
                <?php
                $mats = mysqli_query($conn, "SELECT * FROM material_library ORDER BY RAND() LIMIT 3");
                while($stone = mysqli_fetch_assoc($mats)) {
                ?>
                <div class="col-md-4">
                    <div class="luxury-card shadow-sm">
                        <img src="images/<?php echo $stone['image_url']; ?>" class="luxury-img" alt="...">
                        <div class="p-4 text-center">
                            <h5 class="playfair fw-bold"><?php echo $stone['name']; ?></h5>
                            <p class="text-muted small text-uppercase tracking-wider"><?php echo $stone['type']; ?></p>
                            <a href="materials.php" class="text-gold text-decoration-none fw-bold text-uppercase fs-7 border-bottom border-1">En savoir plus</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- MASTERPIECES SECTION -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="playfair text-uppercase tracking-widest" style="font-size: 2.2rem;">Galerie de Projets</h2>
                <div style="width: 60px; height: 2px; background: var(--gold-accent); margin: 20px auto;"></div>
            </div>
            <div class="row g-3">
                <?php
                $projects = mysqli_query($conn, "SELECT orders.*, users.fullname, material_library.name as mname, project_types.typename 
                                              FROM orders 
                                              JOIN users ON users.userid = orders.userid 
                                              JOIN material_library ON orders.materialid = material_library.materialid 
                                              JOIN project_types ON orders.projecttypeid = project_types.projecttypeid 
                                              WHERE orders.status = 'Completed' AND orders.featured = 1 
                                              LIMIT 8");
                if(mysqli_num_rows($projects) > 0) {
                    $count = 1;
                    while($proj = mysqli_/fetch_assoc($projects)) {
                        $img = (!empty($proj['project_image'])) ? $proj['project_image'] : mysqli_fetch_assoc(mysqli_query($conn, "SELECT image_url FROM material_library WHERE materialid={$proj['materialid']}"))['image_url'];
                ?>
                <div class="col-6 col-md-3">
                    <div class="gallery-card">
                        <img src="images/<?php echo $img; ?>" alt="Project">
                        <div class="gallery-label"><?php echo $proj['typename']; ?></div>
                    </div>
                </div>
                <?php } 
                } else { echo "<p class='text-center text-muted'>Nos projets sont en cours de mise à jour.</p>"; } ?>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-5 text-center">
        <div class="container">
            <div class="branding-title mb-3" style="color: #c49a6c;">M’BARK</div>
            <p class="text-muted small">Est. 2026 | Signature Minérale de Prestige</p>
            <div class="d-flex justify-content-center gap-3 mb-4">
                <a href="contact.php" class="text-white-50 text-decoration-none small">Contact</a>
                <a href="materials.php" class="text-white-50 text-decoration-none small">Collections</a>
                <a href="profile.php" class="text-white-50 text-decoration-none small">Mon Compte</a>
            </div>
            <div class="fs-8 text-muted">&copy; 2026 M'Bark Marbre. Tous droits réservés.</div>
        </div>
    </footer >
</body>
</html>
