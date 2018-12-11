<?php
  include("config.php");
  session_start();

  $username = "";
  $errors = array();

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) { array_push($errors, "Username is required");}
    if (empty($password)) { array_push($errors, "Password is required");}

    $sql = "SELECT * FROM `user` WHERE `username` = '$username';";
    $result = mysqli_query($conn, $sql);
    // echo $result;
    $user = mysqli_fetch_assoc($result);

    if ($user){
      array_push($errors, "Username already exists");
    }

    if (count($errors) == 0) {
      $password = md5($password);

      $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
      mysqli_query($conn, $query);
      $_SESSION[username] = $username;
      header('location:index.php');
    }
  }
?>
<html>

   <head>
      <title>Registration Page</title>

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Register</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>

            </div>

         </div>

      </div>

   </body>
</html>
