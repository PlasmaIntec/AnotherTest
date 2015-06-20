<?php
if ((!$_POST['table_name']) || (!$_POST['num_fields'])) {
  header("Location: http://muscular-riverrun-98-174954.usw1.nitrousbox.com/create_database/show_createtable1.html");
  exit;
} else {
  $table_name = $_POST['table_name'];
  $num_fields = $_POST['num_fields'];
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
  <HEAD>
    <TITLE>Create a Database Table: Step 2</TITLE>
  </HEAD>
  <BODY>

    <h1>Define fields for <?php echo "$table_name"; ?></h1>
    
    <FORM method="POST" action="do_createtable.php">
      <INPUT type="hidden" name="table_name" value="<?php echo "$table_name";?>"/>
      <table cellspacing=5 cellpadding=5>
        <tr>
          <th>FIELD NAME</th><th>FIELD TYPE</th><th>FIELD LENGTH</th>
        </tr>
        <?php
        for ($i = 0 ; $i < $num_fields ; $i++) {
          echo "
          <tr>
          <td align = center>
          <input type=\"text\" name=\"field_name[]\" size=\"30\">
          </td>
          
          <td align=center>
          <select name=\"field_type[]\">
          <option value=\"float\">float</option>
            <option value=\"int\">int</option>
            <option value=\"text\">text</option>
            <option value=\"varchar\">varchar</option>
          </select>
          </td>
          
          <td align=center>
          <input type=\"text\" name=\"field_length[]\" size=\"5\">
          </td>
          </tr>";
        }
        ?>
        <tr>
        <td align=center colspan=3>
          <input type="submit" value="Create Table">
        </td>
        </tr>
      </table>
    </FORM>

  </BODY>
</HTML>