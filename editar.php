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
$records=$conn->prepare("SELECT * FROM productos ORDER BY nombre");
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);
include "headerEN.php"
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
						<li><a href="registrar.php"><img src="img/add.png" alt="eliminar" style="height: 3rem; width: 3rem"></a>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
        <div class="container">
            <div class="row" style="margin-top: 3rem;">
                <h2 >Product list</h2>
				<table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Categoy</th>
                            <th scope="col">Image</th>
                            <th scope="col" colspan="2">Edit</th>
                        </tr>
                    </thead>
                <tbody>
                    <tr>
                    <?php foreach($results as $product){ ?>
                        <th scope="row"><?php echo $product['id'];?></th>
                        <td><?php echo $product['nombre'];?></td>
                        <td><?php echo $product['descripcion'];?></td>
                        <td>$<?php echo $product['precio'];?>.00</td>
                        <td><?php echo $product['categoria'];?></td>
                        <td><?php echo $product['imagen'];?></td>
						<td><a href="eliminar.php?id=<?php echo $product['id'];?>"><img src="img/basura.png" alt="eliminar" style="height: 2.5rem; width: 2.5rem"></a></td>
                        <td><a href="actualizar.php?id=<?php echo $product['id'];?>"><img src="img/actualizar.png" alt="actualizar" style="height: 2.5rem; width: 2.5 rem"></a></td>
					</tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        </div>

<?php
include "footerEN.php"
?>