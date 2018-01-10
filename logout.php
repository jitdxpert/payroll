<?php 
include(dirname(__FILE__) . '/config.php');

unset($_SESSION['Admin_ID']);
unset($_SESSION['Login_Type']);
header('location:' . BASE_URL);
exit;