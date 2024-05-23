<?php

session_start(); // Spusť session pro zjištění, zda je uživatel přihlášen

// Zjisti, zda je uživatel přihlášen
if (empty($_SESSION['user_nickname'])) {
    header("Location: userLoginForm.php");
    exit();

}
?>

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
	<h1 class="honk-honk text-center mt-5">Seznam knih</h1>
	<div class="container px-4 px-lg-5" id="main">
		<table class="table">
            <thead>
                <tr>
                    <th>Název knihy</th>
                    <th>Autoři</th>
                    <th>Hlavní kategorie</th>
                    <th>Podkategorie</th>
                    <th>Cena a měna</th>
                    <th>ISBN</th>
                    <th>Rok vydání</th>
                    <th>Počet stran</th>
                    <th>Doporučeno od</th>
                    <th>Obrázek</th>
                    <th>Akce</th>
                </tr>
            </thead>
            <tbody>
                <?php

                include 'BookManager.php';
                global $db;

                $bookManager = new BookManager($db);
                $books = $bookManager->getAllBooks();
                
                foreach ($books as $book) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($book['title']) . '</td>';
                    echo '<td>' . htmlspecialchars($book['authors']) . '</td>';
                    echo '<td>' . htmlspecialchars($book['main_category']) . '</td>';
                    echo '<td>' . htmlspecialchars($book['sub_category']) . '</td>';
                    echo '<td>' . htmlspecialchars($book['price']) . ' ' . $book['currency'] . '</td>';
                    echo '<td>' . htmlspecialchars($book['isbn']) . '</td>';
                    echo '<td>' . htmlspecialchars($book['year']) . '</td>';
                    echo '<td>' . htmlspecialchars($book['pages']) . '</td>';
                    echo '<td>' . htmlspecialchars($book['recommendation']) . '</td>';
                    echo '<td><img src="' . $book['image_url'] . '" alt="obrázek knihy" width="100"></td>';
                    echo '<td><a class="btn btn-primary" href="bookEditForm.php?book_id=' . $book['book_id'] . '">Upravit</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
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