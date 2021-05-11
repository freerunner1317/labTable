<!doctype html>
<html>

<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/style.css">
</head>

<body>
<?php
echo "<table class='table'";

  	$name_colums = array('Фамилия','Имя','Дата рождения','Номер группы');
  	$inputfile = file("input.txt");

  	echo "<thead>";
	  	echo "<tr>";
	  	foreach ($name_colums as $value) {
	   		echo "<th>".$value."</th>";
		}
		echo "</tr>";
	echo "</thead>";

	echo "<tbody>";
		foreach ($inputfile as $line) {
			echo "<tr>";
			$line_split = explode(";", $line);
			foreach ($line_split as $line_split_values) {
				echo "<td>".$line_split_values."</td>";
			}
			echo "</tr>";
		}
	echo "</tbody>";
echo "</table>";
echo "<select class='box'>";
    for ($n = 1; $n  <= 30; $n++) 
    { 
    	$color = substr(md5(rand()), 0, 6);
   		echo "<option>$color</option>";
    }
echo "</select>";

?>
</body>
</html>
