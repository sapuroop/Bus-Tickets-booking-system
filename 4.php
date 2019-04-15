<?php
   session_start();
?>

<html>
<head>

<style>
input[type=checkbox] {
    zoom: 3;
}
input[type='checkbox']:after{
    line-height: 1.5em;
    content: '';
    display: inline-block;
    width: 18px;
    height: 18px;
    margin-top: -4px;
    margin-left: -4px;
    border: 1px solid rgb(192,192,192);
    border-radius: 0.25em;
    background: yellow;
}

input[type='checkbox']:checked:after {
width: 15px;
    height: 15px;
    border: 3px solid #00ff00;
	background:green;
}
.button {
  background-color: green;
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
  <script type="text/javascript">
 function checkboxes()
      {
       var inputElems = document.getElementsByTagName("input"),
        count = 0;
          
        for (var i=0; i<inputElems.length; i++) {       
if (inputElems[i].type == "checkbox" && inputElems[i].checked == true && inputElems[i].disabled!= true) 
{
    count++;
}
}
 if (count>5)
   {
   var c=count-5;
  alert("maximum no of seats selcted remove "+c+" seats");
   }
   
document.getElementById("demo").innerHTML="no of seats selected: "+count;
}
</script>
  <?php
   

      $conn = mysqli_connect("localhost", "root", "","project");
    echo "<br>";
    echo "<center><p id='demo'></p>";
      
     if(isset($_POST['submit']))
       {
        
       $f1=Array();
       $s=$_POST["busno"];
       $_SESSION['prize']=$_POST["prize"];
       $busno=strtolower($s);
       $_SESSION['busno']=$busno;
      
     $sql = "SELECT * FROM ".$busno ;
     $x=1;
     $c=1;
      $result=$conn->query($sql);
   
     if($result->num_rows>0)
     {
      
      echo "<form method='post'>";
      echo "<table align='center'>";
      echo "<tr><img src='green.png' height='50' width='50'></tr> <tr><font size='6'>-selected</font></tr><br>";
      while($row=$result->fetch_assoc()){
        if($x==6 OR $x==10 OR $x==14 OR $x==18 OR $x==22 OR $x==26 OR $x==30 )
        {
            echo "<br><br>";
        }
        else if( $x==8 OR $x==12 OR$x==16 OR$x==20 OR $x==24 OR $x==28 )
        {
            echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
        }
         
      if($row['availability']==1)
    {
     echo "<input  type='checkbox' name = 'c[]'  onclick='checkboxes()' disabled='true' value=$x checked='true'>" ;
     $f1[$c]=$row['seat_no'];
     $c++;
    }
    else
    {
         
       echo " <input  type='checkbox' name='c[]'  onclick='checkboxes()' value=$x >";
    }   

     $x=$x+1;
   }
   $_SESSION['c']=$c;
   $_SESSION['f1']=$f1;
   echo "<br>";
   echo "<input type='submit' name='seats' value='continue' class='button' >"; 
   echo "</form>";
   echo "</center>";
 }

}
 if(isset($_POST['seats']))
 {
    $busno = $_SESSION['busno'];
    $c=0;
    $f = $_POST['c'];
    $s = sizeof($f);
    $_SESSION['f']=$f;
    $_SESSION['s']=$s;
    $f1=$_SESSION['f1'];
    $f2=Array();
    for($i=0;$i<$s;$i++)
    {
     // echo $f[$i]."<br>";
      if(!array_search($f[$i], $f1))
      {

         $f2[$c++]=$f[$i];
      }
      $sql="UPDATE $busno SET availability='1' WHERE seat_no=$f[$i]";
      $res=mysqli_query($conn,$sql);

    
    }
    $_SESSION['f2']=$f2;
    header("Location:boardingpoint.php");
 }

    $conn->close();

?>

</body>
</html>

