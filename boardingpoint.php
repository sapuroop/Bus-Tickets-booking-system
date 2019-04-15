<html>
<head>
<style>
body{
  border-style: solid;
  border-width: 5px;
  height: 2000px;
  width:1330px
  
}
h1
{
	color:red;
}
h2
{
	color:blue;
}
</style>
<?php
  session_start();
  
  
  ?>
<div align="center">
<body>
<?php
 
echo "<form method='post'>";
echo "<h1 >Boarding Point</h1>";
echo "<input type='radio' name='boarding' value='Bus Station'>Bus Station<br>";
echo "<input type='radio' name='boarding' value='Rail Station'>Railway Station<br>";
echo "<br>";
echo "<br>";
echo "<hr>";
echo "<h1>Personal Details</h1>";
for($i=0;$i<$_SESSION['s'];$i++)
{
echo "<h2>Person".(string)($i+1)."</h2>";
echo "<label>Name:<input type='text' name='name[]' pattern='(?=.*[a-z])(?=.*[A-Z]).{4,}'></label><br><br>";
echo "<label>Email:<input type='email' name='email[]' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$'></label><br><br>";
echo "<label>Mobile:<input type='mobile' name='mobile[]' pattern='[0-9]{10}'></label><br><br>";
echo "<label>Gender:</label><input type = 'checkbox' name='gender[]' value='M'>Male ";
                      echo "<input type = 'checkbox' name='gender[]' value='F'>Female";
                      
echo "<br>";
echo "<br>";
echo "<hr>";

}
echo "<input type='submit' name='continue' >";
echo "</form>";
?>
</body>
</div>
</html>
<?php
$conn = mysqli_connect("localhost", "root", "","project");
if(isset($_POST['continue']))
  {
  	        
            $x=0;
			$name = $_POST['name'];
			$email = $_POST['email'];
			$mobile =$_POST['mobile'];
			$gender =$_POST['gender'];
		    $busno =$_SESSION['busno'];
		    $from  =$_SESSION['type'];
		    $to  =$_SESSION['type1'];
		    $boarding=$_POST['boarding'];
		    $amount=$_SESSION['prize'];
		   // $f=$_SESSION['f'];
		    //$in=$_SESSION['c'];
		    $date=$_SESSION['date'];
		    $seatno=$_SESSION['f2'];
		    $s=sizeof($name);
		    for($i=0;$i<$s;$i++)
		    {
	                        	$sql = "INSERT INTO ticket(date1, busno, from1,to1,name,email,mobileno,gender,boarding,seatno,amount) VALUES('$date','$busno','$from','$to','$name[$i]','$email[$i]','$mobile[$i]','$gender[$i]','$boarding','$seatno[$x]','$amount')";
		    	 

                        if ($conn->query($sql) === TRUE) {
                                echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                          }


                $x++;
             }
             header("Location:login.php");
  }
?>