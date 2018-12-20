<?php
  include("config.php");
  session_start();

  if (!isset($_SESSION['uid'])){
    header('location:index.php');
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
  .background {
	height: 200px;
	background-image: #aaa;
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
<body background="https://d19gb5k9ejx8w0.cloudfront.net/uploads/2016/02/activity-kits-featured-image.png">


      <div class="jumbotron text-center" style="margin-bottom:0; padding: 3rem; background-image: url(http://www.tonyfahkry.com/wp-content/uploads/2014/12/journey-752x490.jpg); background-size: cover; background-repeat: no-repeat; background-size: 1600px 235px;">
        <h1>MyJourney</h1>
        <h3><?php echo " " . date("Y/m/d") ; ?></h3>
        <p>FP PWEB B</p> 
      </div>
<nav margin-right: 30rem, class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#"><?php if ($_SESSION){echo"$_SESSION[username]'s Home";}?></a>
  <a class="navbar-brand" href="unfinact.php">Target</a>
  <a align='right' class="navbar-brand" href="logout.php">Log Out</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<div class="container" style="margin-top:30px; background:#ffffff; padding:50px;">
  <div class="row">
    <div class="col-sm-4">
      <h2><?php if ($_SESSION){echo"Welcome $_SESSION[username]!";}?></h2><br><br>
      <h5 style="font-family:courier; font-style: italic; text-align: justify;">Determine never to be idle.<br>No person will have occasion to complain of the want of time who never loses any.<br>It is wonderful how much can be done if we are always doing.</h5>
      <h6>"Thomas Jefferson"</h6>
    </div>
    <table style=""></table>
    <div class="col-sm-8">
      <h1 align="center"><?php if ($_SESSION){echo"$_SESSION[username]'s Achievement (so far)";}?></h1><br>
      	<?php
		  $query = "SELECT * FROM `user` WHERE `id` = '$_SESSION[uid]'";
      $result = mysqli_query($conn, $query);
      $achiev = mysqli_fetch_assoc($result);
		  print "<table cellpadding=3 style='table-layout: fixed; width: 150px';>";
		      print "
		      	<tr>
		      		<th width=250></th>
		      		<th width=250>Achievement</th>
		      		<th width=250 colspan=2>Info</th>
		      	</tr>";
		      if($achiev['physical_activities'] == 1){
		        print "<tr><td align='center'><img src='images/hand.png' height='70' width='70'/>
            </td>";
		        print "<td>STR 99</td>";
		        print "<td style=' word-wrap: break-word; text-align: justify'>Congrats! You've done so much Physical Activities, you get to destroy a boulder with One Punch!</td>";
		      }
          if($achiev['social_activities'] == 1){
            print "<tr><td align='center'><img src='images/people.png' height='70' width='70'/>
            </td>";
            print "<td>Famous</td>";
            print "<td style=' word-wrap: break-word; text-align: justify'>You're not Anti Social, Congrats?</td>";
          }
      print "</table>";
		?>
    </div>
  </div>
</div>


</body>
</html>
