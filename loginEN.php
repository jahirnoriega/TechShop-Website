<?php
session_start();
require "database.php";
if(!empty($_POST["email"]) || !empty($_POST["pass"])){
	$records = $conn->prepare("SELECT id, email, password FROM users WHERE email=:email");
	$records->bindParam(":email", $_POST["email"]);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	if(count($results) > 0 && password_verify($_POST["pass"], $results["password"])){
		$_SESSION["user_id"] = $results["id"];
		header("Location: index/indexEN.php");
	}else{
		$messege = "E-Mail or passwrod don't match";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login TechShop</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/logo.PNG"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/IMG_0450.PNG" alt="IMG">
				</div>

				<form action="loginEN.php" class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Log In
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="E-Mail">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Log In
						</button>
					</div>
					<div class="login100-form-title">
                           <center>
                            <?php
                                if (!empty($messege)): ?>
                                <p>
                                    <?=$messege ?>
                                </p>
                            <?php endif;?>
                           </center> 
                    </div> 
					<div class="text-center p-t-136">
						<a class="txt2" href="signupEN.php">
							Register
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>

</body>
</html>