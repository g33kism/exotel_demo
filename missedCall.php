<?php
//http://support.exotel.in/support/solutions/articles/48283-working-with-passthru-applet
$file = fopen("missed calls.html","a");
fwrite($file,"CallSid:".$_GET["CallSid"]."From:".$_GET["From"]."<br/>\n");
fclose($file);
?>