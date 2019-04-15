<!DOCTYPE html>
<html>
<head>
	<title>cancel ticket</title>
	<style>
		h1{
			color:red;
		}
		body
		{
			background: orange;
		}
	.a{
		background-color:yellow;
		margin-top:150px;
		padding:20px;
	}
	
	</style>
</head>


<body>
<center><h1>CANCEL TICKET</h1></center>
<fieldset class="a">
<legend>MY TICKET</legend><br>
<field>&nbsp&nbsp&nbsp ENTER TICKET DETAILS</field><br><br>
<form method="post">
<field>

<label style="margin-left:20px;">TICKET</label>
<input type="text" name="text1" style="margin-left:50px;">
</field>

<field>
<label style="margin-left:280px;">MOBILE</label>
<input type="text" name="text2" style="margin-left:50px;" pattern="[0-9]{10}" required>
</field>

<field>
<input type='submit' style="margin-left:200px;width:150px;height:30px;color:white;background-color:black" name='RETRIVE' value='Cancel Ticket' >
</field>
</form>
</fieldset>
</body>
</html>
<?php
 session_start();
 $conn = mysqli_connect("localhost", "root", "","project");
 if(isset($_POST['RETRIVE']))
 {
    $id=$_POST['text1'];
    //$busno=$_SESSION['busno'];
    echo $id;
    //echo $busno;
    $sql="SELECT * from ticket where id='$id'";
    $result=$conn->query($sql);
    $flag=0;
				while($row=$result->fetch_assoc()){
					if($row['mobileno']==$_POST['text2'])
					{
					$seat=$row['seatno'];
					$busno=$row['busno'];
					echo $seat;
					 $sql1="UPDATE $busno SET availability='0' WHERE seat_no=$seat";
					 $res=mysqli_query($conn,$sql1);
                     }
                     else
                      {
                         $flag=1; 
                     	echo "<h1>INVALID MOBILE NUMBER</h1>";
                     } 
				}
				if($flag==0)
				{
	$sql2="DELETE FROM ticket WHERE id='$id'";

       $res=mysqli_query($conn,$sql2);
       echo "<script>alert('ticket cancelled succesfully')</script>";
   }
 }
 ?>