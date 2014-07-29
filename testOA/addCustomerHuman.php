<?php


/*
function AddCustomerHuman($name, &$info)
{
$query = "insert into customer_human(name) values
('" . $name . "')";
return ($info = $_SESSION['db']->query($query));
}
*/
session_start();
session_commit();

//@ $_SESSION['db'] = new mysqli('localhost','gb_db_admin','12345','guarantee_business_db');
@ $_SESSION['db']->connect('localhost','gb_db_admin','12345','guarantee_business_db');

if ($_SESSION['db']->connect_errno)
{
	echo "<p align=\"center\">";
	echo $_SESSION['db']->connect_error;
	echo '</p>';
	exit;
}
else
{
	echo "<p align=\"center\">Database connected</p>";
}

$name = $_POST['name'];
$age = $_POST['age'];
$idtype = $_POST['idType'];
$id = $_POST['idNo'];

$query = "insert into customer_human(name,age,identificationType,identificationNo) values
('" . $name . "','" . $age . "','" . $idtype . "','" . $id . "')";
if ($info = $_SESSION['db']->query($query))
{
	echo "<p align=\"center\">Query successful</p>";
	echo "<p align=\"center\">" . $_SESSION['db']->affected_rows . " rows changed." . '</p>';
}
else
{
	echo '<p align=\"center\">';
	echo $_SESSION['db']->error;
	echo '</p>';
}




?>

<form action="index.php">	
	<p align="center">
		<input type="submit" value="返回">
	</p>
</form>
