<?php
# ----------------------------------------------------
# ----- List Builder
# ----- Version 1.0
# ----- Created on: 08/10/2013
# ----- Designed by: HtmlGifted
# ----- http://www.jeremyahenry.com
# ----- Please feel free to modify this script for your own purpose.
# ----- If you found this little script helpful, send me an email!
# ----- ENJOY!!!
# ----------------------------------------------------


include("header.html");
// Receiving variables
@$email = addslashes($_POST['email']);

// Validation
if (! ereg('[A-Za-z0-9_-]+\@[A-Za-z0-9_-]+\.[A-Za-z0-9_-]+', $email))
{
die("<p align='center'><font face='Arial' size='3' color='#FFFFFF'>Please enter a valid email</font></p>");
}

if (strlen($email) == 0 )
{
die("<p align=\"center\"><font face=\"Vrinda\" size=\"4\"color=\"#FFFFFF\">email is empty </font></p>");
}

//Sending Email to form owner
# Email to Owner 
$pfw_header = "From: $email";
$pfw_subject = "Hello";
$pfw_email_to = "email@address.com";
$pfw_message = "email: $email\n"
. "Thank You For Your eMail";
@mail($pfw_email_to, $pfw_subject ,$pfw_message ,$pfw_header ) ;

//Sending auto respond Email to user
# Email to Owner 
$pfw_header = "From: email@address.com";
$pfw_subject = "Comfirmation";
$pfw_email_to = "$email";
$pfw_message = "This is to confirm we have gotten your email.";
@mail($pfw_email_to, $pfw_subject ,$pfw_message ,$pfw_header ) ;

//saving record in a text file
$pfw_file_name = "email-file.txt";
$pfw_first_raw = "email\r\n";
$pfw_values = "$email\r\n";
$pfw_is_first_row = false;
if(!file_exists($pfw_file_name))
{
 $pfw_is_first_row = true ;
}
if (!$pfw_handle = fopen($pfw_file_name, 'a+')) {
 die("Cannot open file ($pfw_file_name)");
 exit;
}
if ($pfw_is_first_row)
{
  if (fwrite($pfw_handle, $pfw_first_raw ) === FALSE) {
  die("Cannot write to file ($pfw_filename)");
  exit;
  }
}
if (fwrite($pfw_handle, $pfw_values) === FALSE) {
  die("Cannot write to file ($pfw_filename)");
  exit;
}
fclose($pfw_handle);

 echo("<p align='center'><font face='Arial' size='3' color='#FFFFFF'>Thanks for the email</font></p>");
include("footer.html");
?>
