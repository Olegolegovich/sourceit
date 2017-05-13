<?php 
 if (isset($_POST['surname']))
{
	$sur = $_POST['surname'];
	$data = mktime(14,0,0,13,5,2017);
	setcookie('surname', $sur, $data);
	header('Location:http://test.div/form2.php' , false);
    exit;	
}
 ?>
 <form method="POST">
   <div>surname: <input type="text" name="surname" ></div> 
   <div> <input type="submit" value="OK"></div> 
</form>