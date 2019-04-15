<?php  
session_start();
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>registration form</title>
	<link href="register.css" rel="stylesheet"  />
	<style>
	.para a{
		text-decoration:none;
		color:white;
	}
	</style>
</head>
<body>
	
	<div class="header">
		<h1>Register</h1>
	</div>
	<div class="input-group">
	<form method="post">
	<table >
	
		
			<tr>
			<td><label>Name</label></td>
			<td><input type="text" name="username" placeholder="username" pattern="(?=.*[a-z])(?=.*[A-Z]).{4,}"></td>
			</tr>
			 
			
			<tr>
			<td><label>Email</label></td>
			<td><input type="text" name="email" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"></td>
			</tr>
			
			<tr>
			<td><label>Password</label></td>
			<td><input type="password" name="password" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"></td>
			</tr>
			
			
			<!--
			<tr>
			<td><label>Conform password</label></td>
			<td><input type="password" name="conform_password" placeholder="retype password"></td>
			</tr> 
			-->
			
			<tr>
			<td><label>Phone_no</label></td>
			<td><input type="text" name="phone_no" placeholder="phone no"  pattern="[0-9]{10}" required></td>
			</tr>
		
			<tr>
			<td><label>Address</label></td>
			<td><input type="text" name="address" placeholder="address" pattern="(?=.*[A-Za-z]).{3,}"></td>
			</tr>
		
			<tr>
			<td><label>City</label></td>
			<td><input type="text" name="city" placeholder="city" pattern="(?=.*[A-Za-z]).{3,}"></td>
			</tr>
		
			<tr>
			<td><label>State</label></td>
			<td><input type="text" name="state" placeholder="state"pattern="(?=.*[A-Za-z]).{3,}"></td>
			</tr>
			
			
			<tr>
			<td><label>Date Of Birth</label></td>
			<td><input type="date" name="dob" placeholder="dob"></td>
			</tr>
			
			<tr>
			<td><label>Gender</label></td>
			<td><input type="radio" name="gender" value="male" placeholder="gender" checked>male
			<input type="radio" name="gender" value="female" placeholder="gender">female</td>
			</tr>
	</table>
	
	<button type="submit" name="register" class="btn">Register</button>
		
	</form>
	</div>
	<h3 class="para">Already a member? <a href="login.php">Sign in</a></h3>
	
	<?php
	     
		$conn = mysqli_connect("localhost", "root", "","project");
		if(isset($_POST['register'])) 
		{
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password =$_POST['password'];
			$phone_no =$_POST['phone_no'];
			$address =$_POST['address'];
			$city =$_POST['city'];
			$state =$_POST['state'];
			$gender =$_POST['gender'];
			$dob =$_POST['dob'];
			
		
				$password1=md5($password);
				$sql = "INSERT INTO login_details(username, email, password,phone_no,address,city,state,dob,gender) 
							VALUES ('$username','$email','$password','$phone_no','$address','$city','$state','$dob','$gender')";
				
				mysqli_query($conn,$sql);
				$num=mysqli_affected_rows($conn);
					header("Location:login.php");

				
		}
		$conn->close();
?>
	
</body>
</html>
