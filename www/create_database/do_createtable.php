<?php
$table_name = $_POST['table_name'];
$field_name = $_POST['field_name'];
$field_type = $_POST['field_type'];
$field_length = $_POST['field_length'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
  <HEAD>
    <TITLE>Create a Database Table: Step 3</TITLE>
  </HEAD>
  <BODY>

    <h1>Adding table <?php echo "$table_name"; ?></h1>
    <?php
    $sql = "CREATE TABLE $table_name(";
    $count_table_name = count($table_name);
    for ($i = 0 ; $i < $count_table_name ; $i++) {
      $sql .= $field_name[$i]." ".$field_type[$i];
      if ($field_length[$i] != "") {
        $sql .= " (".$field_length[$i]."),";
      } else {
        $sql .= ",";
      }
    }
    $sql = substr($sql, 0, -1);
    $sql .= ")";

    //database interaction

    $conn = mysqli_connect("localhost","mamatt","mamatt.123","facility") or die(mysqli_error($conn));
      
    $db = mysqli_select_db($conn, "test") or die(mysqli_error($conn));

    $sql_result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($sql_result) {
      echo "<P>$table_name has been created!</P>";
    }
    ?>

  </BODY>
</HTML>
