<?php 
if (preg_match("/MSIE/i", "$_SERVER[HTTP_USER_AGENT]")) {
  echo "Using MSIE.";
} else if (preg_match("/Mozilla/i", "$_SERVER[HTTP_USER_AGENT]")) {
  echo "Using Netscape.";
} else {
  echo "$_SERVER[HTTP_USER_AGENT]";
}

if (preg_match("/MSIE/i", "$_SERVER[HTTP_USER_AGENT]")) {
  echo "<LINK REV=\"stylesheet\" HREF=\"msie_style.css\">.";
} else if (preg_match("/Mozilla/i", "$_SERVER[HTTP_USER_AGENT]")) {
  echo "<LINK REV=\"stylesheet\" HREF=\"ns_style.css\">.";
} else {
  echo "<LINK REV=\stylesheet\" HREF=\"other_style.css\">.";
}
?>