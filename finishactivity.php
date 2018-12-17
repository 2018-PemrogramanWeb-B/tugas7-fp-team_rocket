<?php
  include('config.php');
  session_start();

  if(!isset($_SESSION[uid])){
      header('location:index.php');
  }

  $id = $_GET[id];
  $conn->query("UPDATE activity SET `Status` = 1 WHERE `id` = '$id';");
  header('location:showunfinishedactivity.php');
?>