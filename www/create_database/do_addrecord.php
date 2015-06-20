<?php
if (!$_POST['item_id'] || (!$_POST['item_title']) || (!$_POST['item_desc']) || (!$_POST['item_price'])) {
  header("Location: http://muscular-riverrun-98-174954.usw1.nitrousbox.com/create_database/show_addrecord.html");
  exit;
} else {
  $item_id = $_POST['item_id']
  $item_title = $_POST['item_title']
  $item_desc = $_POST['item_desc']
  $item_price = $_POST['item_price']
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
  <HEAD>
    <TITLE>Add a Record</TITLE>
  </HEAD>
  <BODY>

    <h1>Adding a record to MY_PRODUCTS</h1>
    <?php
    $sql = "INSERT INTO MY_PRODUCTS (ITEM_ID, ITEM_TITLE, ITEM_DESC, ITEM_PRICE) VALUES ('$item_id', '$item_title', '$item_desc', '$item_price')";

    //database interaction

    $conn = mysqli_connect("localhost","mamatt","mamatt.123","facility") or die(mysqli_error($conn));
      
    $db = mysqli_select_db($conn, "test") or die(mysqli_error($conn));

    $sql_result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($sql_result) {
      echo "
      <P>Record added!</P>
      <table cellspacing=5 cellpadding=5>
      <tr>
      <td valign=top><strong>Item ID:</strong></td>
      <td valign=top>".stripslashes($item_id)."</td>
      </tr>
      <tr>
      <td valign=top><strong>Item Title:</strong></td>
      <td valign=top>".stripslashes($item_title)."</td>
      </tr>
      <tr>
      <td valign=top><strong>Item Description:</strong></td>
      <td valign=top>".stripslashes($item_desc)."</td>
      </tr>      
      <tr>
      <td valign=top><strong>Item Price:</strong></td>
      <td valign=top>".stripslashes($item_price)."</td>
      </tr>      
      </table>";
    }
    ?>

  </BODY>
</HTML>