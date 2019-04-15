<html>
<head>
	<style>
		h1
		{
			color:red;
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
</style>
</head>
<body>
<?php
 session_start();
 $conn = mysqli_connect("localhost", "root", "","project");
 if(isset($_POST['RETRIVE']))
 {
 	echo "<center><h1>Travels<h1></center><br>";
   
    $id=$_POST['text1'];
    //$busno=$_SESSION['busno'];
   // echo "$id"."<br>";
    //echo $busno;

    $sql="SELECT * from ticket where id='$id'";
    $result=$conn->query($sql);
   
				while($row=$result->fetch_assoc()){
					if($row['mobileno']==$_POST['text2'])
					{
					 echo "<table><tr>";
					 echo "<td>Ticket No:</td>";
					echo "<td>".$row['id']."</td></tr>";
					echo "<tr><td>"."Date:"."</td>";
					echo "<td>".$row['date1']."</td></tr>";
					echo "<tr><td>"."BusNo:"."</td>";
                    echo "<td>".$row['busno']."</td></tr>";
                    echo "<tr><td>"."From:"."</td>";
					echo "<td>".$row['from1']."</td></tr>";
					echo "<tr><td>"."To:"."</td>";
					echo "<td>".$row['to1']."</td></tr>";
					echo "<tr><td>"."Name:"."</td>";
					echo "<td>".$row['name']."</td></tr>";
					echo "<tr><td>"."MobileNo:"."</td>";
					echo "<td>".$row['mobileno']."</td></tr>";
					echo "<tr><td>"."Email:"."</td>";
					echo "<td>".$row['email']."</td></tr>";
					echo "<tr><td>"."Gender:"."</td>";
					echo "<td>".$row['gender']."</td></tr>";
					echo "<tr><td>"."Boarding Point"."</td>";
					echo "<td>".$row['boarding']."</td></tr>";
					echo "<tr><td>"."Seat No:"."</td>";
					echo "<td>".$row['seatno']."</td></tr>";
					echo "<tr><td>"."Amount Paid"."</td>";
					echo "<td>".$row['amount']."</td></tr>";
					 echo "</table>";
					}
					else
					{
						echo "<h1>INVALID MOBILE NUMBER</h1>";
					}
				}

 }
 ?>
 </body>
 </html>