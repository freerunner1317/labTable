<!doctype html>
<html>

<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/style.css">
</head>

<body id="body">     
	<div id="tableAppearence"></div>

	<div class="selectBox">
		<p>Цвет фона</p>
		<select class='box' id="box" onchange="changeBackgrColor()">
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
				<p style="text-align: center;"><b>Шрифт шапки</b></p>
				    <p><input name="radButHead" type="radio" value="5"> Микроскопический</p>
				    <p><input name="radButHead" type="radio" value="10"> Маленький</p>
				    <p><input name="radButHead" type="radio" value="15" checked> Норм</p>		    
			    <p style="text-align: center;"><input type="button" onclick="radioButtonHead()" value="Выбрать"></p>
		  	</form> 
		 </div> 

		 <div class="checkBox">	
			<form>				
				<p style="text-align: center;"><b>Шрифт тела</b></p>
				    <p><input name="radButBody" type="radio" value="5"> Микроскопический</p>
				    <p><input name="radButBody" type="radio" value="10"> Маленький</p>
				    <p><input name="radButBody" type="radio" value="15" checked> Норм</p>		    
			    <p style="text-align: center;"><input type="button" onclick="radioButtonBody()" value="Выбрать"></p>
		  	</form> 
		 </div>  		 		
	</div>	
</body>
	<script type="text/javascript">
		function changeBackgrColor(){
			var sel = document.getElementById("box");
			var text= sel.options[sel.selectedIndex].text;

			document.getElementById('body').style.backgroundColor = text;
		}

		function radioButtonHead() {
		  var rad=document.getElementsByName('radButHead');
		  for (var i=0;i<rad.length; i++) {
		    if (rad[i].checked) {
		      //alert('Выбран '+rad[i].value+' radiobutton');
		      document.getElementById('tHead').style.fontSize = rad[i].value +"px";
		    }
		  }
		}

		function radioButtonBody() {
		  var rad=document.getElementsByName('radButBody');
		  for (var i=0;i<rad.length; i++) {
		    if (rad[i].checked) {
		      //alert('Выбран '+rad[i].value+' radiobutton');
		      document.getElementById('tBody').style.fontSize = rad[i].value +"px";
		    }
		  }
		}

		function refreshTable(str) {
		  if (str=="") {
		    document.getElementById("tableAppearence").innerHTML="";
		    return;
		  }
		  var xmlhttp=new XMLHttpRequest();
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("tableAppearence").innerHTML=this.responseText;
		    }
		  }
		  xmlhttp.open("GET","table.php?column="+str,true);
		  xmlhttp.send();
		}
		refreshTable(1);
	</script>  
</html>
