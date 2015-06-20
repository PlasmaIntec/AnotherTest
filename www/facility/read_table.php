<link rel="stylesheet" type="text/css" href="theme.css">

<div class="header">
  WWVA ROOMS
</div>

<br>

<div> 

  <FORM method="POST" action="read_table.php">
    <u>Delete Row</u> <br>
    Room Number:
    <INPUT type="text" name="room_number"/>  
    <INPUT type="submit" value="Submit" name="delete_row"/>
  </FORM> <!--form for deleting rows-->

  <FORM method="POST" action="read_table.php">
    <u>Add Row</u> <br>
    Room Number: <INPUT type="text" name="room_number"/>  
    Room Name: <INPUT type="text" name="room_name"/>  
    Teacher Name: <INPUT type="text" name="teacher_name"/>  
    <INPUT type="submit" value="Submit" name="add_row"/>
  </FORM> <!--form for adding rows-->
  
  <FORM method="POST" action="read_table.php">
    <u>Edit Row</u> <br>
    <table class="lightsalmonbackground">
      <tr>
        <td></td>
        <td><b>Room Number To Edit:</b></td><td><INPUT type="text" name="edited_room"/></td>
        <td><b>Change Room Number To:</b></td><td><INPUT type="text" name="room_num"/></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td><b>Change Room Name To:</b></td><td><INPUT type="text" name="room_name"/></td>
        <td><b>Change Teacher Name To:</b></td><td><INPUT type="text" name="teacher_name"/></td>
        <td><INPUT type="submit" value="Submit" name="edit_row"/></td>
      </tr> 
    </table>
  </FORM> <!--form for editing rows-->

</div>

<?php
  echo '<link rel="stylesheet" type="text/css" href="theme.css">';

  require ('connect.php');

  function bind_param_1($link,$query,$proposition) {
    $statement = mysqli_prepare($link,$query);
    mysqli_stmt_bind_param($statement, "s", $proposition);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
  }

  function bind_param_2($link,$query,$proposition_1,$proposition_2,$proposition_3) {
    $statement = mysqli_prepare($link,$query);
    mysqli_stmt_bind_param($statement,"sss",$proposition_1,$proposition_2,$proposition_3);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
  }

  if (isset($_POST['delete_row'])&&!empty($_POST['room_number'])) {
    $room_number = $_POST['room_number'];
    
    bind_param_1($link,"DELETE FROM `room` WHERE `room_num` = ?",$room_number);
    
    create_table($link);
    
    echo "<p align=center>Row where room number is $room_number has been deleted.</p>";
  } else if (isset($_POST['delete_row'])&&empty($_POST['room_number'])) {

    create_table($link);
    
    echo " <p align=center>Please enter a room number.</p>";
    
  } else if (isset($_POST['add_row'])&&!empty($_POST['room_number']&&!empty($_POST['room_name']))) {
    $room_number = $_POST['room_number'];
    $room_name = $_POST['room_name'];
    $teacher_name = $_POST['teacher_name'];
    
    bind_param_2($link,"INSERT INTO `room`(`id`, `room_num`, `room_name`, `teacher_name`) VALUES (null, ?, ?, ?)",$room_number,$room_name,$teacher_name);
    
    create_table($link);
    
    if (!empty($teacher_name)) {
      echo "<p align=center>Row where room number is $room_number, room name is $room_name, and teacher name is $teacher_name has been added</p>";  
    } else {
      echo "<p align=center>Row where room number is $room_number and room name is $room_name has been added</p>";  
    }    
  
  } else if (isset($_POST['add_row']) and empty($_POST['room_number']) || empty($_POST['room_name']) || empty($_POST['room_number'])) {
    
    create_table($link);
    
    echo "<p align=center>Please fill the necessary information.</p>";
    
  } else if (isset($_POST['edit_row']) && !empty($_POST['edited_room'])) {
    $edited_room = $_POST['edited_room'];
    $room_num = $_POST['room_num'];
    $room_name = $_POST['room_name'];
    $teacher_name = $_POST['teacher_name'];
    
    $query_edit_row = "UPDATE `room` SET `room_num`=? `room_name`=? `teacher_name`=? WHERE `room_num`=501";
    
    bind_param_2($link,$query_edit_row,$room_num,$room_name,$teacher_name);
    
    create_table($link);
    
    echo "<p align=center>You have edited $edited_room successfully.</p>";
    echo $query_edit_row;
    
  } else if (isset($_POST['edit_row']) && empty($_POST['edited_room'])) {
    
    create_table($link);
    
    echo "<p align=center>Please input which room to edit.</p>";
      
  } else {
    create_table($link);
  }
    

  function create_table($link) {
  $query = "SELECT DISTINCT `room_num`, `room_name`, `teacher_name` FROM `room` ORDER BY `room_num` ASC";
  $result = mysqli_query($link, $query);

  echo "<div class='bluebackground'><TABLE BORDER=1>
      <TR>
      <TH>room_num</TH>
      <TH>room_name</TH>
      <TH>teacher_name</TH>
      </TR>";

  while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $room_num = $row["room_num"];
    $room_name = $row["room_name"];
    $teacher_name = $row["teacher_name"];

    echo "<TR>
        <TD>$room_num</TD>
        <TD>$room_name</TD>
        <TD>$teacher_name</TD>
        </TR>";
  }

  echo "</TABLE></div>";
  }
?>