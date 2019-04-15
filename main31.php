<?php
 session_start();

 ?>
<html>
<head>
<title>Bus Details</title>
<style>
html, body{
    width:100%;
    height:100%;
    margin:0;
}
.main{
		background-image:url(https://images.all-free-download.com/images/graphiclarge/sparkling_colorful_background_01_hd_picture_169898.jpg);
		
}

.main ul{
        list-style-type:none;
        padding:0px 60px;
}
.main ul a{
         float:left;
         display:block;
         padding:10px 60px;
         background-color:black;
         color:white;
         text-decoration:none;
}
.main ul a:hover{
         background-color:orange;
}

.main2 {
	float:left;
    width: 20%;
    background-color: yellow;
    height:100%;
}

.main3 {
	float: right;
    width: 80%;
    //background-color: green;
    height:100%;
}
.main3.one{
	width:100%;
	align:left;
}
.tarak {
  width: 60px;
  height: 20px;
  background: black;
  -webkit-transition: width 0.5s; /* For Safari 3.1 to 6.0 */
  transition: width 0.5s;
}

.tarak:hover {
	 background: orange;
  width: 75px;
 
}
 .container {
   width: 1500px;
   height:30px;
   background-color:#00FFFF;
} 
</style>

</head>
<body>
	<div class ="container"> <a href="first.php" target="blank"><center>KNOW OURSELVES</div></center></a></div>

<div class="main" >
<fieldset>
<b><font size="120" color="white"><center>Travels</center></font></b>
<ul>
      <li><a href="first.php" target="blank"><div class="tarak"><center>HOME</center></div></a></li>
      <li><a href="printticket.php" target="blank"><div class="tarak"><center>PRINTTICKET</center></div></a></li>
      <li><a href="cancelticket.php" target="blank"><div class="tarak"><center>CANCELTICKET</center></div></a></li>
      <li><a href="about.php" target="blank" ><div class="tarak"><center>ABOUT</center></div></a></li>
	   <li><a href="login.php" target="blank" ><div class="tarak"><center>LOGIN</center></div></a></li>
      <li><a href="register.php" target="blank"><div class="tarak"><center>REGISTER</center></div></a></li>
</ul>
</fieldset>
</div>
<div class="main2">
	<form  method="post">
	<div style="background-color:lightblue">
<div class="tarak"><input type="radio" name="R" value="A/C" checked>A/C</div>
<input type="radio" name="R" value="NON A/C">Non A/C<br><hr>
</div>
<input type="radio" name="R1" value="sitting" checked>SITTING<br>
<input type="radio" name="R1" value="sleeping">SLEEPER<br><hr>
<input type="radio" name="R2" value="morning" checked>MORNING<br>
<input type="radio" name="R2" value="afternoon" >AFTERNOON<br>
<input type="radio" name="R2" value="evening">EVENING<br><hr>
<input type="submit" name="register">
</form>
</div>
<div class="main3">
	<h1>BUS DETAILS</h1>
	<table class="one">
	<?php
               
          $conn = mysqli_connect("localhost", "root", "","project");
		echo "<br>";
		if(isset($_POST['register'])) 
		{
			
            
		    $type3 = $_POST['R'];
			$type4 = $_POST['R1'];
			$type5=$_POST['R2'];
			$type=$_SESSION['type'];
			$type1=$_SESSION['type1'];
		   
             
				$sql = "SELECT * FROM buses WHERE TYPE='$type3' and from1='$type' and to1='$type1' and type1='$type5' and type2='$type4'";
				
				$result=$conn->query($sql);

				
				if($result->num_rows>0)
				{
					while($row=$result->fetch_assoc()){

						echo "<tr>";
                     
                        $s=$row["BUSNO"];
                        $s1=$row['prize'];
                      
                          
						echo "<td><bold>".$row["BUSNO"]." "."</bold></td>";
 						
						echo "<td>".$row["prize"]." "."</td>";
                        echo "<td>".$row["from1"]." "."</td>";
                        echo "<td>".$row["to1"]." "."</td>";
                        echo "<td>".$row["TYPE"]." "."</td>";
                        echo "<td>".$row["type1"]." "."</td>";
                        echo "<td>".$row["type2"]." "."</td>";
                        echo "<form method='post' action='4.php'>";
                        echo "<input type='hidden' name='busno' value=$s>"; 
                        echo "<input type='hidden' name='prize' value=$s1>";
						echo "<td>"."<input type='submit' name='submit' >"."</td>";
						echo "</form>";
					//	$x=$x+1;	
						echo "</tr>";
					}
				}
				
				else
				{
					echo "0 rows";
				}
		}
		$conn->close();

        
		$conn = mysqli_connect("localhost", "root", "","project");
		echo "<br>";
		if(isset($_POST['submit'])) 
		{

			
			
			$_SESSION['type'] = $_POST['select'];
			$_SESSION['type1'] = $_POST['select1'];
			$_SESSION['date']=$_POST['date'];
			$date=$_SESSION['date'];
			$type=$_POST['select'];
			$type1=$_POST['select1'];
				$sql = "SELECT * FROM buses where from1='$type' and to1='$type1'";
				$result=$conn->query($sql);
				if($result->num_rows>0)
				{
					while($row=$result->fetch_assoc()){
                        
                      
                        $s=$row['BUSNO'];
                        $s1=$row['prize'];
						echo "<bold>".$row["BUSNO"].'</bold> ';
					
						echo $row["prize"].' ';
                        echo $row["from1"].' ';
                        echo $row["to1"].' ';
                        echo $row["TYPE"].' ';
                        echo $row["type1"].' ';
                        echo $row["type2"].' ';
                        echo "<form method='post' action='4.php'>";
                        echo "<input type='hidden' name='busno' value=$s>";
                        echo "<input type='hidden' name='prize' value=$s1>";
						echo "<input type='submit' name='submit'>"."<br>";
						echo "</form>";
			
					}
				}
				else
				{
					echo "0 rows";
				}
		
		}
		$conn->close();

?>
</table>
</div>
</body>
</html>



