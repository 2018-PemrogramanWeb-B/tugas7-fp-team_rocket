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

      $pw = md5($password);
    //   echo $password;
    //   echo $pw;
      $sql = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$pw';";
      $result = mysqli_query($conn, $sql);
      $login = mysqli_fetch_assoc($result);
      if ($login) {
        //   echo "Tes";
        $_SESSION[username] = $username;
        $_SESSION[uid]=mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id` FROM `user` WHERE `username` = '$username';"));
          header('location:index.php');
      }
      else {
          echo "Fail. Check Username or Password";
      }

    // $sql = mysql_query("SELECT id FROM user WHERE username = '$myusername' and password = '$mypassword'", $conn);

    // $count = mysql_num_rows($sql);


    // if ($count == 1)
    // {

    //     $_SESSION['login_user'] = $myusername;

    //     header("location: welcome.php");

    // }

    // else
    // {
    //     session_destroy();
    // }
   }
?>
<html>

   <head>
      <title>Login Page</title>

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
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

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
