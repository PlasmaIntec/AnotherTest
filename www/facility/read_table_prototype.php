<link rel="stylesheet" type="text/css" href="theme.css">

<div class="header">
  WWVA ROOMS
</div>

<br>

<?php
  echo '<link rel="stylesheet" type="text/css" href="theme.css">';

  require ('connect.php');
  
  if (isset($_GET['delete_row_name'])) {
    $delete_row_name = $_GET['delete_row_name'];
    $truncated_delete_row_name = substr($delete_row_name,11);
    $resultant_array = array($truncated_delete_row_name);
    // universal_bind_param($dbc,"DELETE FROM `room` WHERE `room_num` = ?",$resultant_array,"s");
    bind_param_1($dbc,"DELETE FROM `room` WHERE `room_num` = ?",$truncated_delete_row_name);
  } // detects when Delete Row has been submitted

  if (isset($_GET['edit_row_name'])) {
    $edit_row_name = $_GET['edit_row_name'];
    $truncated_edit_row_name = substr($edit_row_name,9);
    $editted_row_submission = "editted_row_submit "."$truncated_edit_row_name";
    echo "<br>
      <FORM action='read_table_prototype.php' class='specialeffect' align=center>
        Edit Room Number To: <INPUT type='text' name='edit_room_num'/>
        Edit Room Name To: <INPUT type='text' name='edit_room_name'/>
        Edit Teacher Name To: <INPUT type='text' name='edit_teacher_name'/>
        <INPUT type='hidden' name='truncated_edit_row_name' value='$truncated_edit_row_name'/>
        <INPUT type='submit' name='editted_row_name' value='Submit'/>
      </FORM><br>";
  } // detects when Edit Row has been submitted

  if (isset($_GET['editted_row_name'])) {
    $edit_room_num = $_GET['edit_room_num'];
    $edit_room_name = $_GET['edit_room_name'];
    $edit_teacher_name = $_GET['edit_teacher_name'];
    $truncated_edit_row_name = $_GET['truncated_edit_row_name'];
    $resultant_array = array($edit_room_num,$edit_room_name,$edit_teacher_name,$truncated_edit_row_name);
    // universal_bind_param($dbc,"UPDATE room SET room_num=?, room_name=?, teacher_name=? WHERE room_num=?",$resultant_array,"ssss");
    bind_param_3($dbc,"UPDATE room SET room_num=?, room_name=?, teacher_name=? WHERE room_num=?",$edit_room_num,$edit_room_name,$edit_teacher_name,$truncated_edit_row_name);
  } // detects when Edit Row has been fully submitted

  if (isset($_GET['editted_row_name']) and empty($_GET['edit_room_num']) || empty($_GET['edit_room_name'])) {
    echo "<p align=center>Please Fill In The room_number/room_name Fields.</p>";
  } // displays error message when Edit Row is not submitted correctly

  if (isset($_GET['add_row'])&&!empty($_GET['room_number'])&&!empty($_GET['room_name'])) {
    $room_number = $_GET['room_number'];
    $room_name = $_GET['room_name'];
    $teacher_name = $_GET['teacher_name'];
    $resultant_array = array($room_number,$room_name,$teacher_name);
    // universal_bind_param($dbc,"INSERT INTO `room`(`id`, `room_num`, `room_name`, `teacher_name`) VALUES (null, ?, ?, ?)",$resultant_array,"sss");
    bind_param_2($dbc,"INSERT INTO `room`(`id`, `room_num`, `room_name`, `teacher_name`) VALUES (null, ?, ?, ?)",$room_number,$room_name,$teacher_name);
  } else if (isset($_GET['add_row']) and empty($_GET['room_number']) || empty($_GET['room_name'])) {
    echo "<p align=center>Please Fill In The room_number/roon_name Fields.</p>";
  } // detects when Add Row has been submitted

  create_table($dbc);
  
  function create_table($dbc) {
    $query = "SELECT DISTINCT `room_num`, `room_name`, `teacher_name` FROM `room` ORDER BY `room_num` ASC";
    // $result = mysqli_query($dbc, $query);
    $result = $dbc->query($query);

    echo "<div class='bluebackground'><TABLE BORDER=1>
        <TR>
        <TH>room_num</TH>
        <TH>room_name</TH>
        <TH>teacher_name</TH>
        <TH>delete_row_function</TH>
        <TH>edit_row_function</TH>
        </TR>";

    while (/* $row = mysqli_fetch_array($result, MYSQL_ASSOC */$row = $result->fetch_array(MYSQL_ASSOC)) {
      // print_r($row);
      $room_num = $row["room_num"];
      $room_name = $row["room_name"];
      $teacher_name = $row["teacher_name"];
      $delete_row_name = "Delete Row ";
      $delete_row_name .= $row["room_num"];
      $edit_row_name = "Edit Row ";
      $edit_row_name .= $row["room_num"];
            
      echo "<TR>
          <TD>$room_num</TD>
          <TD>$room_name</TD>
          <TD>$teacher_name</TD>
          <TD>
            <FORM action='read_table_prototype.php'>
              <INPUT type='submit' value='Delete Row'/>
              <INPUT type='hidden' name='delete_row_name' value='$delete_row_name'>
            </FORM>
          </TD>
          <TD>
            <FORM action='read_table_prototype.php'>
              <INPUT type='submit' value='Edit Row'/>
              <INPUT type='hidden' name='edit_row_name' value='$edit_row_name'>
            </FORM>
          </TD>
          </TR>";
    }

    echo "</TABLE><br>";
    
    echo "<TABLE BORDER=1><FORM action='read_table_prototype.php'>
        <TR>
        <TH>add_row_function</TH>
        <TH>Room Number: <INPUT type='text' name='room_number'/></TH>
        <TH>Room Name: <INPUT type='text' name='room_name'/></TH>
        <TH>Teacher Name: <INPUT type='text' name='teacher_name'/> </TH>
        <TH><INPUT type='submit' value='Add Row' name='add_row'/></TH>
        </TR></FORM></TABLE></div>";
  }
   
  function bind_param_1($dbc,$query,$proposition) {
    $statement = $dbc->prepare($query);
    $statement->bind_param("s",$proposition);
    // $statement = mysqli_prepare($dbc,$query);
    // mysqli_stmt_bind_param($statement, "s", $proposition);
        
    $statement->execute();
    $statement->close();
    /* if (!mysqli_stmt_execute($statement))
    {
        echo "<p align=center>".mysqli_error($dbc)."</p>";
    }
    mysqli_stmt_close($statement); */
  }

  function bind_param_2($dbc,$query,$proposition_1,$proposition_2,$proposition_3) {
    $statement = $dbc->prepare($query);
    $statement->bind_param("sss",$proposition_1,$proposition_2,$proposition_3);
    // $statement = mysqli_prepare($dbc,$query);
    // mysqli_stmt_bind_param($statement,"sss",$proposition_1,$proposition_2,$proposition_3);
    
    $statement->execute();
    $statement->close();
    /* if (!mysqli_stmt_execute($statement))
    {
        echo "<p align=center>".mysqli_error($dbc)."</p>";
    }
    mysqli_stmt_close($statement); */
  }

  function bind_param_3($dbc,$query,$proposition_1,$proposition_2,$proposition_3,$proposition_4) {
    $statement = $dbc->prepare($query);
    $statement->bind_param("ssss",$proposition_1,$proposition_2,$proposition_3,$proposition_4);
    // $statement = mysqli_prepare($dbc,$query);
    // mysqli_stmt_bind_param($statement,"ssss",$proposition_1,$proposition_2,$proposition_3,$proposition_4);
    
    $statement->execute();
    $statement->close();
    /* if (!mysqli_stmt_execute($statement))
    {
        echo "<p align=center>".mysqli_error($dbc)."</p>";
    }
    mysqli_stmt_close($statement); */
  }

  function universal_bind_param($dbc,$query,$resultant_array,$type) {
    $statement = mysqli_prepare($dbc,$query);
    $str = "mysqli_stmt_bind_param($statement,$type,";
    $n = count($resultant_array);
    for ($i = 0; $i < $n; $i++) {
      $str .= "$resultant_array[$i],";
    }
    $str = substr($str, 0, -1);
    $str .= ');';
    print_r($str);
    eval($str);
    if (!mysqli_stmt_execute($statement))
    {
        echo "<p align=center>".mysqli_error($dbc)."</p>";
    }
    mysqli_stmt_close($statement);    
  } // need to get this version but $str is behaving oddly
//SELECT room.room_num, room.room_name, IFNULL(teacher.teacher_name,'(none selected)') AS teacher_name FROM room LEFT JOIN teacher ON (room.teacher_id=teacher.id) WHERE 1
?>

