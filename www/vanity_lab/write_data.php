<?PHP
$newfile = fopen("mydata.txt", "a+");
fwrite($newfile, "\nThis is an old file.");
fclose($newfile);
echo "All done!";
?>