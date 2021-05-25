<? 
	if (isset($_GET['typesort']) || isset($_GET['column'])){
	   setcookie("column", $_GET['column'], time()+6);
	   setcookie("typesort", $_GET['typesort'], time()+6);
	   $typeSort = (int)$_GET['typesort'];	
	   $column =	(int)$_GET['column'];	
	}else{
	   $typeSort = (int)$_COOKIE['typesort'];	
	   $column =	(int)$_COOKIE['column'];	
	   $backColor =	 $_COOKIE['backColor'];
	}
	if(isset($_GET['backColor'])){
		setcookie("backColor", $_GET['backColor'], time()+6);
		$backColor = $_GET['backColor'];
	}else{
		$backColor = $_COOKIE['backColor'];
	}
	if(isset($_GET['fontSizeTb'])){
		setcookie("fontSizeTb", $_GET['fontSizeTb'], time()+6);
		$fontSizeTb = $_GET['fontSizeTb'];
	}else{
		$fontSizeTb = $_COOKIE['fontSizeTb'];
	}
	if(isset($_GET['tableWidth'])){
		setcookie("tableWidth", $_GET['tableWidth'], time()+6);
		$tableWidth = $_GET['tableWidth'];
	}else{
		$tableWidth = $_COOKIE['tableWidth'];
	}
	
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body id="body"> 
	<table class='table' id="table">
	<?php
		$symbol = array("","", "🠑", "🠓");
	  	$name_colums = array('Фамилия','Имя','Дата рождения','Номер группы');
	  	$inputfile = file("input.txt");

	  	foreach ($inputfile as $key => $line) {
	  		$splitLines[$key] = explode(";", $line);
	  		//foreach ($splitLines[$key] as $sellKey => $sell) {
	  		//	$TranspSplitLines[$sellKey][$key] = $sell;
	  		//} 
	  		$allFile[$key]["second_name"] = $splitLines[$key][0];
	  		$allFile[$key]["first_name"] = $splitLines[$key][1];
	  		$allFile[$key]["birthday"] = $splitLines[$key][2];
	  		$allFile[$key]["group_number"] = $splitLines[$key][3];

	  		$splitColums[0][$key] = $splitLines[$key][0];
	  		$splitColums[1][$key] = $splitLines[$key][1];
	  		$splitColums[2][$key] = strtotime($splitLines[$key][2]);
	  		$splitColums[3][$key] = $splitLines[$key][3];
	  	}

	  	setlocale(LC_ALL, 'ru_RU.UTF-8');
	  	
	  	if (($typeSort < 3) && ($typeSort != 0))
	  		$typeSort ++;	  	
	  	else 
	  		$typeSort = 2;
	  	echo $typeSort;
	  	
	  	if ($typeSort > 1){
		  	if (($column == 2) || ($column == 3))
		  		array_multisort($splitColums[$column],(($_GET['typesort'] == 2) ? SORT_ASC : SORT_DESC), SORT_NUMERIC, $allFile);
		  	else
		  		array_multisort($splitColums[$column],(($_GET['typesort'] == 2) ? SORT_ASC : SORT_DESC), SORT_STRING, $allFile);
	  	}
		
	  	
	?>
		<thead id="tHead">
			<tr>
			<?			
			  	foreach ($name_colums as $key => $value) {
			   		echo "<th><a href='index.php?column=$key&typesort=$typeSort'>$value";
			   		 if ($column == $key)
			   		 	echo "$symbol[$typeSort]";
			   		echo "</a></th>";
				}
			?>	
				
			</tr>
		
		</thead>
		<tbody id="tBody">
		<?
			foreach ($allFile as $line) {
				echo "<tr>";
				foreach ($line as $line_split_values) {
					echo "<td>".$line_split_values."</td>";
				}
				echo "</tr>";
			}
		?>		
		</tbody>
	</table>
	<form id="settings" method="GET" action="index.php">
		<div class="selectBox">
			<p>Цвет фона</p>
			<select class='box' id="box" name="backColor" value="">
			<?
			    for ($n = 1; $n  <= 30; $n++) 
			    { 
			    	$color = (string)substr(md5(rand()), 0, 6);	    	
			   		echo "<option value='$color'>$color</option>";	 		   		
			    }
			?>
			</select>
			
			<p style="text-align: center;"><input type="submit" value="Выбрать"></p>
		</div>
		
	</form>
	<div class="checkBoxWrap">
		<div class="checkBox">	
			<form method="GET" action="index.php">				
				<p style="text-align: center;"><b>Ширина таблицы</b></p>
				    <p><input name="tableWidth" type="radio" value="20%"<?echo ($tableWidth=='20%'?'checked':'')?> > 20%</p>
				    <p><input name="tableWidth" type="radio" value="50%"<?echo ($tableWidth=='50%'?'checked':'')?>> 50%</p>
				    <p><input name="tableWidth" type="radio" value="100%"<?echo ($tableWidth=='100%'?'checked':'')?>>Норм</p>		    
			    <p style="text-align: center;"><input type="submit" value="Выбрать"></p>
		  	</form> 
		 </div> 

		 <div class="checkBox">	
			<form method="GET" action="index.php">				
				<p style="text-align: center;"><b>Шрифт тела</b></p>
				    <p><input name="fontSizeTb" type="radio" value="5px"<?echo ($fontSizeTb=='5px'?'checked':'')?>> Микроскопический</p>
				    <p><input name="fontSizeTb" type="radio" value="10px"<?echo ($fontSizeTb=='10px'?'checked':'')?>> Маленький</p>
				    <p><input name="fontSizeTb" type="radio" value="15px"<?echo ($fontSizeTb=='15px'?'checked':'')?>> Норм</p>		    
			    <p style="text-align: center;"><input type="submit" value="Выбрать"></p>
		  	</form> 
		 </div>  		 		
	</div>	
</body>
<style type="text/css">	
	body {
		background-color:<?echo "#".$backColor?>;
	}
	.table td{
		font-size: <?echo $fontSizeTb?>;
	}
	.table {
		width: <?echo $tableWidth?>;
	}
</style>
</html>
