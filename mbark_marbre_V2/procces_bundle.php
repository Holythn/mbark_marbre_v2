<?php
include 'config.php';

// Security: Only logged in users can order
if(!isset($_SESSION['userid'])) { 
    die("Unauthorized access."); 
}

$userid = $_SESSION['userid'];

// Check if the user actually added items
if(!isset($_POST['materials']) || empty($_POST['materials'])) {
    echo "<script>alert('Your bundle is empty!'); window.location='order.php';</script>";
    exit();
}

$materials = $_POST['materials']; 
$projects = $_POST['projects'];   
$dimensions = $_POST['dims'];      

// 1. Create the Order Header (The Bundle)
$sql_order = "INSERT INTO orders (userid, status) VALUES ('$userid', 'Requested')";

if(mysqli_query($conn, $sql_order)) {
    $orderid = mysqli_insert_id($conn); // Get the ID of the order we just created

    // 2. Loop through the bundle and create the items
    for($i = 0; $i < count($materials); $i++) {
        $mat_name = mysqli_real_escape_string($conn, $materials[$i]);
        $proj_name = mysqli_real_escape_string($conn, $projects[$i]);
        $dims = mysqli_real_escape_string($conn, $dimensions[$i]);

        // Find the ID of the material
        $m_res = mysqli_query($conn, "SELECT materialid FROM material_library WHERE name='$mat_name'");
        $m_data = mysqli_fetch_assoc($m_res);
        $m_id = $m_data['materialid'];

        // Find the ID of the project type
        $p_res = mysqli_query($conn, "SELECT projecttypeid FROM project_types WHERE typename='$proj_name'");
        $p_data = mysqli_fetch_assoc($p_res);
        $p_id = $p_data['projecttypeid'];

        // Insert the specific item into the order
        $sql_item = "INSERT INTO order_items (orderid, materialid, projecttypeid, dimensions) 
                     VALUES ('$orderid', '$m_id', '$p_id', '$dims')";
        mysqli_query($conn, $sql_item);
    }

    echo "<script>alert('Your Luxury Project Bundle has been submitted successfully!'); window.location='profile.php';</script>";
} else {
    echo "Error creating order: " . mysqli_error($conn);
}
?>
