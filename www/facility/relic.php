<?php
  require ('connect.php');
  
  $query = "SELECT * FROM room;";
  $result = $link->query($query);
  
  while($row = mysqli_fetch_array($result)) { 
    echo $row["id"] . "<br />"; 
  } 
?>

