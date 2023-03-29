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
						<li class="active"><a href="sobre_nosotrosEN.php">About us</a></li>
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
					<div class="text-center">
					<div class="col-md-12">
						<div class="text-center">
							<h3 class="breadcrumb-tree">About</h3>
							<h3 class="breadcrumb-tree">Us</h3>
							<br><br><br>
						</div>
						<div class="col-md-6">
							<p>This website was created in the year 2022, by future engineers of the Information Technology career, the development of this page was inspired by the momentary situation that we are living at this moment, created to facilitate the purchase of products to all the people of all Mexico, for it was taken agreement with companies distributors of these products. mexico, for this we made an agreement with distributors of these products. products. </p><br>
								Corporate Values:  <br>
						        <li>Quality: In service and administration.</li>
								<li>Efficiency: In the delivery of products and service.</li>
								<li>Availability: Service and attention 24hrs a day.</li>
								<li>Attention: Good customer service/li>
								<li>Innovation: New product creation and launch/li>
								<br><br><br><br>
						</div>
						<div class="col-md-6">
							<img src="img/Organigrama.png" alt="nosotros" style="height:28rem; width:55rem"><br><br><br><br>
						</div>

						<div class="col-md-6">
							<div class="text-center">
							<h3 class="breadcrumb-header">Mission</h3><br>
								<ul class="breadcrumb-tree">
									<li><a href="">Mission</a></li>
									<li class="active">Of the website</li>
								</ul><br><br>
								<p>Our mission as a company of sales of technological products is to offer many sales solutions for these products, since right now in 2022 the sales increased too much and also the problems when trying to get these products, this through a high quality service, reliable technology, with a cutting edge design, and a team with a spirit of service.</p><br>
							</div>
						</div>
						<br><br>
						<div class="col-md-6">
							<div class="text-center">
								<h3 class="breadcrumb-header">VISION</h3><br>
								<ul class="breadcrumb-tree">
									<li><a href="">Vision </a></li>
									<li class="active">Of the website</li>
								</ul><br><br>
								<p>We plan to be the best alternative of technological sales in Mexico at the moment, seeking to exploit the opportunities that the online media allows us to promote a business, where our quality is reflected in an excellent relationship with the customer, and where our prosperity behaves in our workers and suppliers.</p>
							</div>
						</div>

						</div>
					</div>
					</div>
					<!-- /row -->
					</div>
				<!-- /container -->
					</div>
		</div>
		<!-- /SECTION -->
		<?php
	include "footerEN.php"
?>