<html>
<head>
	<style>
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
            $x=0;
		    $seatno=$_SESSION['f2'];
		    $busno=$_SESSION['busno'];
		    $s=sizeof($seatno);
		    echo "<table border='5'>";
                    echo "<tr>";
                    echo "<th>Ticket id</th>";
                    echo "<th>Date</th>";
                    echo "<th>BusNo</th>";
                    echo "<th>From</th>";
                    echo "<th>To</th>";
                    echo "<th>Passenger Name</th>";
                    echo "<th>Mobile No</th>";
                    echo "<th>Email</th>";
                    echo "<th>Gender</th>";
                    echo "<th>Boarding Point</th>";
                    echo "<th>Seat No</th>";
                    echo "<th>Amount Paid</th>";
                    echo "</tr>";
		    for($i=0;$i<$s;$i++)
		    {		    
 
                  $sql="SELECT * from ticket where seatno='$seatno[$x]' and busno='$busno'";
                  $result=$conn->query($sql);
                    
				while($row=$result->fetch_assoc()){
					echo '<tr><td>'.$row['id'].'</td>';
					echo '<td>'.$row['date1'].'</td>';
                    echo '<td>'.$row['busno'].'</td>';
					echo '<td>'.$row['from1'].'</td>';
					echo '<td>'.$row['to1'].'</td>';
					echo '<td>'.$row['name'].'</td>';
					echo '<td>'.$row['mobileno'].'</td>';
					echo '<td>'.$row['email'].'</td>';
					echo '<td>'.$row['gender'].'</td>';
					echo '<td>'.$row['boarding'].'</td>';
					echo '<td>'.$row['seatno'].'</td>';
					echo '<td>'.$row['amount'].'</td>';
					 echo "<hr>";
					
				}
       $x++;
 }
 $_SESSION=[];
		    	 



               
        
  
?>
</body>
</html>
