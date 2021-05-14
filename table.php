

<table class='table' id="table">
	<?php
		$typeSort = (int)$_GET['typesort'];		

	  	$name_colums = array('Фамилия','Имя','Дата рождения','Номер группы');
	  	$inputfile = file("input.txt");

	  	foreach ($inputfile as $key => $line) {
	  		$splitLines[$key] = explode(";", $line);
	  		foreach ($splitLines[$key] as $sellKey => $sell) {
	  			$TranspSplitLines[$sellKey][$key] = $sell;
	  		} 
	  		$allFile[$key]["second_name"] = $splitLines[$key][0];
	  		$allFile[$key]["first_name"] = $splitLines[$key][1];
	  		$allFile[$key]["birthday"] = $splitLines[$key][2];
	  		$allFile[$key]["group_number"] = $splitLines[$key][3];

	  		$second_name[$key] = $splitLines[$key][0];
	  		$first_name[$key] = $splitLines[$key][1];
	  		$birthday[$key] = $splitLines[$key][2];
	  		$group_number[$key] = $splitLines[$key][3];
	  	}

	  	if ($typesort < 2)
	  		$typeSortNext ++;
	  	
	  	echo $_COOKIE['typeSortCoo'];	

	  	var_dump($typeSort);
	  	//var_dump(SORT_DESC);
	  	//$typeSort = ($_GET['typesort'] == 'SORT_DESC') ? SORT_DESC : SORT_ASC;
	  	if (($typeSort == 2) or ($typeSort == 3))
	  		array_multisort($group_number, $typeSort , $allFile);

	  	echo "</br>";

	    foreach ($allFile as $value) {
	   		foreach ($value as $valueInner) {
	   			echo $valueInner;
	    	}
	    	echo "</br>";
	   	}
	    
	  	
	?>
	<thead id="tHead">
		<tr>
		<?			
		  	foreach ($name_colums as $key => $value) {
		   		echo "<th> <input type='button' onclick='refreshTable($key + 1, $typeSortNext)' value='$value'> </th>";
			}
		?>		
		</tr>
	</thead>
	<tbody id="tBody">
	<?
		foreach ($allFile as $line) {
			echo "<tr>";
			//$line_split = explode(";", $line);
			foreach ($line as $line_split_values) {
				echo "<td>".$line_split_values."</td>";
			}
			echo "</tr>";
		}
	?>		
	</tbody>
</table>

