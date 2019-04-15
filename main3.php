<?php
 session_start();

 ?>
<html>
<head>
<title>Bus Details</title>
<style>

<html, body{
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

table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

 td,  th {
  border: 1px solid #ddd;
  padding: 8px;
}

 tr:nth-child(even){background-color: #f2f2f2;}

 tr:hover {background-color: #ddd;}

 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: red;
  color: white;
}
.button {
  background-color: red;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

</style>

</head>
<body>
<div class="main" >
<fieldset>
<b><font size="120" color="pink"><center>Travels</center></font></b>
<ul>
      <li><a href="first.php" target="blank">HOME</a></li>
      <li><a href="printticket.php" target="blank">PRINT TICKET</a></li>
      <li><a href="cancelticket.php" target="blank">CANCEL TICKET</a></li>
      <li><a href="about.php" target="blank" >ABOUT</a></li>
	   <li><a href="login.php" target="blank" >LOGIN</a></li>
      <li><a href="register.php" target="blank">REGISTER</a></li>
</ul>
</fieldset>
</div>
<div class="main2">
	<form  method="post">
<input type="radio" name="R" value="A/C" checked>A/C<br>
<input type="radio" name="R" value="NON A/C">Non A/C<br><hr>
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
					echo "<table border=5>";
					echo "<tr>";
					echo "<th>BusNo</th>";
					echo "<th>Price</th>";
					echo "<th>From</th>";
					echo "<th>To</th>";
					echo "<th>A/C or Non A/C</th>";
					echo "<th>Time</th>";
					echo "<th>sitting or sleeper</th>";
					echo "<th>click to Book</th>";
					echo "</tr>";
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
						echo "<td>"."<input type='submit' name='submit' value='Book' class='button'>"."</td>";
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

					echo "<table border=5 >";
					echo "<tr>";
					echo "<th>BusNo</th>";
					echo "<th>Price</th>";
					echo "<th>From</th>";
					echo "<th>To</th>";
					echo "<th>A/C or Non A/C</th>";
					echo "<th>Time</th>";
					echo "<th>sitting or sleeper</th>";
					echo "<th>click to Book</th>";
					echo "</tr>";
                      
					while($row=$result->fetch_assoc()){
                        
                        $s=$row['BUSNO'];
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
						echo "<td>"."<input type='submit' name='submit'class='button' value='Book' >"."</td>";
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

?>
</table>
</div>
</body>
</html>



