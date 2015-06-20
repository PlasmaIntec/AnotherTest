<?php
  $link = mysqli_connect("localhost","mamatt","mamatt.123","facility") or die("Error " . mysqli_error($link)); 
  
  $query = "SELECT * FROM room;";
  $result = $link->query($query);
  
  while($row = mysqli_fetch_array($result)) { 
    $row_teacher_name = $row["teacher_name"];
    if (!empty($row_teacher_name)) {
    echo $row["teacher_name"] . "<br />"; 
    }
  } 
?>