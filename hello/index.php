
<?php echo '123'; ?>

<form action="test.php" method="post">

	<table border="0">
		<tr bgcolor="#cccccc">
			<td width="150">item</td>
			<td width="15">quantity</td>
		</tr>
		<tr>
			<td>tires</td>
			<td align="center"><input type="text" name="tireqty" size="3" maxlength="3"></></td>
		</tr>
		<tr>
			<td>oil</td>
			<td align="center"><input type="text" name="oilqty" size="3" maxlength="3"></></td>
		</tr>
		<tr>
			<td>spark</td>
			<td align="center"><input type="text" name="sparkqty" size="3" maxlength="3"></></td>
		</tr>
		<tr>
			<td>test</td>
			<td> <select name="find">
				<option value="a">text1</option>
				<option value="b">text2</option>
				<option value="c">text3</option>
				<option value="d">text4</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" value="Submit All"></></td>
		</tr>
	</table>
</form>