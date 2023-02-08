<?php
$to = 'miguel.rodrigues8@hotmail.com';
$subject = 'Subject to Here';
$content = 'Content to Here';
$headers = "From: greepo_tech@outlook.com\r\n";
if (mail($to, $subject, $content, $headers))
{
	echo "Success !!!";
} 
else 
{
   	echo "ERROR";
}