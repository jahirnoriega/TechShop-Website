<?php
session_start();
require "config/config.php";
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
$id= isset($_GET['id'])?$_GET['id']:'';
$token=isset($_GET['token'])?$_GET['token']:'';
		$records=$conn->prepare("SELECT count(id) FROM productos WHERE id=?");
		$records->execute([$id]);
		if($records->fetchColumn()>0){
			$records=$conn->prepare("SELECT * FROM productos WHERE id=? limit 1");
			$records->execute([$id]);
			$product = $records->fetch(PDO::FETCH_ASSOC);
			$nombre = $product["nombre"];
			$cate = $product["categoria"];
			$descripcion = $product["descripcion"];
			$precio = $product["precio"];
			$imagen = $product["imagen"];
		}

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
						<li class="active"><a href="productEN.php">Product</a></li>
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
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">

							<li class="active"><?php echo$nombre ?></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="<?php echo$imagen ?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">

							<div class="product-preview">
								<img src="<?php echo$imagen ?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php echo$nombre ?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div>
								<h3 class="product-price">$<?php echo$precio ?>.00</h3>
							</div>
							<p><?php echo$descripcion ?></p>
							<div class="product-options">
								<label>
									Pieces
									<select class="input-select">
										<option value="0">1</option>
										<option value="0">2</option>
										<option value="0">3</option>
									</select>
								</label>
								<label>
									Color
									<select class="input-select">
										<option value="0">Red</option>
										<option value="0">Blue</option>
										<option value="0">Green</option>
									</select>
								</label>
							</div>

							<div class="add-to-cart">

								<button class="add-to-cart-btn" onclick="alert('The product has been added to cart');"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							</div>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#"><?php echo$cate ?></a></li>
							</ul>



						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>


							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?php echo$descripcion ?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->

								<!-- /tab2  -->

								<!-- tab3  -->

										<!-- /Rating -->

										<!-- Reviews -->

										<!-- /Reviews -->

										<!-- Review Form -->

										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<?php
	include "footerEN.php"
?>