<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $servername = $_POST["servername"];
    $ram = $_POST["ram"];
    $cpu = $_POST["cpu"];
    $disc = $_POST["disc"];
    $ports = $_POST["ports"];
    $backup = $_POST["backup"];
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
    header("Location: create_server.php");
    exit;
}
?>
