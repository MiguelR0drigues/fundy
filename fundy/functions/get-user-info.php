<?php
include 'includes/db-connection.php';

function getUSerInfoById($id, $conn){
  $stmt = mysqli_prepare($conn, "SELECT `name`, `email`, `token`, `isVerified` FROM users WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);

  // Set parameters and execute
  $id = 1;
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
      // // output data of each row
      // while($row = mysqli_fetch_assoc($result)) {
      //     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
      // }
      return $result;
  } else {
      return false;
  }

  mysqli_stmt_close($stmt);
}
?>