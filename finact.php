<?php
  include('config.php');
  session_start();

  if(!isset($_SESSION[uid])){
      header('location:index.php');
  }

  $id = $_GET[id];
  $conn->query("UPDATE activity SET `Status` = 1 WHERE `id` = '$id';");
  $conn->query("UPDATE user SET finished_activities = finished_activities + 1 WHERE id = $_SESSION[uid]");
  $query = "SELECT jenis FROM activity WHERE id = $id";
  $result = mysqli_query($conn, $query);
  $category = mysqli_fetch_assoc($result);
  if ($category['jenis'] == 'Physical') {
    $query = "UPDATE user SET physical_activities = physical_activities + 1 WHERE id = $_SESSION[uid]";
    mysqli_query($conn, $query);
  }
  else if ($category['jenis'] == 'Intellectual') {
    $query = "UPDATE user SET intellectual_activities = intellectual_activities + 1 WHERE id = $_SESSION[uid]";
    mysqli_query($conn, $query);
  }
  else {
    $query = "UPDATE user SET social_activities = social_activities + 1 WHERE id = $_SESSION[uid]";
    mysqli_query($conn, $query);
  }
  header('location:home.php');
?>