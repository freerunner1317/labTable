
<table class='table' id="table">
	<?php
		$typeSort = (int)$_GET['typesort'];	
		$column =	(int)$_GET['column'];	
		$symbol = array("","", "🠓", "🠑");

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

	  		$splitColums[0][$key] = $splitLines[$key][0];
	  		$splitColums[1][$key] = $splitLines[$key][1];
	  		$splitColums[2][$key] = strtotime($splitLines[$key][2]);
	  		$splitColums[3][$key] = $splitLines[$key][3];
	  	}

			
	  	/*
	  	var_dump(SORT_NUMERIC);
	  	//var_dump(SORT_DESC);
	  	$typeSortData = ($_GET['typesort'] == 2) ? SORT_DESC : SORT_ASC;
	  	var_dump($typeSortData);
		*/

	  	if (($column == 2) && ($typeSort != 1))
	  		array_multisort($splitColums[$column],(($_GET['typesort'] == 2) ? SORT_DESC : SORT_ASC), SORT_NUMERIC, $allFile);
	  	elseif ($typeSort != 1)
	  		array_multisort($splitColums[$column], $typeSort, $allFile);


	  	if ($typeSort < 3)
	  		$typeSort ++;	  	
	  	else 
	  		$typeSort = 1;
	  	
	  	/*
	  	echo "</br>";
	    foreach ($allFile as $value) {
	   		foreach ($value as $valueInner) {
	   			echo $valueInner;
	    	}
	    	echo "</br>";
	   	}
	    */
	  	
	?>
	<thead id="tHead">
		<tr>
		<?			
		  	foreach ($name_colums as $key => $value) {
		   		echo "<th> <input type='button' onclick='refreshTable($key, $typeSort)' value='$value'> <div id='id_$key'style='font-size: 25px; display: inline-block;'></div> </th>";
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
