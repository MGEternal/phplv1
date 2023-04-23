<?php
session_start(); // Start the session
include("connection.php");
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to retrieve user from database
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'"; // replace 'users' with your table name and 'username', 'password' with your column names

// Execute the query
$result = $conn->query($sql);

// Check for query execution errors
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Check if a user was found
if ($result->num_rows > 0) {
    // User found, perform login action (e.g., set session, redirect to home page)
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row["user_id"];
    $_SESSION['username'] = $username;
    header("Location: welcome.php");
} else {
    // User not found, display error message
    echo "Invalid username or password.";
    header("Location: login.php");
}

// Close the database connection
$conn->close();
?>