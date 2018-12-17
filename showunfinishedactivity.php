<?php
  include("config.php");
  session_start();

  if (!isset($_SESSION['uid'])){
     header('location:index.php');
  }

  $activity = $conn->query("SELECT * FROM activity WHERE (user_id = '$_SESSION[uid]' AND `Status` = 0) ORDER BY id");
  print "<table cellpadding=3>";
      print "<tr><th width=100>Aktivitas</th><th width=100>Deadline</th><th width=100 colspan=2>Jenis</th><th width=100 colspan=2>Aksi</th></tr>";
      print "<td colspan=5 align=right><a href=newactivity.php>Tambah Aktivitas<a></td>";
      while($info = mysqli_fetch_array($activity)){
        print "<tr><td>".$info['activity']."</td>";
        print "<td>".$info['Deadline']."</td>";
        print "<td>".$info['Jenis']."</td>";
        print "<td><a href=finishactivity.php?id=".$info['id'].">Selesai</a></td>";
        // print "<td><a href=edit.php?id=".$info['id']."&name=".$info['Nama']."&email=".$info['Email_Address'].">Edit</a></td>";
        // print "<td><a href=del.php?id=".$info['id'].">Delete</a></td>";
      }
?>