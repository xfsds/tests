<?php

	function GetBusinessStage(&$info)
	{		
		$query = 'select * from business_stage';			
		return ($info = $_SESSION['db']->query($query));
	}

?>