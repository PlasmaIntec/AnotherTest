<?PHP
if (($_POST[sender_mail] == "") || ($_POST[message] == "")) {
  header("Location: show_feedback.html");
  exit;
}

$msg = "Sender's Full Name:\t$_POST[sender_name]\n";
$msg .= "Sender's E-Mail:\t$_POST[sender_email]\n";
$msg .= "Did You Like the Site?\t$_POST[like_site]\n";
$msg .= "Additional Messag:\t$_POST[message]\n\n";

$mailheaders = "From: My Web Site <myemail@domain.com>\n";
$mailheaders .= "Reply-To: $sender_email\n\n";

mail("alphaintec@gmail.com", "Feedback Form", $msg, $mailheaders);

echo "<H1 align=center>Thank You, $_POST[sender_name]</H1>";
echo "<P align=center>We appreciate your feedback.</P>";
?>