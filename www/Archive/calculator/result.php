<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>
  <TITLE>Calculator Results</TITLE>
</HEAD>
<BODY>
<?php

$x = $_POST['x'];
$y = $_POST['y'];
$mode = $_POST['mode'];

function PrintLegitAnswer($result) {
  echo "<H1 align=center>You chose to $mode $x and $y together to get $result.</H1>";
}

if ($x == "" || $y == "") {
  echo "<H1 align=center>You are not asking legit questions!</H1>";
} else if ($mode == "add") {
  $result = $x + $y;
  PrintLegitAnswer($result);
} else if ($mode == "subtract") {
  $result = $x - $y;
  PrintLegitAnswer($result);
} else if ($mode == "multiply") {
  $result = $x * $y;
  PrintLegitAnswer($result);
} else if ($mode == "divide") {
    if ($y == "0") {
      echo "<H1 align=center>Please do not divide by zero!</H1>";
      echo '
<H1 align=center><img src="Photos/DivideByZero.jpg" alt="Calculator" style="width:320px;height:284.5px"></H1>
'; 
    } else {
      $result = $x / $y;    
      PrintLegitAnswer($result);
    }
}

?>
  <H1 align=center>
    <FORM method="POST" action="redirect.php">
      <INPUT type="submit" value=Reset />
    </FORM>
  </H1>
</BODY>
</HTML>