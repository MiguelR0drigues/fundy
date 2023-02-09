<?php

// function getProjects( $conn){
//   $stmt = mysqli_prepare($conn, "SELECT * FROM projects");

//   mysqli_stmt_execute($stmt);
//   $result = mysqli_stmt_get_result($stmt);

//   if (mysqli_num_rows($result) > 0) {
//       // // output data of each row
//       // while($row = mysqli_fetch_assoc($result)) {
//       //     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//       // }
//       return $result;
//   } else {
//       return false;
//   }

//   mysqli_stmt_close($stmt);
// }


function getProjects($conn, $page, $per_page) {
  $start = ($page-1) * $per_page;
  $query = "SELECT * FROM projects ORDER BY id DESC LIMIT $start, $per_page";
  $result = mysqli_query($conn, $query);
  $total_query = "SELECT COUNT(*) as total FROM projects";
  $total_result = mysqli_query($conn, $total_query);
  $total = mysqli_fetch_assoc($total_result)['total'];
  return array('result' => $result, 'total' => $total);
}
?>
