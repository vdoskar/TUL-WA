<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="styles/style.css">
	<title>Sekce 1</title>
</head>

<body>
	<h1>Sekce 1</h1>
	<br>
	<ul>
		<li><a href="index.php">Sekce 1</a></li>
		<li><a href="index2.php">Sekce 2</a></li>
		<li><a href="index3.php">Sekce 3</a></li>
		<li><a href="index4.php">Sekce 4</a></li>
		<li><a href="index5.php">Sekce 5</a></li>
	</ul>
	<br>
	<p><a href="web-sablona/index.php">BOOTSTRAP ŠABLONA</a></p>
	<p>amet consectetur adipisicing elit. Et ratione ut fuga, reiciendis unde, dicta ad atque sequi, fugit optio nisi
		minima explicabo eveniet error libero natus rerum perferendis ullam ea quam odio? Recusandae, laboriosam
		officiis, a eius, ratione debitis officia voluptatibus quis cupiditate assumenda repudiandae molestiae ducimus!
		Harum, veniam.</p>
	<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, magni.</p>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>

	<div id="box">
		<div id="dvdLogo"></div>
	</div>

	<script>
		var box = document.getElementById('box');
		var dvdLogo = document.getElementById('dvdLogo');

		var speedX = 20;
		var speedY = 20;

		function animate() {
			var boxRect = box.getBoundingClientRect();
			var dvdLogoRect = dvdLogo.getBoundingClientRect();

			if (dvdLogoRect.left < boxRect.left || dvdLogoRect.right > boxRect.right) {
				speedX = -speedX;
			}
			if (dvdLogoRect.top < boxRect.top || dvdLogoRect.bottom > boxRect.bottom) {
				speedY = -speedY;
			}

			dvdLogo.style.left = (dvdLogo.offsetLeft + speedX) + 'px';
			dvdLogo.style.top = (dvdLogo.offsetTop + speedY) + 'px';

			requestAnimationFrame(animate);

			console.log("prdel")
		}

		animate();
	</script>
</body>

</html>