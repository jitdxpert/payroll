<?php

define('BASE_URL', 	   'http://localhost/payroll/');
define('REG_URL', 	   'http://localhost/payroll/registration/');
define('COMPANY_NAME', 'Wisely Online Services Private Limited');

// MySQL Database Details
define('DB_SERVER', 	'localhost');
define('DB_USER', 		'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 		'wisely');
define('DB_PREFIX', 	'wy_');

// Email Constant
define("PHPMAILER_SMTPSECURE", 	 "ssl");
define("PHPMAILER_HOST", 		     "soumitrapaul.com");
define("PHPMAILER_PORT", 		     "465");
define("PHPMAILER_USERNAME", 	   "info@soumitrapaul.com");
define("PHPMAILER_PASSWORD", 	   "wiselydevteam101");
define("PHPMAILER_FROM", 		     "info@soumitrapaul.com");
define("PHPMAILER_FROMNAME", 	   "Wisely Online Services Private Limited");
define("PHPMAILER_WORDWRAP", 	   "50");

ini_set("display_errors", 0);

date_default_timezone_set("Asia/Kolkata");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
if ( mysqli_connect_errno() ) {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}

session_start();

include(dirname(__FILE__) . '/mpdf60/mpdf.php');
$mpdf = new mPDF();
include(dirname(__FILE__) . '/functions.php');

if ( isset($_SESSION['Admin_ID']) && isset($_SESSION['Login_Type']) )
  $userData = GetDataByIDAndType($_SESSION['Admin_ID'], $_SESSION['Login_Type']);
else
  $userData = array();
