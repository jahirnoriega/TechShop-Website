<?php
require "database.php";
$messege = "";

if(!empty($_POST["email"]) && !empty($_POST["password"])){
    $sql = "INSERT INTO users (name, lastname, email, password) VALUES (:name, :lastname, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":name", $_POST["name"]);
    $stmt->bindParam(":lastname", $_POST["lastname"]);
    $stmt->bindParam(":email", $_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $stmt->bindParam(":password", $password);

    if ($stmt->execute()){
        $messege = "User created succesfully";
        header("Location: login.php");
    }else{
        $messege = "There has been an error creating your account";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register TechShop</title>}
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="icon" href="images/logo.PNG">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
               
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Enter your name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="lastname" id="lastname" placeholder="Enter your last name"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Enter E-Mail"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="container-login100-form-btn">
						<button class="form-submit" type="submit">
							Register
						</button>
                        <div class="loginhere-link">
                           <center>
                            <?php
                                if (!empty($messege)): ?>
                                <p>
                                    <?=$messege ?>
                                </p>
                            <?php endif;?>
                           </center> 
                    </div> 
					</div>
                    </form>
                    <p class="loginhere">
                        Do you have an account? <a href="loginEN.php" class="loginhere-link">Log in here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main_resgistro.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>