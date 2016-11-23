<HTML>
	<HEAD>
		<TITLE>Login into System</TITLE>
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</HEAD>
	<BODY>
		<table id="loginWindow">
			<td>
				<form method="POST">
					<center>User Name: <input type="text" name="username"><br><br>
					Password: <input type="password" name="password"><br><hr>
					<button class="btn btn-success" type="submit" name="submit">Login</button> or <a href="pages/signup.php">Sign Up</a></center>
				</form>
			</td>
		</table>
		<?php
			if(isset($_POST["submit"])){
				$sUsername=$_POST["username"];
				$sPassword=$_POST["password"];
				
				$servername = "localhost";
				$username = "main";
				$password = "Aa123456";
				$dbname = "mySystem";

				if($sUsername==null or $sPassword==null){
					echo '<div id="messages" class="alert alert-danger"><strong>Fields in blank</strong> The Username or Password is in blank</div>';
				}else{
					// Create connection				
					$conn = new mysqli($servername, $username, $password, $dbname);

					// Check connection
					if ($conn->connect_error) {
						echo "<script>alert('Connection failed: " . $conn->connect_error."');</script>";
						die();
					}
					unset($_POST["submit"]);
				}
			}
		?>
		<script>
		$(document).ready(function(){
			$("#loginWindow").fadeIn(300); 
		});
		</script>
	</BODY>
</HTML>
