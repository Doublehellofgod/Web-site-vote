<?php
function addval($row_prev){
        echo '<form action="functions_administrator.php" method="get">
            <input name="aa"   type="text" value="">
            <input name="id_tema" type="hidden"  value="'.$row_prev.'">
            <input type="submit"name ="add" value="добавить вариант">
            </form>______________________________________________________________________<br>';
}

?>
