
<!DOCTYPE html>

<html lang="ru">

<head>
<meta charset="UTF-8">

<meta name="keywords" content="сайт, мой">
<meta name="description" content="краткое описание">
<link rel="stylesheet" href="style.css">
<title>Site 3</title>

	
		
</head>

<body>

	<form action="add.php" method="get">
	<input name="a"  type="text" >Comanda<br>
	<input name="b"  type="text" >teacher<br>
	<input name="c"  type="text" >Igroci<br>
	<input name="d"  type="text" >Stat_game<br>
	<input name="e"  type="text" >Stat_igroci<br>
	<input type="submit" value="Добавить в таблицу">
	</form>
	<form action="update.php" method="get">
	<input name="a"  type="text" >Comanda<br>
	<input name="b"  type="text" >teacher<br>
	<input name="c"  type="text" >Igroci<br>
	<input name="d"  type="text" >Stat_game<br>
	<input name="e"  type="text" >Stat_igroci<br>

	<input name="f"  type="text" > название столбца<br>
	<input name="g"  type="text" >название ячейки столбца<br>
	<input type="submit" value="Изменить таблицу">
	</form>
	<form action="delete.php" method="get">
	<input name="aa"  type="text" >название столбца<br>
	<input name="bb"  type="text" >название ячейки столбца<br>
	<input type="submit" value="Удалить из таблицы">
	</form>
    
	
</body>

</html>
<?php
$servername="localhost";
$username="root";
$password="";
$conn= new mysqli($servername,$username,$password,"bdlab3");
$a=$_GET['a'];
$b=$_GET['b'];
$c=$_GET['c'];
$d=$_GET['d'];
$e=$_GET['e'];
if($a!="" and $b!="" and $c!=""and $d!=0 and $e!=0)
{$sql="INSERT INTO voleiboll(Comanda, Trener, Igroci, Stat_game, Stat_igroci) VALUES ('$a','$b','$c','$d','$e')";
if($conn->query($sql) === TRUE)
{
echo "Zapis sozdana";
}
}
?>

<?php

	
	$servername="localhost";
	$username="root";
	$password="";
	$conn= new mysqli($servername,$username,$password);
	if ($conn->connect_error) {
	
		echo "Error".connect_error;
		exit();
	}
	echo "win";
	$con= new mysqli($servername,$username,$password,"bdlab3");
	$sql="SELECT * FROM `voleiboll`";
	$result=$con->query($sql);

	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
			echo "<br><br> Comanda:>".$row["Comanda"]."<br> teacher:>".$row["Trener"]."<br> Igroci:>".$row["Igroci"]."<br> Stat_game:>".$row["Stat_game"]."<br> Stat_igroci:>".$row["Stat_igroci"];
		}
	}

	$con->close();
	?>
