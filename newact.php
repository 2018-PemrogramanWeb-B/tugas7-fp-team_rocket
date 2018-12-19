<?php
   include("config.php");
   session_start();

   if (!isset($_SESSION['uid'])){
      header('location:home.php');
   }
   $errors = array();

   if($_SERVER["REQUEST_METHOD"] == "POST"){
      $activity = mysqli_real_escape_string($conn, $_POST['activity']);
      $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
      $category = mysqli_real_escape_string($conn, $_POST['category']);
      $sql = "SELECT `id` FROM `user` WHERE `username` = '$_SESSION[username]';";
      $result = mysqli_query($conn, $sql);
      $userid = mysqli_fetch_assoc($result);
      if (empty($activity)) { array_push($errors, "Please enter activity name");}

      if (count($errors) == 0) {
          $query = "INSERT INTO activity (user_id, activity, Deadline, Jenis) VALUES ('$_SESSION[uid]', '$activity', '$deadline', '$category')";
          mysqli_query($conn, $query);
          header('location:home.php');
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>MyJon</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
	height: 200px;
	background: #aaa;
  	}
  .navbar-brand {
	display: inline-block;
	padding-top: .3125rem;
	padding-bottom: .3125rem;
	margin-right: 33rem;
	font-size: 1.25rem;
	line-height: inherit;
	white-space: nowrap;
	}
  </style>
</head>
<body>
      <div class="jumbotron text-center" style="margin-bottom:0; padding: 3rem">
        <h1>MyJourney</h1>
        <h3><?php echo " " . date("Y/m/d") ; ?></h3>
        <p>FP PWEB B</p> 
      </div>

<nav margin-right: 30rem, class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="home.php"><?php if ($_SESSION){echo"$_SESSION[username]'s Home";}?></a>
  <a class="navbar-brand" href="#">Activity</a>
  <a align='right' class="navbar-brand" href="logout.php">Log Out</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
      <h2><?php if ($_SESSION){echo"Welcome $_SESSION[username]!";}?></h2><br><br>
      <h5 style="font-family:courier; font-style: italic; text-align: justify;">Determine never to be idle.<br>No person will have occasion to complain of the want of time who never loses any.<br>It is wonderful how much can be done if we are always doing.</h5>
      <h6>"Thomas Jefferson"</h6>
    </div>
    <div class="col-sm-8">
      	<div align = "center">
          <h1>Activity Input</h1>
          <div style = "width:600px; " align = "left">
              <div style = "margin:30px">
                <form action = "" method = "post">
                  <label>Activity Name  :</label><br><textarea rows="3" type = "text" name = "activity" class = "box" style="width: 500px"></textarea><br>
                  <label>Deadline  :</label><br><input type = "date" name = "deadline" class = "box" /><br>
                  <label>Category</label><br>
                  <select name="category">
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
  </div>
</div>

</body>
</html>
