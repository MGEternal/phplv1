<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}

// Retrieve logged-in user's username from session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome, <?php echo $username; ?>!</h2>
    <p>You have successfully logged in.</p>
    <form method="post" action="upload_img.php" enctype="multipart/form-data">

        <div>
        <label for="name">Name of img</label>
        <input type="text" name="c_name" >
        </div>

        <div>
        <label for="type">Type of img</label>
        <input type="text" name="c_type" >
        </div>

        <div>
        <label for="tag">Tag of img</label>
        <input type="text" name="c_tag" >
        </div>

        <div>
        <input type="file" name="file">
        <input type="submit" value="Upload">
        </div>
        
    </form>
    <p><a href="logout.php">Logout</a></p> <!-- Link to logout.php to handle logout action -->
</body>
</html>
