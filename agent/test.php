<?php

include_once "../libs/load.php";

function getTotalAgent($id)
{
    $conn = Database::getConnection();
    $sql = "SELECT COUNT(*) AS `agent_count` FROM `agent` WHERE `admin_id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['agent_count'];
}


function countagent(){
  $conn = Database::getConnection();

  $sql = "SELECT COUNT(*) AS `count` FROM `agent` WHERE `admin_id` = 1";
  $result = mysqli_query($conn, $sql);

  if ($result) {
      $row = mysqli_fetch_assoc($result);
      $count = $row['count'];
      return $count;
  } else {
      echo "Error executing the query: " . mysqli_error($conn);
  }
}





  $sql = "SELECT `id` FROM `admin` ORDER BY `id`";
  $result = mysqli_query($conn, $sql);
  
  $rows = array();
  while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
  }
  if (count($rows) > 0) {
      foreach ($rows as $row) {
          foreach ($row as $key => $value) {
               $key . ": " . $value . "<br>";
          }
      }
  }
  ?>

  <pre> <?php print_r($rows) ;?> </pre>

<?php
      // foreach ($rows as $row) {
      // }


  




























// $sql = "SELECT `id` FROM `admin` ORDER BY `id`";
// $result = mysqli_query($conn, $sql);

// if ($result) {
//     $adminIds = array();
//     while ($row = mysqli_fetch_assoc($result)) {
//         $adminIds[] = $row['id'];
//     }

//     foreach ($adminIds as $adminId) {

//     }
// } else {
//     echo "Error executing the query: " . mysqli_error($conn);
// }


