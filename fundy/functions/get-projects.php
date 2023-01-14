<?php

function getProjects( $conn){
  $stmt = mysqli_prepare($conn, "SELECT * FROM projects");

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