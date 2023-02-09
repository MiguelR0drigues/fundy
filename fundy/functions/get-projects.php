<?php

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
