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
						<li class="active"><a href="indexEN.php">Home</a></li>
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
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/laptop1.png" alt="">
							</div>
							<div class="shop-body">
								<h3>PC<br>Gamers</h3>
								<a href="storeEN.php#pc"class="cta-btn">Buy Now<i class="fa fa-arrow-circle-right"></i></a>

							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="img/MOUSE1.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Peripherals<br>Colection</h3>
								<a href="storeEN.php#perif" class="cta-btn">Buy Now<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/iphone3.jfif" alt="">
							</div>
							<div class="shop-body">
								<h3>SmartPhones<br>Colection</h3>
								<a href="storeEN.php#cel" class="cta-btn">Buy Now<i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
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

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New PC´s</h3>
							<div class="section-nav">

							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										<?php foreach($results as $product){ ?>
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

									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->

		<div id="hot-deal" class="section"name="Prodcutos">
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<h3 class="title">BEST SELLER Smartphones</h3>
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
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Monitors
							</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>
						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div>
								<!-- product widget -->
								<?php foreach($resultsMonitor as $product ){ ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="<?php echo$product["imagen"]?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category"><?php echo$product["categoria"]?></p>
										<h3 class="product-name"><a href="productEN.php?id=<?php echo $product["id"]; ?>&token <?php echo hash_hmac("sha1", $product["id"], KEY_TOKEN);?>"><?php echo$product["nombre"]?></a></h3>
										<h4 class="product-price">$<?php echo$product["precio"]?>.00</h4>
									</div>
								</div>
								<?php } ?>
								<!-- /product widget -->
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Components</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
								<!-- product widget -->
								<?php foreach($resultsComp as $product ){ ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="<?php echo$product["imagen"]?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category"><?php echo$product["categoria"]?></p>
										<h3 class="product-name"><a href="productEN.php?id=<?php echo $product["id"]; ?>&token <?php echo hash_hmac("sha1", $product["id"], KEY_TOKEN);?>"><?php echo$product["nombre"]?></a></h3>
										<h4 class="product-price">$<?php echo$product["precio"]?>.00</h4>
									</div>
								</div>
								<?php } ?>
								<!-- /product widget -->
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Peripherals</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
								<!-- product widget -->
								<?php foreach($resultsPeri as $product ){ ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="<?php echo$product["imagen"]?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category"><?php echo$product["categoria"]?></p>
										<h3 class="product-name"><a href="productEN.php?id=<?php echo $product["id"]; ?>&token <?php echo hash_hmac("sha1", $product["id"], KEY_TOKEN);?>"><?php echo$product["nombre"]?></a></h3>
										<h4 class="product-price">$<?php echo$product["precio"]?>.00</h4>
									</div>
								</div>
								<?php } ?>
								<!-- /product widget -->
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
<?php
	include "footerEN.php"
?>