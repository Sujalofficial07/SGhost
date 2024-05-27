<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $servername = $_POST["servername"];
    $ram = $_POST["ram"];
    $cpu = $_POST["cpu"];
    $disk = $_POST["disk"];
    $additional_ports = $_POST["additional_ports"];
    $backups = $_POST["backups"];
    $databases = $_POST["databases"];
    $location = $_POST["location"];
    $software = $_POST["software"];

    // Perform any additional validation here if needed

    // After server creation, remove the option to create another server
    // Redirect the user to the panel page
    header("Location: http://sghost.unaux.com/Client/panel");
    exit;
} else {
    // If the form is not submitted, redirect back to the create server page
    header("Location: create-server/create-server.php");
    exit;
}
?>
