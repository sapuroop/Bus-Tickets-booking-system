<!DOCTYPE html>
<html>
<head>
	<title>Login form</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>

	<div class="header">
		<h1>Login</h1>
	</div>
	
	<div class="input-group">
	<form method="post" action="login.php">
	<table>
			<tr>
			<td><label>Username</label></td>
			<td><input type="text" name="username" placeholder="username" required></td>
			</tr>

			<tr>
			<td><label>Password</label></td>
			<td><input type="password" name="password" placeholder="password" required></td>
			</tr>

	</table>
		<button type="submit" name="login" class="btn">Login</button>
	</form>
	</div>
	
	<p class="para">Not a member? <a href="register.php">Sign up</a></p>
	<?php 
		session_start();
		print_r($_SESSION);
		if(isset($_SESSION['login']))
		    {
		    	if(isset($_SESSION['busno']))
                      header("Location:pay.php");
		    }
			$my = mysqli_connect("localhost", "root", "","project");
			if(isset($_POST["login"]))
			{

            
                    
				$username=$_POST['username'];
				$password=$_POST['password'];
				$check=mysqli_query($my,"select * from login_details where username='$username' and password='$password'");
				$num=mysqli_num_rows($check);
				if($num==0)
				{
					echo "INVALID USERNAME OR PASSWORD";
				}
				else
				{
					if($_SESSION['busno'])
				     {
				     $_SESSION['login']=$username;
                      header("Location:pay.php");
				     }
				    else
				    {
				    	$_SESSION['login']=$username;
				    	header("Location:first.php");
				    }

				}
			}
		?>
</body>
</html>
