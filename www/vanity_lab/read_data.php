<?PHP
// this variable contains the full path to the filename
$file_loc = "mydata.txt";
// opens the file for reading only
$whattoread = fopen($file_loc, "r");
// puts the contents of the entire file into a variable
$file_contents = fread($whattoread, filesize($file_loc));
// close the file
fclose($whattoread);
//send the mail
$mailheaders = "From: My Web Site <email@domain.com> \n";
mail("alphaintec@gmail.com", "File Contents", $file_contents, $mailheaders);
echo "Check your mail!";
?>
