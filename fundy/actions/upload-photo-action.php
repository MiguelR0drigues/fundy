<?php
include '../functions/update-pfp.php';
include '../includes/db-connection.php';
$userId = $_GET["id"];

if (($_FILES['new-profile-picture']['name']!="")){
  // Where the file is going to be stored
    $target_dir = "assets/images/user-pfp/";
    $file = $_FILES['new-profile-picture']['name'];
    $path = pathinfo($file);
    $filename = $userId;
    $ext = $path['extension'];
    $filename_ext = $userId.".".$path['extension'];
    $temp_name = $_FILES['new-profile-picture']['tmp_name'];
    $path_filename_ext = $target_dir.$filename.".".$ext;
   
  // Check if file already exists
  if (file_exists($path_filename_ext)) {
   echo "Sorry, file already exists.";
  }else{
   move_uploaded_file($temp_name,'D:/XAMP/htdocs/fundy/fundy/'.$path_filename_ext);
   updatePfp($userId,$filename_ext,$conn);
   header("Location: ../user-profile.php?id=$userId&success=1");
  }
}

?>