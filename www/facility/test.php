<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
  <HEAD>
    <TITLE>MySQL Preliminary Testing</TITLE>
  </HEAD>
  <BODY>
    
    <style>
      table {
        width:100%;
        text-align:center;
      }
      caption {
        padding:10px;
      }
    </style>
    
    <table>
      <caption>
        room
      </caption>
      <tr>
        <th>id</th>
        <th>room_num</th> 
        <th>room_name</th>
        <th>teacher_name</th>
      </tr>
      <tr>
        <td>1</td>
        <td>301</td> 
        <td>Computer Lab</td>
        <td>Julia Fitzgerald</td>
      </tr>
      
      <tr><td><P/> </td></tr>


      
      <tr> 
        <td>
          <FORM method="POST" action="test.php">
            <P align=center>New id: <INPUT type="text" name="id" size=5 maxlength=5 /></P>      
          </FORM> 
        </td>
        <td>
          <FORM method="POST" action="test.php">
            <P align=center>New room_num: <INPUT type="text" name="room_num" size=5 maxlength=5 /></P>      
          </FORM> 
        </td>
        <td>
          <FORM method="POST" action="test.php">
            <P align=center>New room_name: <INPUT type="text" name="room_name" size=5 maxlength=15 /></P>      
          </FORM> 
        </td>
        <td>
          <FORM method="POST" action="test.php">
            <P align=center>New teacher_name: <INPUT type="text" name="teacher_name" size=5 maxlength=15 /></P> 
          </FORM> 
        </td>
      </tr>
    </table>
    
    <FORM method="POST" action="test.php">
      <H1 align=center><INPUT type="submit" value="Submit"/></H1>
    </FORM>
    
    <?php
      $id = $_POST['id'];   
      $room_num = $_POST['room_num'];
      $room_name = $_POST['room_name'];
      $teach_name = $_POST['teach_name'];

      if ($id !== "" || $room_num !== "" || $room_name !== "" || $teacher_name !== "") {
        echo "<H1 align=center>$id</H1>";
      } else {
        echo "<H1 align=center>Nothing Here</H!>";
      }
    ?>
    
  </BODY>
</HTML>