<!DOCTYPE html>

<html lang="ru">

<head>
<meta charset="UTF-8">

<meta http-equiv='Refresh' content='0; url=index.php'>
 
<meta name="description" content="краткое описание">
<link rel="stylesheet" href="style.css">
<title></title>

</head>

<body>
    <?php
     include 'db.php';
     $servername="localhost";
    $username="root";
    $password="";
$con= new mysqli($servername,$username,$password,"bdlab3"); 
if(isset($_GET['end']))//Удалить все темы
{
    mysqli_query($db,"DELETE FROM `num`"); 
    mysqli_query($db,"DELETE FROM `cheice`");
    mysqli_query($db,"DELETE FROM `ips`"); 
    mysqli_query($db,"DELETE FROM `visits`"); 
    
 } 
if(isset($_GET['del_tema']))//Удаление темы
{
$c1=$_GET['name'];   
mysqli_query($db,"DELETE FROM `num` WHERE `name`='$c1'");
$c1=$_GET['id_tema'];
mysqli_query($db,"DELETE FROM `cheice` WHERE `id_tema`='$c1'");
mysqli_query($db,"DELETE FROM `ips` WHERE `id_tema`='$c1'");
mysqli_query($db,"DELETE FROM `visits` WHERE `id_tema`='$c1'");
}

if(isset($_GET['redact_tema']))//Изменение темы
{  
$c1=$_GET['id_tema'];
$c3=$_GET['newtema'];
mysqli_query($db,"UPDATE  `num` SET `name`='$c3' WHERE `id_tema`='$c1'"); 
}

if(isset($_GET['addname']) and $_GET['aa']!="")//Добавление темы
{ 
$e=$_GET['aa'];  
mysqli_query($db,"INSERT INTO `num` (`numer`, `name`) VALUES (0,'$e')"); 
}
if(isset($_GET['add']) and $_GET['aa']!="")//Добавление варианта
{
$c2=$_GET['id_tema'];
$c1=$_GET['aa'];

mysqli_query($db,"UPDATE  `num` SET `numer`=`numer`+1 WHERE `id_tema`='$c2'");
mysqli_query($db,"INSERT INTO `cheice` (`id_tema`, `name`) VALUES ('$c2','$c1')");
}
if(isset($_GET['redact']))//Изменить вариант
{
$c1=$_GET['id'];
$c3=$_GET['new_checkbox'];
mysqli_query($db,"UPDATE  `cheice` SET `name`='$c3' WHERE `id`='$c1'"); 
}
if(isset($_GET['del']))//Удаление варианта
{   
$c2=$_GET['id'];
$res=mysqli_query($db,"SELECT `id` FROM `cheice` WHERE `id`='$c2'");
$row=mysqli_fetch_assoc($res);
$a=$row['id'];

mysqli_query($db,"UPDATE  `num` SET `numer`=`numer`-1 WHERE `numer`='$c2'");
mysqli_query($db,"DELETE FROM  `cheice` WHERE  `id`='$a'"); 

} 
?>
</body>

</html>