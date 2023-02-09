<?php
include '../includes/db-connection.php';
include './get-last-project-id.php';

$userId = $_GET["id"];
$projectId = getLastId($conn)+1;
$title = $_POST["title"];
$description = $_POST["description"];
$amountNeeded = (isset($_POST["amountNeeded"])) ? $_POST["amountNeeded"] : null;
$consultancyNeeded = (isset($_POST["consultancyNeeded"])) ? $_POST["consultancyNeeded"] : null;

if (($_FILES['image']['name']!="")){
  // Where the file is going to be stored
    $target_dir = "assets/images/projects/";
    $file = $_FILES['image']['name'];
    $path = pathinfo($file);
    $filename = $projectId;
    $ext = $path['extension'];
    $filename_ext = $projectId.".".$path['extension'];
    $temp_name = $_FILES['image']['tmp_name'];
    $path_filename_ext = $target_dir.$filename.".".$ext;
   
  // Check if file already exists
  if (file_exists($path_filename_ext)) {
   echo "Sorry, file already exists.";
  }else{
    move_uploaded_file($temp_name,'D:/XAMP/htdocs/fundy/fundy/'.$path_filename_ext);

    $sql = "INSERT INTO `projects` (title, description, mainImg, ownerId, amountNeeded, consultancyNeeded) VALUES (?,?,?,?,?,?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssiis", $param_title, $param_desc, $param_image, $param_owner, $param_amount,$param_consult);
      // Set parameters
      $param_title = $title;
      $param_desc = $description;
      $param_image = $filename_ext;
      $param_owner = $userId;
      $param_amount = $amountNeeded;
      $param_consult = $consultancyNeeded;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        header("Location: ../view-projects.php?id=$userId&success=1");
      } else {
        header("location: login.php?error=3");
      }

      // Close statement
      mysqli_stmt_close($stmt);
    } else {
      echo mysqli_error($conn);
    }

  }
}

 ?> 
