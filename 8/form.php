<?php 
 if (isset($_POST['name']))
{
	session_start();
	$_SESSION['print'] = $_POST['name'] ;
	header('Location:http://test.div/form.php' , false);
    exit;	
}
?>
 <form method="POST">
   <div>name: <input type="text" name="name" ></div> 
   <div> <input type="submit" value="OK"></div> 
</form>