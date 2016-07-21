<?php
//http://support.exotel.in/support/solutions/articles/48285-greeting-using-dynamic-text-or-audio-from-url
$file = fopen("calls.html","a");
fwrite($file,"CallSid:".$_GET["CallSid"]."From:".$_GET["From"]);
fclose($file);
echo "Your Verification code is ".rand(1, 9)." ".rand(1, 9)." ".rand(1, 9)." ".rand(1, 9);
header('Content-Type: text/plain');
?>