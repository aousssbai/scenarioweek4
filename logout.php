<?php
//include config
require('includes/config.php');

//log user out
$user->logout();
header('Location: admin/login.php'); 

?>