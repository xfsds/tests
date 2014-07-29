<?php // Example 21-1: functions.php



$dbhost  = 'localhost';    // Unlikely to require changing
$dbname  = 'mysms';       // Modify these...
$dbuser  = 'root';   // ...variables according
$dbpass  = 'duanshen';   // ...to your installation
$appname = "Bruce博客管理系统"; // ...and preference

@ $_SESSION["db"] = new mysqli($dbhost, $dbuser, $dbpass,$dbname);
//	@ $_SESSION['db'] = new mysqli('localhost','gb_db_admin','12345','guarantee_business_db');
// $_SESSION["db"]->select_db($dbname));
function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br />";
}

function queryMysql($query)
{
	
@ $_SESSION['db']->connect('localhost','admin','duanshen','mysms');
    $result = $_SESSION["db"]->query($query);
	 return $result;
}

function destroySession()
{
    $_SESSION=array();
    
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
}

function sanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return mysqli_real_escape_string($_SESSION["db"],$var);
}

function redirect($url)
{
	echo "<script type=text/javascript>window.location.href='$url';</script>";
}


?>
