<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial;
  font-size: 20px;
  padding: 80px;
}

* {
  box-sizing: border-box;
}

.one{
	padding:0px  450px;
}
.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #262626;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 15px;
   opacity: 1.0;

  
}
.container:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.60), 0 17px 50px 0 rgba(0,0,0,0.19);
}
input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  background-color: #bfbfbf;
}

label {
  margin-bottom: 10px;
  display: block;
  color: #ffffff;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color:  #4d4d4d;
  color: white;
  padding: 12px;
  display: inline-block;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
  height: 50px;
 width: 120px;
   position: absolute;
  left: 580px;
  top: 710px;
  }

.btn:hover {
  background-color: #000000;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}


a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>
<div class="one">
<h1>PAYMENT</h1>
</div>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form method='post'>
        <div class="row">
          <div class="col-50">
          <div class="col-50">
<h3>      </h3>
<h3>      </h3>
<label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;">fa fa-cc-visa</i>
              <i class="fa fa-cc-amex" style="color:blue;">fa fa-cc-amex</i>
              <i class="fa fa-cc-mastercard" style="color:red;">fa fa-cc-mastercard</i>
              <i class="fa fa-cc-discover" style="color:orange;">fa fa-cc-discover</i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" pattern="(?=.*[a-z])(?=.*[A-Z]).{4,}">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="XXXX-XXXX-XXXX-XXXX" pattern="[0-9]{12}">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="1" pattern="[0-9]{2}">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2019" pattern="[0-9]{4}">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="XXX" pattern="[0-9]{3}">
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
        </div><input type="submit" class="btn" name='Submit' >
      </form>
	  
	  
 <?php
		$conn = mysqli_connect("localhost", "root", "","project");
		if(isset($_POST['Submit'])) 
		{
			$username = $_POST['cardname'];
			$email = $_POST['cardnumber'];
			$password =$_POST['expmonth'];
			$conform = $_POST['expyear'];
			$phone_no =$_POST['cvv'];
			
			
				$sql = "INSERT INTO project (cardname,cardno,cvv,expirydate,expirymonth) 
							VALUES ('$username','$email','$phone_no','$password','$conform')";
				
				//echo "happy";
				$result=mysqli_query($conn,$sql);
				$num=mysqli_affected_rows($conn);
				if($num>0)
				{
					echo "done!!";
				}
				else
				{
					echo "fail!!";
				}
				header("Location:print1.php");
		}

		$conn->close();
?>
</body>
</html>





