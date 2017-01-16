<?php
//include config
require_once('../includes/config.php');


//check if already logged in
if( $user->is_logged_in() ){ header('Location: index.php'); } 




?>
<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>

<div id="login">

	<?php

	//process login form if submitted
	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($user->loginSecure($username,$password)){ 

			//logged in return to index page
			header('Location: index.php');
			exit;
		

		} 
		 else{
		 	header('Location: index.php');
			exit;
		 }

	}//end if submit

	if(isset($message)){ echo $message; }
	?>

	<form action="" method="post">
	<p><label>Username</label><input type="text" name="username" value=""  /></p>
	<p><label>Password</label><input type="password" name="password" value=""  /></p>
	<p><label></label><input type="submit" name="submit" value="Login"  /></p>
	</form>

</div>
</body>
</html>
