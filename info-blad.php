<?php 

if(isset($_GET['info'])){
	echo '<div style="text-align: center; height: 30px; color: green">';
	echo $_GET['info'];
	echo "</div>";
} 		

if(isset($_GET['blad'])){
	echo '<div style="text-align: center; height: 30px; color: red">';
	echo $_GET['blad'];
	echo "</div>";
}
		
?>