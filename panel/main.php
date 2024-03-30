<?php
$text = $_GET["text"];
$level_1 = utf8_encode($text);
$level_2 = base64_encode($level_1);
$level_3 = md5($level_2 , true);
$level_4 =  sha1($level_3,true);
echo $level_4;  
