<?php 
include 'config.php'; 
if(!isset($_SESSION['userid'])) { header("Location: login.php"); }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Project Builder | M'Bark Marbre</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container" style="margin-top: 150px; margin-bottom: 80px;">
        <div class="text-center mb-5">
            <h1 class="playfair display-4">Project Builder</h1>
            <p class="text-muted">Design your luxury space. Combine multiple materials and installations in one single request.</p>
        </div>

        <div class="row g-4">
            <!-- LEFT COLUMN: THE SELECTOR -->
            <div class="col-lg-5">
                <div class="card shadow-sm border-0 p-4" style="border-radius: 20px; background: white;">
                    <h4 class="playfair mb-4 text-gold">1. Add a Component</h4>
                    <div class="mb-3">
                        <label class="small fw-bold text-uppercase tracking-wider">Choose Mineral</label>
                        <select id="mat_select" class="form-select shadow-sm">
                            <?php
                            $res = mysqli_query($conn, "SELECT * FROM material_library");
                            while($row = mysqli_fetch_assoc($res)) {
                                echo "<option value='{$row['name']}'>{$row['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="small fw-bold text-uppercase tracking-wider">Choose Installation</label>
                        <select id="proj_select" class="form-select shadow-sm">
                            <?php
                            $res = mysqli_query($conn, "SELECT * FROM project_types");
                            while($row = mysqli_fetch_assoc($res)) {
                                echo "<option value='{$row['typename']}'>{$row['typename']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button onclick="addItem()" class="btn btn-luxury w-100">Add to Project Bundle</button>
                </div>
            </div>

            <!-- RIGHT COLUMN: THE BUNDLE -->
            <div class="col-lg-7">
                <div class="card shadow-sm border-0 p-4" style="border-radius: 20px; background: white; min-height: 400px;">
                    <h4 class="playfair mb-4">2. Your Project Bundle</h4>
                    <form action="process_bundle.php" method="POST" id="bundleForm">
                        <div id="items_container">
                            <!-- Dynamic items will be injected here by JS -->
                            <div class="text-center py-5 text-muted" id="empty_msg">
                                <i class="bi bi-cart-x fs-1 d-block mb-2"></i>
                                Your bundle is empty. Start adding components!
                            </div>
                        </div>
                        
                        <div id="submit_section" class="d-none mt-4 pt-3 border-top text-end">
                            <button type="submit" class="btn btn-luxury btn-xl">Submit Bundle for Quote</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addItem() {
            const mat = document.getElementById('mat_select').value;
            const proj = document.getElementById('proj_select').value;
            const container = document.getElementById('items_container');
            const emptyMsg = document.getElementById('empty_msg');
            const submitSec = document.getElementById('submit_section');

            if(emptyMsg) emptyMsg.remove();
            submitSec.classList.remove('d-none');

            const div = document.createElement('div');
            div.className = 'p-3 mb-3 rounded shadow-sm';
            div.style.backgroundColor = '#fcfaf5';
            div.style.borderLeft = '4px solid #c49a6c';
            div.style.position = 'relative';
            
            div.innerHTML = `
                <span class="position-absolute top-0 end-0 pe-3 pt-2 text-danger" style="cursor:pointer" onclick="this.parentElement.remove(); checkEmpty();">
                    <i class="bi bi-x-lg"></i>
                </span>
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="fw-bold text-uppercase small">${proj}</div>
                        <div class="text-muted small">${mat}</div>
                        <input type="hidden" name="materials[]" value="${mat}">
                        <input type="hidden" name="projects[]" value="${proj}">
                    </div>
                    <div class="col-md-7">
                        <label class="small fw-bold text-uppercase" style="font-size: 0.6rem;">Dimensions / Notes</label>
                        <textarea name="dims[]" class="form-control form-control-sm" placeholder="e.g. 12 steps, 1m wide" required></textarea>
                    </div>
                </div>
            `;
            container.appendChild(div);
        }

        function checkEmpty() {
            const container = document.getElementById('items_container');
            if(container.children.length === 0) {
                location.reload(); 
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html >
