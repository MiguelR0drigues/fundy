<?php
include '../includes/db-connection.php';
$userId = $_GET["id"];

if (isset($_POST['Submit'])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $amountNeeded = $_POST["amountNeeded"];
    $consultancyNeeded = $_POST["consultancyNeeded"];
    $image_file = $_FILES["image"];
    $ownerId = $_SESSION["userID"];
    $image_type = exif_imagetype($image_file["tmp_name"]);
    if (!$image_type) {
    die('Uploaded file is not an image.');
    }
    move_uploaded_file( 
        $image_file["tmp_name"],
        __DIR__ . 'D:/XAMP/htdocs/fundy/fundy/' . $image_file["name"]
    );
    $sql = "INSERT INTO 'projects' (title, description, images, ownerId, amountNeeded, consultancyNeeded) VALUES ( '$title','$description','$image_file','$ownerId','$amountNeeded','$consultancyNeeded')";
    $result = mysql_query($sql,$conn);
}
header("Location: ../projects.php");
 ?> 