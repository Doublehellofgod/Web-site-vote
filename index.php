<!DOCTYPE html>

<html lang="ru">

<head>
<meta charset="UTF-8">

<meta name="keywords" content="сайт, мой">
<meta name="description" content="краткое описание">
<link rel="stylesheet" href="style.css">
<title>Site</title>

</head>

<body>

    <?php include 'db.php';
    include 'function.php';
    //include 'functions_administrator.php';
    $servername="localhost";
    $username="root";
    $password="";
$con= new mysqli($servername,$username,$password,"bdlab3"); 

    $sql="SELECT n.name, n.id_tema, ch.name `chname`, ch.id 
    FROM `num` n  
    LEFT OUTER JOIN `cheice` ch ON ch.id_tema= n.id_tema 
    ORDER BY n.id_tema, ch.id ASC";
$result=$con->query($sql); 
	if($result->num_rows>0) { 
        $ROW="";$b=1;
        while($row=$result->fetch_assoc())
    {   
        if($ROW!=$row['name']){
           if($ROW!="") 
           {
            addval($row_prev);$b=1;
            }
            $row_prev=$row['id_tema'];$ROW=$row['name'];
           
    echo '<br><form action="functions_administrator.php" method="get">
	'.$row['name'].'<input name="name" type="hidden"  value="'.$row['name'].'">
    <input name="id_tema" type="hidden"  value="'.$row['id_tema'].'">
    <input type="submit"name ="del_tema" value="Удалить тему">  
    <input name="newtema" type="text"  value="'.$row['name'].'">
    <input type="submit"name ="redact_tema" value="Изменить тему">
    </form><br>';}//Удаление и изменение темы

////////Генерация Чекбоксов
   if($row['chname']==NULL)continue; 
        echo '<form action="functions_administrator.php" method="get">
        <input name="'.$b.' "id="1"  type="checkbox" >'.$row['chname'].'
        <input name="id" type="hidden"  value="'.$row['id'].'">
        <input type="submit"name ="del" value="Удалить">
        <input name="new_checkbox" type="text"  value="'.$row['chname'].'">
        <input type="submit"name ="redact" value="Изменить">
        </form><br>'; $b=$b+1;
         
    }addval($row_prev);} 
    
    ///////////////
    ?>
    <br>
    <form action="functions_administrator.php" method="get"> 
    <input name="aa"   type="text" value=""> 
    <input type="submit"name ="addname" value="добавить тему">
    </form><br> <?//Добавление темы ?> 

    <form action="ind.php" method="get">
	<input type="submit" value="Создать голосование">
    </form>
     
    <p><form action="functions_administrator.php" method="get">
    <input type="submit"name ="end" value="УДАЛИТЬ ВСЕ ТЕМЫ">
	</form><p>
   
</body>

</html>
