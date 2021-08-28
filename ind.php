<?php include 'db.php';
if(isset($_GET['end']))
{    
    mysqli_query($db,"DELETE FROM `ips`");
    mysqli_query($db,"DELETE FROM `visits`"); 
 } 
?> 
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

<?php include 'db.php';
 $servername="localhost";
 $username="root";
 $password="";
    $con= new mysqli($servername,$username,$password,"bdlab3");  
if(isset($_GET['Tema_end']))
{
    //
    $G=$_GET['id_tema']; 
    $b=1;
    $g=0; 
    $sql="SELECT * FROM `cheice` WHERE `id_tema`='$G'";
    $result1=$con->query($sql); 
        if($result1->num_rows>0) 
        { 
            while($row_cheice =$result1->fetch_assoc())
            { 
                $b=$row_cheice['id'];
                 if(isset($_GET["$b"])){$g=$g+1;}$b=$b+1;
            }
        }
        $res=mysqli_query($db,"SELECT `name` FROM `num` WHERE `id_tema`='$G'");
    $row=mysqli_fetch_assoc($res);
        echo  'Тема: '.$row['name'];
if ($g>0){
    include 'count.php';
    include 'show_stats.php';
} 
//
}
if(isset($_GET['Tema']))
{  
    $G=$_GET['id_tema'];
$res=mysqli_query($db,"SELECT `name` FROM `num` WHERE `id_tema`='$G'");
    $row=mysqli_fetch_assoc($res);
    echo $row['name'];
    //include 'show_stats.php';
    echo '<form action="ind.php" method="get">
    <input name="id_tema" type="hidden"  value="'.$G.'">';

    $sql="SELECT * FROM `cheice` WHERE `id_tema`='$G'";
$result1=$con->query($sql); 
	if($result1->num_rows>0) { 
        while($row_cheice =$result1->fetch_assoc())
        {
        
        echo ' <input name="'.$row_cheice['id'].'"id="1"  type="checkbox" >'.$row_cheice['name'].'';
        echo '<br>'; 
}
    }
    echo '<input type="submit" name="Tema_end" value="Проголосовать">
    </form>'; 
} 
if(!isset($_GET['Tema']))
{ 
    $sql="SELECT * FROM `num`";
$result1=$con->query($sql); 
	if($result1->num_rows>0) { 
        echo 'Выберите тему:';
        while($row =$result1->fetch_assoc())
	{  
        echo '<form action="ind.php" method="get">
        <input name="id_tema" type="hidden"  value="'.$row['id_tema'].'">
        <input type="submit" name="Tema" value="'.$row['name'].'"></form>'; 
}
    }
}
    
   // echo '<p><a href="http://127.0.0.1:8080/Lab5/">Назад</a></p>';
?> 
</body>
 
</html>