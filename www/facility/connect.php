<?php
  // $link = mysqli_connect("localhost","mamatt","mamatt.123","facility") or die("Error " . mysqli_error($link)); 
  // $db = mysqli_select_db($link,"facility") or die(mysqli_error());

  $dbc = new mysqli("localhost","mamatt","mamatt.123","facility");

  /* check connection */
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
?>