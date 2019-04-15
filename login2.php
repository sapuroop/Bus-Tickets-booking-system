<?php
session_start();
unset($_SESSION['login']); 
?>
<html>
<body>
<h1>You are already logged in</h1>
<a href="login1.php">logout</a>
</body>
</html>