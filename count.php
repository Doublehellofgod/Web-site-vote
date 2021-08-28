<?php include 'db.php';

@mysqli_query($db,'set character_set_results="utf8"');
$visitor_ip=$_SERVER['REMOTE_ADDR'];
//////////////////
$G=$_GET['id_tema'];

$date=date("Y-m-d");

$res=mysqli_query($db,"SELECT `ip_address` FROM `ips` WHERE `id_tema`='$G'") or die ("Проблема при подключении к БД");

if(mysqli_num_rows($res)==0)
{
    //mysqli_query($db,"DELETE FROM `ips`");
    mysqli_query($db,"INSERT INTO `ips` SET `ip_address`='$visitor_ip',`id_tema`='$G'");
    $res_count=mysqli_query($db,"INSERT INTO `visits` SET `date`='$date',`hosts`=1,`views`=1,`id_tema`='$G'");
    
     
    $sql="SELECT * FROM `cheice` WHERE `id_tema`='$G'";
$result1=$con->query($sql); 
	if($result1->num_rows>0) { 
        while($row_cheice =$result1->fetch_assoc())
        { $b=$row_cheice['id'];
    if(isset($_GET["$b"]))
    {
        $res_cd=mysqli_query($db,"UPDATE  `cheice` SET `sum`=1 WHERE `id`='$b'");
    
    } 

        }}

    
}

else
{
    $current_ip=mysqli_query($db,"SELECT `ip_id`,`id_tema` FROM `ips` WHERE `ip_address`='$visitor_ip' AND `id_tema`='$G'");
    if(mysqli_num_rows($current_ip)==1)
    {
        mysqli_query($db,"UPDATE  `visits` SET `views`=`views`+1 WHERE `id_tema`='$G'");

        
    }
    else
    {
        mysqli_query($db,"INSERT INTO `ips` SET `ip_address`='$current_ip',`id_tema`='$G'");
        mysqli_query("UPDATE  `visits` SET `hosts`=`hosts`+1,`views`=`views`+1 WHERE `id_tema`='$G'");

         
    $sql="SELECT * FROM `cheice` WHERE `id_tema`='$G'";
    $result1=$con->query($sql); 
        if($result1->num_rows>0) { 
            while($row_cheice =$result1->fetch_assoc())
            { $b=$row_cheice['id'];
                if(isset($_GET["$b"]))
    {
        $res_c=mysqli_query($db,"UPDATE  `cheice` SET `sum`=`sum`+1 WHERE `id`='$b' ");
    
    }
} 
}
        
    

    }
}
?>

