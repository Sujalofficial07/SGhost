<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate the username and password (you might want to add more validation here)
    if (strlen($username) < 6 || strlen($password) < 6) {
        // If username or password is too short, redirect back to the registration page with an error message
        header("Location: register.php?error=1");
        exit;
    }

    // Hash the password (for better security)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Save the username and hashed password to a database (or any other data store)
    // Example: Assuming you have a MySQL database named 'users' with a table named 'accounts'
    $servername = "localhost";
    $dbUsername = "your_username";
    $dbPassword = "your_password";
    $dbName = "your_database";

    // Create a connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO accounts (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $hashedPassword);

    // Execute the statement
    if ($stmt->execute()) {
        // Registration successful, redirect the user to the login page
        header("Location: login.php?registered=1");
        exit;
    } else {
        // If the registration fails, redirect back to the registration page with an error message
        header("Location: register.php?error=2");
        exit;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted, redirect back to the registration page
    header("Location: register.php");
    exit;
}
?>
