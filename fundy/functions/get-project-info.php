<?php

function getProjectById($id, $conn){
  $stmt = mysqli_prepare($conn, "SELECT `title`, `description`, `mainImg`, `category`, `location`, `ownerId`, `amountNeeded`, `consultancyNeeded`, `createdAt` FROM projects WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);

  $id = $id;
  // Set parameters and execute
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    return $result;
  } else {
    return false;
  }

  mysqli_stmt_close($stmt);
}
?>