﻿<html>
	<head>
		<title>Anhui Anrui Detection Technology Co., Ltd.</title>
	</head>

	<style>
		#center	{
			background: #bbb;
			width: 1000px;
			margin: 10px auto;
		}
	</style>

	<?php


	require("customer.php");
	require("showTable.php");
	require("getBusinessStage.php");
	//require("addCustomerHuman.php");
	require("getTable.php");

	session_start();
	$_SESSION['test'] = 123;

	@ $_SESSION['db'] = new mysqli('localhost','gb_db_admin','12345','guarantee_business_db');

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

	echo "<hr/>";
	
	if (Customer::GetCustomerTypeInfo($result))
	{
		echo "<p align=\"center\">Query successful</p>";
		$columnWidth = array(100,150);
		$columnHeader = array('ID','描述');
		showTable($result,2,$columnHeader,$columnWidth);
	}
	else
	{
		echo "<p align=\"center\">";
		echo $_SESSION['db']->error;
		echo '</p>';
	}

	echo "<hr/>";
	
	if (getBusinessStage($result))
	{
		echo "<p align=\"center\">Query successful</p>";
		$columnWidth = array(100,150,200);
		$columnHeader = array('阶段','业务种类','描述');
		showTable($result,3,$columnHeader,$columnWidth);
	}
	else
	{
		echo "<p align=\"center\">";
		echo $_SESSION['db']->error;
		echo '</p>';
	}
	
	echo "<p align=\"center\">";
	echo '</p>';

	?>
	<hr/>
	<form action="addCustomerHuman.php" method="post">
		<table border="0" align="center">

			<tr bgcolor="#dddddd">
				<td width="150">
					项
				</td>
				<td width="100">
					值
				</td>
			</tr>

			<tr bgcolor="#eeeeee">
				<td>
					姓名
				</td>
				<td align="center"><input type="text" name="name" size="20" maxlength="10"></td>
			</tr>

			<tr bgcolor="#eeeeee">
				<td>
					年龄
				</td>
				<td align="center"><input type="text" name="age" size="20" maxlength="3"></td>
			</tr>

			<tr bgcolor="#eeeeee">
				<td>
					证件种类
				</td>
				<td align="center">
					<select name="idType">
						<option value="身份证">身份证</option>
						<option value="驾驶证">驾驶证</option>
						<option value="护照">护照</option>
						<option value="军官证">军官证</option>
					</select>
				</td>
			</tr>

			<tr bgcolor="#eeeeee">
				<td>
					证件号码
				</td>
				<td align="center">
					<input type="text" name="idNo" size="20" maxlength="10">
				</td>
			</tr>

			<tr bgcolor="#dddddd">
				<td align="center" colspan="2"><input type="submit" value="添加"></td>
			</tr>

		</table>
	</form>
	<hr/>

	<?php

	if (GetTable("customer_human",$result))
	{
		echo "<p align=\"center\">Query successful</p>";
		$columnWidth = array(100,150,100,150,200);
		$columnHeader = array('ID','姓名','年龄','证件种类','证件号码');
		showTable($result,5,$columnHeader,$columnWidth);
	}
	else
	{
		echo "<p align=\"center\">";
		echo $_SESSION['db']->error;
		echo '</p>';
	}
	
	?>



</html>