<HTML>
	<HEAD>
		<TITLE>Sign Up</TITLE>
		<link rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</HEAD>
	<BODY>
		<DIV ID="up_bar">
			<button onclick="window.location.replace('../index.php')" class="btn btn-default"><span class="glyphicons glyphicons-circle-arrow-left"></span><span class="glyphicons glyphicon glyphicon-arrow-left"></span> BACK</button>
		</DIV>
		<form method="POST" id="signupform">
			Full Name: <input type="text" name="user_name"><br><br>
			User Name: <input type="text" name="username">  Nickname: <input type="text" name="nickname">
			<br><br>
			E-mail:<input type="text" name="email"><br><br>
			Password:<input type="password" name="pwd"> Re-type Password:<input type="password" name="pwdv"><br><br>
			<hr>
			<?php
				if(isset($_POST["confirm"])){
					if($_POST["user_name"]==null or $_POST["username"]==null or $_POST["nickname"]==null or $_POST["email"]==null or $_POST["pwd"]==null or $_POST["pwdv"]==null){
						echo '<div><center><font color="red">*Fields in blank</font></center></div>';
					}else{
						if($_POST["pwd"]!=$_POST["pwdv"])
							echo "<div><center><font color='red'>*Passwords not the same</font></center></div>";
						else{							
							$servername = "localhost";
							$username = "main";
							$password = "Aa123456";
							$dbname = "mySystem";

							// Create connection				
							$conn = new mysqli($servername, $username, $password, $dbname);

							// Check connection
							if ($conn->connect_error) {
								echo "<script>alert('Connection failed: " . $conn->connect_error."');</script>";
								die();
							}
							$sql = "INSERT INTO users VALUES (0,'".$_POST["username"]."','".md5($_POST['pwd']) ."','".$_POST['user_name']."','".$_POST['email']."','".$_POST['nickname']."')";
							$conn->query($sql);
							$conn->close();
							echo "<script>window.location.replace('../index.php')</script>";
						}
					}
				}
			?>
			<center><button type="submit" name="confirm" class="btn btn-success">Confirm</button>  <button type="reset" class="btn btn-danger">Reset</button></center>
		</form>
	</BODY>
</HTML>
