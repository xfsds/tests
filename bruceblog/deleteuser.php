<?php
include 'functions.php';

$username =$error= "";

if(isset($_GET['account']))
{
	$username = sanitizeString ( $_GET['account'] );

	if ($username == "") {
		$error = "����Ϊ�գ�";
	} else {
		$query = " delete from user where account = '$username'";

		if (mysql_num_rows ( queryMysql ( $query ) ) == 0) {
			$error = "ɾ��ʧ�ܣ�";
		} else {
			$error = "ɾ���ɹ���";
		}
		
		redirect('userlist.php');
	}
}

?>