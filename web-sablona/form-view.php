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

    <?php

    print_r($_POST);

    ?>

	<!-- Page Content-->
	<h1 class="honk-honk text-center mt-5">Registrační formulář</h1>

    <div id="main">
        <div class="form-group">
            <label>Email:</label>
            <p id="email" class="form-control"></p>
        </div>
        <div class="form-group">
            <label>Název:</label>
            <p id="name" class="form-control"></p>
        </div>
        <div class="form-group">
            <label>Zpráva:</label>
            <p id="message" class="form-control"></p>
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
    <script>
        const params = new URLSearchParams(window.location.search);
        document.getElementById('email').textContent = params.get('email');
        document.getElementById('name').textContent = params.get('first_name') + ' ' + params.get('last_name');
        document.getElementById('message').textContent = params.get('message');
    </script>
</body>

</html>