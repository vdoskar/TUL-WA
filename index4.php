<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="styles/style.css">
	<title>Sekce 4</title>
</head>

<body>
	<h1>Sekce 4</h1>
	<br>
	<ul>
		<li><a href="index.php">Sekce 1</a></li>
		<li><a href="index2.php">Sekce 2</a></li>
		<li><a href="index3.php">Sekce 3</a></li>
		<li><a href="index4.php">Sekce 4</a></li>
		<li><a href="index5.php">Sekce 5</a></li>
	</ul>
	<br>

	<form class="form" action="#" method="get">
		<label for="name">Name:</label>
		<input type="text" name="name"><br><br>

		<label for="sex">Sex:</label>
		<input type="radio" name="sex" id="male" value="male">
		<label for="male">Male</label>
		<input type="radio" name="sex" id="female" value="female">
		<label for="female">Female</label> <br><br>

		<label for="country">Country: </label>
		<select name="country" id="country">
			<option>Select an option</option>
			<option value="nepal">Nepal</option>
			<option value="usa">USA</option>
			<option value="australia">Australia</option>
		</select><br><br>

		<label for="message">Message:</label><br>
		<textarea name="message" id="message" cols="30" rows="4"></textarea><br><br>

		<input type="color" name="color" id="color">
		<label for="newsletter">Fav color?</label><br><br>

		<input type="checkbox" name="newsletter" id="newsletter">
		<label for="newsletter">Subscribe?</label><br><br>

		<input type="submit" value="Submit">
	</form>

</body>

</html>