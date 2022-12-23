<?php

  function updateInfo($id, $name,$email,$conn){
    $stmt = mysqli_prepare($conn, "UPDATE `users` SET `name` = ? , `email` = ? WHERE `id` = ?");
    mysqli_stmt_bind_param($stmt, "ssi", $name,$email,$id);

    $id = $id;
    $name = $name;
    $email = $email;
    // Set parameters and execute
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);

  }

?>
