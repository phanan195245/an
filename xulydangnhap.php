<?php

If(isset($_POST['username'])&&isset($_POST['password']))
{
	
	if(($_POST['username']=="admin")&&($_POST['password']=="admin"))
	{
		session_start();
	$_SESSION['login']=$_POST['username'];
	echo("<meta http-equiv='refresh' content='0; url=index.php' />");
	}
	else
	{
		
		echo("<meta http-equiv='refresh' content='0; url=login.php' />");
		
	}
}

						
?> 