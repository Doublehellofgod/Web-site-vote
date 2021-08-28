<?php 

@mysqli_query($db,'set character_set_results="utf8"');

$G=$_GET['id_tema'];
$date=date("Y-m-d");
$res=mysqli_query($db,"SELECT `views`,`hosts` FROM `visits` WHERE `id_tema`='$G'");
$row=mysqli_fetch_assoc($res);
echo '<p> Уникальный посетитель: '.$row['hosts'].'<br>';
echo 'Просмотров: '.$row['views'].'</p>';

echo '<p>';

$sql="SELECT * FROM `cheice` WHERE `id_tema`='$G'";
$result1=$con->query($sql); 
$e=0;
	if($result1->num_rows>0) { 
        while($row_cheice =$result1->fetch_assoc())
        { 
            $b=$row_cheice['id'];
    $res=mysqli_query($db,"SELECT `sum` FROM `cheice` WHERE `id`='$b'");
    $row=mysqli_fetch_assoc($res);
    $e=$e+$row['sum']; 
} 
$result1=$con->query($sql); 
$a=1;
    while($row_cheice =$result1->fetch_assoc())
{
    $b=$row_cheice['id'];
    $res=mysqli_query($db,"SELECT `sum`,`name` FROM `cheice` WHERE `id`='$b'");
    $row=mysqli_fetch_assoc($res);
    echo $a.'. '.$row['name'].'<br>';
    echo 'Голосовало: '.$row['sum'].'. Вобор в % :'.$row['sum']*100/$e.'<br><br>'; 
    $a=$a+1;
}
    }
echo '<p>'; 