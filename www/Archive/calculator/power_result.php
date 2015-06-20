<!DOCTYPE HTML PUBLIC "-//W3C//DCT HTML 4.0 Transitional//EN">
<HTML>
  <HEAD>
    <TITLE>Power Calculator Results</TITLE>
  </HEAD>
  <BODY>
    <?php

$result = 1;

/* Used this before finding out about pow(); functionality by creating a functional exponent calculator that accepted integer input
function Legit_Answer($result) {
  $y_power_unmodified = $_POST[y_power];
  while($_POST[y_power] >= 1) {
    $result = $_POST[x_power] * $result;
    $_POST[y_power]--;
  }
    echo "<H1 align=center>You chose to raise $_POST[x_power] to the power of $y_power_unmodified to get $result.</H1>";
}
*/

function Power($result) {
  $result = pow($_POST['x_power'],$_POST['y_power']);
  echo  "<H1 align=center>You chose to raise $_POST[x_power] to the power of $_POST[y_power] to get $result.</H1>";
  echo '<HTML>
        <H1 align=center>
    <FORM method="POST" action="advanced_calculator_menu.html">
          <INPUT type="submit" value="Reset">
            </FORM>
      </H1>
    <HTML>';  
  exit;
}

if ($_POST['x_power'] == "" || $_POST['y_power'] == "") {
  echo "<H1 align=center>You are not asking legit questions!</H1>";
  echo '<HTML>
        <H1 align=center>
    <FORM method="POST" action="advanced_calculator_menu.html">
          <INPUT type="submit" value="Reset">
            </FORM>
      </H1>
    <HTML>';
  exit;
} if ($_POST['x_power'] == "e") {
  $_POST['x_power'] = M_E;
} if ($_POST['x_power'] == "pi") {
  $_POST['x_power'] = M_PI;
} if ($_POST['y_power'] == "e") {
  $_POST['y_power'] = M_E;
} if ($_POST['y_power'] == "pi") {
  $_POST['y_power'] = M_PI;
} else {
  Power($result);
}

Power($result);

?>

</BODY>
</HTML>