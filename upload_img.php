<?php
session_start();
include("connection.php");

// File upload directory
$uploadDir = "upload_img";

// Get the uploaded file details
$closer_name = $_POST["c_name"];
$closer_type = $_POST["c_type"];
$closer_tag = $_POST["c_tag"];
$user_id = $_SESSION['user_id'];
$fileName = $_FILES["file"]["name"];
$fileTmpName = $_FILES["file"]["tmp_name"];
$fileType = $_FILES["file"]["type"];
$fileSize = $_FILES["file"]["size"];
$fileError = $_FILES["file"]["error"];

if ($fileError === 0) {
    // Move the uploaded file to the desired directory
    $uploadPath = $uploadDir . $fileName;
    if (move_uploaded_file($fileTmpName, $uploadPath)) {
        echo "File has been uploaded successfully!";
    } else {
        echo "Failed to upload file.";
    }
} else {
    echo "Error uploading file: " . $fileError;
}

$sql1 = "insert into clothes (`c_name`,`c_type`,`c_tag`,`image`,`user_id`) VALUES ('$closer_name','$closer_type','$closer_tag','$fileName','$user_id')";
$result = $conn->query($sql1);
if($result){
    header("Location: welcome.php");
}else{
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}



?>