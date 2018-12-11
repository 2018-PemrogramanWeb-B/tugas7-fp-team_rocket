<?php
   include("config.php");
   session_start();

   if (!$_SESSION){
      header('index.php');
   }
   $errors = array();

   if($_SERVER["REQUEST_METHOD"] == "POST"){
      $activity = mysqli_real_escape_string($conn, $_POST['activity']);
      $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
      $category = mysqli_real_escape_string($conn, $_POST['category']);
      $user_id = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `id` FROM `user` WHERE `username` = '$_SESSION[username]';"));

      if (empty($activity)) { array_push($errors, "Please enter activity name");}

      if (count($errors) == 0) {
          $query = "INSERT INTO activity (user_id, activity, Deadline, Jenis) VALUES ('$userid', '$activity', '$deadline', '$category')";
          mysqli_query($conn, $query);
          header('location:index.php');
      }
    }
?>
<html>

   <head>
      <title>New Activity</title>

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
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>New Activity</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                  <label>Activity Name  :</label><input type = "text" name = "activity" class = "box"/><br /><br />
                  <label>Deadline  :</label><input type = "date" name = "deadline" class = "box" /><br/><br />
                  <label>Category
                  <select>
                    <option>Physical</option>
                    <option>Intellectual</option>
                    <option>Social</option>
                  </select>
                  <br><br>
                  <input type = "submit" value = " Submit "/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>

            </div>

         </div>

      </div>

   </body>
</html>
