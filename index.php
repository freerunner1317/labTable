<!doctype html>
<html>

<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/style.css">
</head>

<body id="body">     
	<table class='table'>
		<?php
		  	$name_colums = array('Фамилия','Имя','Дата рождения','Номер группы');
		  	$inputfile = file("input.txt");
		?>
		<thead>
			<tr>
			<?			
			  	foreach ($name_colums as $value) {
			   		echo "<th>".$value."</th>";
				}
			?>		
			</tr>
		</thead>
		<tbody>
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
	<div class="selectBox">
		<p>Цвет фона</p>
		<select class='box' id="box" onchange="change()">
		<?
		    for ($n = 1; $n  <= 30; $n++) 
		    { 
		    	$color = "#".(string)substr(md5(rand()), 0, 6);	    	
		   		echo "<option>$color</option>";	 		   		
		    }
		?>
		</select>
	</div>	
	<div class="checkBoxWrap">
		<div class="checkBox">	
			<form>				
				<p style="text-align: center;"><b>Шрифт</b></p>
				    <p><input name="dzen" type="radio" value="nedzen"> Микроскопический</p>
				    <p><input name="dzen" type="radio" value="dzen"> Маленький</p>
				    <p><input name="dzen" type="radio" value="pdzen" checked> Норм</p>		    
			    <p style="text-align: center;"><input type="button" value="Выбрать"></p>
		  	</form> 
		 </div>  		
	</div>	
</body>
	<script type="text/javascript">
		function change(){
			var sel = document.getElementById("box");
			var text= sel.options[sel.selectedIndex].text;

			document.getElementById('body').style.backgroundColor = text;
		}
	</script>  
</html>
