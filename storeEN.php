<?php
session_start();
require "config/config.php";
require "config/database.php";
if (isset($_SESSION['user_id'])) {
	$records=$conn->prepare("SELECT id,name,lastname,email,password,rol  FROM users WHERE id = :id");
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$usuario = $records->fetch(PDO::FETCH_ASSOC);
	$user= null;
	if(count($usuario)>0){
		$user = $usuario;
	}

}

	// SELECT para PCs
	$records=$conn->prepare("SELECT * FROM productos WHERE categoria = 'PC'");
	$records->execute();
	$results = $records->fetchAll(PDO::FETCH_ASSOC);
	// SELECT para CELULAR
	$records=$conn->prepare("SELECT * FROM productos WHERE categoria = 'phone'");
	$records->execute();
	$resultsPhone = $records->fetchAll(PDO::FETCH_ASSOC);
	// SELECT para MONITOR
	$records=$conn->prepare("SELECT * FROM productos WHERE categoria = 'monitor'");
	$records->execute();
	$resultsMonitor = $records->fetchAll(PDO::FETCH_ASSOC);
	// SELECT para COMPONENTES
	$records=$conn->prepare("SELECT * FROM productos WHERE categoria = 'componente'");
	$records->execute();
	$resultsComp = $records->fetchAll(PDO::FETCH_ASSOC);
	// SELECT para PERFIFERICOS
	$records=$conn->prepare("SELECT * FROM productos WHERE categoria = 'periferico'");
	$records->execute();
	$resultsPeri = $records->fetchAll(PDO::FETCH_ASSOC);

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
						<li class="active"><a href="storeEN.php">All</a></li>
						<li class=""><a href="sobre_nosotrosEN.php">About us</a></li>
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
<!-- SECTION -->
<div class="section" id="pc">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<h3 class="title">PC'S</h3>
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										<?php foreach($results as $product ){ ?>
										<div class="product">
											<div class="product-img">
												<img src="<?php echo$product["imagen"]?>" alt="">
												<div class="product-label">
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo$product["categoria"]?></p>
												<h3 class="product-name"><a href="productEN.php?id=<?php echo $product["id"]; ?>&token <?php echo hash_hmac("sha1", $product["id"], KEY_TOKEN);?>"><?php echo$product["nombre"]?></a></h3>
												<h4 class="product-price">$<?php echo$product["precio"]?>.00</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
											</div>
											<div class="add-to-cart">
												<a href="productEN.php?id=<?php echo $product["id"]; ?>&token <?php echo hash_hmac("sha1", $product["id"], KEY_TOKEN);?>"><button class="add-to-cart-btn">Watch</button></a>
											</div>
										</div>
										<?php } ?>
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<!-- SECTION -->
		<div class="section" id="cel">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<h3 class="title">SmartPhones</h3>
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<?php foreach($resultsPhone as $product ){ ?>
										<div class="product">
											<div class="product-img">
												<img src="<?php echo$product["imagen"]?>" alt="">
												<div class="product-label">
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo$product["categoria"]?></p>
												<h3 class="product-name"><a href="productEN.php?id=<?php echo $product["id"]; ?>&token <?php echo hash_hmac("sha1", $product["id"], KEY_TOKEN);?>"><?php echo$product["nombre"]?></a></h3>
												<h4 class="product-price">$<?php echo$product["precio"]?>.00</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
											</div>
											<div class="add-to-cart">
												<a href="productEN.php?id=<?php echo $product["id"]; ?>&token <?php echo hash_hmac("sha1", $product["id"], KEY_TOKEN);?>"><button class="add-to-cart-btn">Watch</button></a>
											</div>
										</div>
										<?php } ?>
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<h3 class="title">Monitors</h3>
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-3">
										<!-- product -->
										<?php foreach($resultsMonitor as $product ){ ?>
										<div class="product">
											<div class="product-img">
												<img src="<?php echo$product["imagen"]?>" alt="">
												<div class="product-label">
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo$product["categoria"]?></p>
												<h3 class="product-name"><a href="productEN.php?id=<?php echo $product["id"]; ?>&token <?php echo hash_hmac("sha1", $product["id"], KEY_TOKEN);?>"><?php echo$product["nombre"]?></a></h3>
												<h4 class="product-price">$<?php echo$product["precio"]?>.00</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
											</div>
											<div class="add-to-cart">
												<a href="productEN.php?id=<?php echo $product["id"]; ?>&token <?php echo hash_hmac("sha1", $product["id"], KEY_TOKEN);?>"><button class="add-to-cart-btn">Watch</button></a>
											</div>
										</div>
										<?php } ?>
										<!-- /product -->
									</div>
									<div id="slick-nav-3" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<!-- SECTION -->
		<div class="section" id="perif">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<h3 class="title">Peripherals</h3>
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-4">
										<!-- product -->
										<?php foreach($resultsPeri as $product ){ ?>
										<div class="product">
											<div class="product-img">
												<img src="<?php echo$product["imagen"]?>" alt="">
												<div class="product-label">
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo$product["categoria"]?></p>
												<h3 class="product-name"><a href="productEN.php?id=<?php echo $product["id"]; ?>&token <?php echo hash_hmac("sha1", $product["id"], KEY_TOKEN);?>"><?php echo$product["nombre"]?></a></h3>
												<h4 class="product-price">$<?php echo$product["precio"]?>.00</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
											</div>
											<div class="add-to-cart">
												<a href="productEN.php?id=<?php echo $product["id"]; ?>&token <?php echo hash_hmac("sha1", $product["id"], KEY_TOKEN);?>"><button class="add-to-cart-btn">Watch</button></a>
											</div>
										</div>
										<?php } ?>
										<!-- /product -->
									</div>
									<div id="slick-nav-4" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<h3 class="title">Components</h3>
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-5">
										<!-- product -->
										<?php foreach($resultsComp as $product ){ ?>
										<div class="product">
											<div class="product-img">
												<img src="<?php echo$product["imagen"]?>" alt="">
												<div class="product-label">
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo$product["categoria"]?></p>
												<h3 class="product-name"><a href="productEN.php?id=<?php echo $product["id"]; ?>&token <?php echo hash_hmac("sha1", $product["id"], KEY_TOKEN);?>"><?php echo$product["nombre"]?></a></h3>
												<h4 class="product-price">$<?php echo$product["precio"]?>.00</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
											</div>
											<div class="add-to-cart">
												<a href="productEN.php?id=<?php echo $product["id"]; ?>&token <?php echo hash_hmac("sha1", $product["id"], KEY_TOKEN);?>"><button class="add-to-cart-btn">Watch</button></a>
											</div>
										</div>
										<?php } ?>
										<!-- /product -->
									</div>
									<div id="slick-nav-5" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<?php
	include "footerEN.php"
?>