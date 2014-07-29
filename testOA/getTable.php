<?php

	function GetTable($tableName, &$info)
	{		
		$query = 'select * from ' . $tableName;			
		return ($info = $_SESSION['db']->query($query));
	}

?>