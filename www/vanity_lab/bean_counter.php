<!DOCTYPE HTML PUBLIC "-//W3C//DCT HTML 4.0 Transitional//EN">
<HTML>
  <HEAD>
    <TITLE>Bean Counter Results</TITLE>
  </HEAD>
  <BODY>

    <FORM METHOD="POST" ACTION="go.php">
<input type="radio" name="like_coffee" value="yes" checked> yes
<input type="radio" name="like_coffee" value="no"> no <br>
      
<input type="radio" name="like_something_else" value="no" checked> something_else
<input type="radio" name="like_something_else" value="maybe"> other_thing <br>
      
<select name="year" size="1">
  <option value="2003" selected>2003</option>
  <option value="2004">2004</option>
  <option value="2005">2005</option>
    </select> <br>

<input type="submit" NAME="submitme" VALUE="SUBMIT">    
    </FORM>    
    
<?PHP
$fave_colors = array("1st" => "blue", "2nd" => "black", "3rd" => "red");
foreach ($fave_colors as $key => $value) {
  
  echo "Key: $key ... Value: $value<br>";
}
?>
    
<?php
class SimpleClass
{
    // property declaration
    public $var = 'a default value';

    // method declaration
    public function displayVar() {
        echo $this->var;
    }
}
SimpleClass::displayvar();
?>
    
</BODY>
</HTML>