<table class='table' id="table">
	<?php
	  	$name_colums = array('Фамилия','Имя','Дата рождения','Номер группы');
	  	$inputfile = file("input.txt");

	  	foreach ($inputfile as $key => $line) {
	  		$splitLines[$key] = explode(";", $line);
	  		$firstName[$key] = $splitLines[$key][0];
	  		$lastName[$key] = $splitLines[$key][1];
	  		$birthday[$key] = $splitLines[$key][2];
	  		$groupNumber[$key] = $splitLines[$key][3];
	  	}

	
	  	foreach ($groupNumber as $key => $value) {
	  		echo $value;
	  	}	
	  	echo "</br>";

	    foreach ($TranspSplitLines as $value) {
	   		foreach ($value as $valueInner) {
	   			echo $valueInner;
	    	}
	    	echo "</br>";
	   	}
	    
	  	
	?>
	<thead id="tHead">
		<tr>
		<?			
		  	foreach ($name_colums as $value) {
		   		echo "<th>".$value."</th>";
			}
		?>		
		</tr>
	</thead>
	<tbody id="tBody">
	<?
		foreach ($inputfile as $line) {
			echo "<tr>";
			$line_split = explode(";", $line);
			foreach ($line_split as $line_split_values) {
				echo "<td>".$line_split_values."</td>";
			}
			echo "</tr>";
		}
	?>		
	</tbody>
</table>

