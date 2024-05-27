<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate the username and password (you might want to add more validation here)
    if ($username === "example_user" && $password === "example_password") {
        // Start a session and store the username as a session variable
        session_start();
        $_SESSION["username"] = $username;
        
        // Redirect the user to a dashboard or home page
        header("Location: dashboard.php");
        exit;
    } else {
        // If the username or password is incorrect, redirect back to the login page with an error message
        header("Location: login/login.php?error=1");
        exit;
    }
} else {
    // If the form is not submitted, redirect back to the login page
    header("Location: login/login.php");
    exit;
}
?>
