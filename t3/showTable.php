<?php

function showTable($result, $columnCnt, $columnHeader, $columnWidth)
{
	$resultRow = $result->num_rows;	?>
	<table class="table">

		<tr bgcolor="#dddddd">
		<?php for ($j=0;$j<$columnCnt;$j++)
		{	?>
			<td width="
			<?php echo $columnWidth[$j]; ?>
			">
			<?php echo $columnHeader[$j]; ?>
			<?php //echo $j; ?>
			</td>	
		<?php	}	?>
		</tr>

		
		<?php	for ($i=0;$i<$resultRow;$i++)
		{
			$row = $result->fetch_row();		?>
			<tr bgcolor="#eeeeee">			
			<?php	for ($j=0;$j<$columnCnt;$j++)
			{	?>
				<td>					
					<?php	echo $row[$j];	?>
				</td>
			<?php	}	?>
			</tr>			
		<?php	}	?>

	</table>
	
<?php	}	?>
