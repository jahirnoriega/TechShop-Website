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
$id=$_GET["id"];
$records=$conn->prepare("SELECT * FROM productos WHERE id= $id");
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
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
        <div class="row" style="margin-top: 2rem;">
            <h2>Update product</h2>
        </div>
        <div class="row container">
            <form action="update.php" method="post">
            <input type="hidden" name="id" id=""><br>
                        <input type="hidden" name="id" id="" value="<?php echo $results['id']?>">
                        <div class="mb-3">
                            <label for="exampleFormControlTexttarea1" class="form-label">Name</label>
                            <input type="text" name="nom" id="" value="<?php echo $results['nombre']?>">
                        </div><br>
                        <div class="mb-3">
                            <label for="exampleFormControlTexttarea1" class="form-label">Description</label>
                            <input type="text" name="des" id="" value="<?php echo $results["descripcion"] ?>">
                        </div><br>
                        <div class="mb-3">
                            <label for="exampleFormControlTexttarea1" class="form-label">Price</label>
                            <input type="text" name="pre" id="" value="<?php echo $results["precio"] ?>">
                        </div><br>
                        <div class="mb-3">
                            <label for="exampleFormControlTexttarea1" class="form-label">Category</label>
                            <input type="text" name="cate" id="" value="<?php echo $results["categoria"] ?>">
                        </div><br>
                        <div class="mb-3">
                            <label for="exampleFormControlTexttarea1" class="form-label">Image</label>
                            <input type="text" name="img" id="" value="<?php echo $results["imagen"] ?>">
                        </div><br>
<br>
                <button type="submit" class="btn btn-primary">Update</button>
                <br><br>
            </form>
        </input>

        </div>
        </div>

<?php
include "footerEN.php";
?>