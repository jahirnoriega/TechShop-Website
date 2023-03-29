<?php
session_start();
require "config/database.php";
if (isset($_SESSION['user_id'])) {
	$records=$conn->prepare("SELECT id,name,lastname,email,password,rol FROM users WHERE id = :id");
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$usuario = $records->fetch(PDO::FETCH_ASSOC);
	$user= null;
	if(count($usuario)>0){
		$user = $usuario;
	}
}
include "headerEN.php";
?>
	<!-- NAVIGATION -->
	<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class=""><a href="indexEN.php">Home</a></li>
						<li class=""><a href="storeEN.php">All</a></li>
						<li><a href="sobre_nosotrosEN.php">About us</a></li>
						<?php
							if (!empty($user)){
								if($user["rol"]=="admin"){?>
									<li><a href="editar.php">Edit</a></li>
						<?php 	}
							}	?>
						<li>
							<a style="align-items: right;" href="logout.php">
								<span style="align-items: right;">Log Out</span>
							</a>
						</li>
						<li><a href="/proyecto/EN/index/indexEN.php"><img src="img/estados-unidos.png" alt="" style="height: 2.7rem; width: 2.7rem;"></a></li>
						<li><a href="/proyecto/ES/index/index.php"><img src="img/mexico.png" alt="" style="height: 2.7rem; width: 2.7rem;"></a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
	</nav>
    <div class="container">
        <div class="row" style="margin-top: 3rem;">
            <h2>Register product</h2><br>
        </div>
        <div class="row container">
        <form action="" method="post">
            <label>Name:</label>
            <input type="text" name="nombre" required placeholder="Enter name"/><br><br>
            <label>Description:</label>
            <input type="text" name="descripcion" required placeholder="Enter description "/><br><br>
            <label>Price:</label>
            <input type="text" name="precio" required placeholder="Enter price "/><br><br>
            <label>Category:</label>
            <input type="text" name="categoria" required placeholder="Enter category"/><br><br>
            <label>Image:</label>
            <input type="text" name="imagen" required placeholder="Enter image's route"/><br><br>
            <br>
            <button class="btn btn-success" type="submit"  name="submit">Register product</button><br><br><br>
            </form>
        </input>
        <?php
            if(isset($_POST["submit"])){
            $records=$conn->prepare("INSERT INTO productos
            VALUES (0,'".$_POST["nombre"]."','".$_POST["descripcion"]."','".$_POST["precio"]."','".$_POST["categoria"]."','".$_POST["imagen"]."')" );
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);
            }
        ?>
    </div>
</div>

<?php
include "footerEN.php";
?>