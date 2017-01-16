<?php

require('includes/config.php');
 
        $username = 'test';
		$password ='test';
		
		if($user->login($username,$password)){ 
			header('Location: index.php');
			exit;

		}
		else {
			
			$message = '<p class="error">Wrong username or password</p>';
			echo $message;
	}
?> 

