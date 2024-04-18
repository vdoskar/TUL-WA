<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("include/head.php");?>
</head>

<body>
	<!-- Responsive navbar-->
    <?php
        $navPath = __DIR__ . "/include/navigation.php";
        if (is_readable($navPath)) {
            include $navPath;
        } else {
            echo "Navigace není dostupná";
        }
    ?>

	<!-- Page Content-->
	<h1 class="honk-honk text-center mt-5">HONK HONK</h1>
	<div class="container px-4 px-lg-5">
		<!-- Heading Row-->
		<div class="row gx-4 gx-lg-5 align-items-center my-5">
			<div class="col-lg-7">

				<div id="carouselExampleFade" class="carousel slide carousel-fade">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="https://picsum.photos/901/400" class="d-block w-100" alt="imidž">
						</div>
						<div class="carousel-item">
							<img src="https://picsum.photos/902/400" class="d-block w-100" alt="imidž">
						</div>
						<div class="carousel-item">
							<img src="https://picsum.photos/903/400" class="d-block w-100" alt="imidž">
						</div>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
						data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
						data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>
			<div class="col-lg-5">
				<h1 class="font-weight-light">Business Name or Tagline</h1>
				<p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it,
					but it makes a great use of the standard Bootstrap core components. Feel free to use this template
					for any project you want!</p>
				<a class="btn btn-primary" href="#!">Call to Action!</a>
			</div>
		</div>
		<!-- Call to Action-->
		<div class="card text-white bg-secondary my-5 py-4 text-center">
			<div class="card-body">
				<p class="text-white m-0">This call to action card is a great place to showcase some important
					information or display a clever tagline!</p>
			</div>
		</div>
		<!-- Content Row-->
		<div class="row gx-4 gx-lg-5">
			<div class="col-md-4 mb-5">
				<div class="card h-100">
					<div class="card-body">
						<h2 class="card-title">Card One</h2>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex
							numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
					</div>
					<div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
				</div>
			</div>
			<div class="col-md-4 mb-5">
				<div class="card h-100">
					<div class="card-body">
						<h2 class="card-title">Card Two</h2>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex
							natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore
							voluptates quos eligendi labore.</p>
					</div>
					<div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
				</div>
			</div>
			<div class="col-md-4 mb-5">
				<div class="card h-100">
					<div class="card-body">
						<h2 class="card-title">Card Three</h2>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex
							numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
					</div>
					<div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer-->
	<footer class="py-5 bg-dark">
		<div class="container px-4 px-lg-5">
			<p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
		</div>
	</footer>
	<!-- Bootstrap core JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Core theme JS-->
	<script src="js/scripts.js"></script>
</body>

</html>