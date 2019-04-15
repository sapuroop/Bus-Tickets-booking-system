<!DOCTYPE html>
<html>
<head>
	<title>print ticket</title>
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
<center><h1>PRINT TICKET</h1></center>
<fieldset class="a">
<legend>MY TICKET</legend><br>
<field>&nbsp&nbsp&nbsp ENTER TICKET DETAILS</field><br><br>
<form method="post" action='print.php'>
<field>

<label style="margin-left:20px;">TICKET</label>
<input type="text" name="text1" style="margin-left:50px;">
</field>

<field>
<label style="margin-left:280px;">MOBILE</label>
<input type="text" name="text2" style="margin-left:50px;" pattern="[0-9]{10}" required>
</field>

<field>
<input type='submit' style="margin-left:200px;width:150px;height:30px;color:white;background-color:black" name='RETRIVE' value='Print Ticket' >
</field>
</form>
</fieldset>
</body>
</html>
