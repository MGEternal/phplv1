<?php
include("connection.php");
$username = $_POST["username"];
$pwd = $_POST["pwd"];
$email = $_POST["email"];

$sql1 = "select * from users";
$result = $conn->query($sql1);
if (!$result) {
    die("Query failed: " . $conn->error);
}
$numRows = $result->num_rows;
while ($row = $result->fetch_assoc() or $numRows==0) {
    echo "2012"   ;
        // Access individual columns in the row
        if($username != $row["username"] && $email != $row["email"]){
            $sql2 = "INSERT INTO users (username, password, email) VALUES ('$username', '$pwd', '$email')";
            if ($conn->query($sql2) === TRUE) {
                echo "New record created successfully";
                header("Location: index.php");
            } else {
                echo "Error: " . $sql2 . "<br>" . $conn->error;
            }
        }
        $numRows++;
    }
 
 echo $username   ;


// Close the database connection
#$conn->close();
?>

