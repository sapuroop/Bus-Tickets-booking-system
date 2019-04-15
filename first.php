<html>
<head>
<style>
body
{
	margin:0;
	border:0;
	background: url("bus6.jpg");
	/*background-size:cover;*/
	background-position: center;
	font-family: sans-serif;
	text-align: center;
	
}
form
{
	background-color:black;
}
h1
{
	color:red;
}
.main1{
		background-image:url(https://images.all-free-download.com/images/graphiclarge/sparkling_colorful_background_01_hd_picture_169898.jpg);
		
}

.main1 ul{
        list-style-type:none;
        padding:0px 60px;
}
.main1 ul a{
         float:left;
         display:block;
         padding:10px 60px;
         background-color:black;
         color:white;
         text-decoration:none;
}
.main1 ul a:hover{
         background-color:orange;
}

.main{
         padding:200px;
		 color:white;
}
.a{
	align-self: center;
         margin:0;
         background-color:#333333;
		 /*opacity: 0.6;
		 filter: alpha(opacity(100));*/
		 color:white;
         margin-left: 350px;
 		 margin-right: 550px;
		 margin-top:10px;
  padding-top: 1.0em;
  padding-bottom: 2.925em;
  padding-left: 0.85em;
  padding-right: 0.85em;      
		position:relative;
}
.a td{
	color:white;
	padding:0px 20px;
	align: left;
}
.a tr{
	margin:30;
	padding:20px;
}
.b{
         padding:10px 80px;
         position:absolute;
		 color:red;
}
.c{
		color:black;
		background-color:white;
		spadding:8px 25px;
		font-size:18px;
}
.button {
  background-color: red;
  border: none;
  color: white;
  padding: 10px 17px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

</style>
<title>first</title>

</head>
            
<body>

<div class="main1" >
<fieldset>
<b><font size="120" color="pink"><center>Travels</center></font></b>
<ul>
      <li><a href="first.php" target="blank">HOME</a></li>
      <li><a href="printticket.php" target="blank">PRINT TICKET</a></li>
      <li><a href="cancelticket.php" target="blank">CANCEL TICKET</a></li>
      <li><a href="about.php" target="blank" >ABOUT</a></li>
	   <li><a href="login1.php" target="blank" >LOGIN</a></li>
      <li><a href="register.php" target="blank">REGISTER</a></li>
</ul>
</fieldset>
</div>

<div class="main" align="center">
<fieldset class="a">
<form method="post" action="main3.php" target="blank" >
<h1>Travels</h1>
<table>

<tr>
<td><label>From:</td>
<td><select name ="select">
    
       <option value="VSP">vizag</option>
       <option value="SKLM">srikakulam</option>
        <option value="vijayanagaram">vijayanagaram</option>
      
</select></label>
</td>
</tr>
<tr>
<td><br></td>
<td><br></td>
</tr>

<tr>
<td><label>To:</td>
<td><select name="select1">

       <option value="VSP">vizag</option>
       <option value="SKLM">srikakulam</option>
        <option value="vijayanagaram">vijayanagaram</option>
        
</select></label></td>
</tr>
<tr>
<td><br></td>
<td><br></td>
</tr>

<tr>
<td><label>Date:</label></td>

<td><input type="date" name="date"  min=<?php echo date('Y-m-d');?> ></td> 
</td>
</tr>
<tr>
<td><br></td>
<td><br></td>
</tr>

</table>

<div class='b'>
		<center><input type="submit" name="submit" class="button" value="Filter" ></center>
</div>


</fieldset>
</form>
</div>
</body>

</html>
