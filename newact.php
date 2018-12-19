<?php
   include("config.php");
   session_start();

   if (!isset($_SESSION['uid'])){
      header('location:index.php');
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
<body background="data:image/jpeg;base64,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">
      <div class="jumbotron text-center" style="margin-bottom:0; padding: 3rem; background-image: url(http://www.tonyfahkry.com/wp-content/uploads/2014/12/journey-752x490.jpg); background-size: cover; background-repeat: no-repeat; background-size: 1600px 235px;">
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
