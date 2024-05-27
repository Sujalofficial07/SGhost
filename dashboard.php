<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // If not logged in, redirect to the login page
    header("Location: login/login.php");
    exit;
}

// Get the username from the session
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    h1 {
      color: #333;
    }
    p {
      color: #666;
    }
    .logout {
      margin-top: 20px;
    }
    .logout a {
      color: #007bff;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Welcome to the Dashboard, <?php echo $username; ?>!</h1>
    <p>This is your personalized dashboard.</p>
    <p>Feel free to explore and manage your account.</p>
    <div class="logout">
      <p><a href="login/logout.php">Logout</a></p>
    </div>
  </div>
</body>
</html>
