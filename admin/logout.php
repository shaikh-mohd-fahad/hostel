<?php
session_start();
session_destroy();
setCookie("admin_id",$row16['id'],time()-60*60*24*365);
setCookie("admin_name",$row16['name'],time()-60*60*24*365);
echo"<script> location.href='login.php';</script>";

?>