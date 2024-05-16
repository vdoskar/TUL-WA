<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if (empty($_SESSION["user_nickname"])) {
    header("Location: index.php");
    exit();
}

global $db;
require_once 'BookManager.php'; // Připojení souboru s třídou pro správu uživatelů

// Vytvoření instance třídy BookManager s existujícím připojením k databázi
$bookManager = new BookManager($db);

// Zpracování přihlašovacího formuláře
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $bookData = [
        'title' => $_POST['title'],
        'authors' => $_POST['authors'],
        'main_category' => $_POST['main_category'],
        'sub_category' => $_POST['sub_category'],
        'price' => $_POST['price'],
        'currency' => $_POST['currency'],
        'isbn' => $_POST['isbn'],
        'year' => $_POST['year'],
        'pages' => $_POST['pages'],
        'recommendation' => implode(', ', $_POST['recommendation']),
        'description' => $_POST['description'],
        'image_url' => $_POST['image_url'],
    ];

    if ($bookManager->save($bookData)) {
        echo '<div class="alert alert-success">Kniha byla úspěšně přidána.</div>';
    } else {
        echo '<div class="alert alert-danger">Knihu se nepodařilo přidat.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Small Business - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/my-styles.css" rel="stylesheet" />
</head>
<body>
<?php
$navPath = __DIR__ . '/include/navigation.php';
if (file_exists($navPath) && is_readable($navPath)) {
    include $navPath;
} else {
    echo 'Navigace není dostupná.';
}
?>

<!-- Page Content-->
<div class="container px-4 px-lg-5">
    <h2>Přidat novou knihu</h2>
    <form action="bookInsertForm.php" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Název knihy:*</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="authors" class="form-label">Autoři:*</label>
            <input type="text" class="form-control" id="authors" name="authors" required>
        </div>
        <div class="mb-3">
            <label for="main_category" class="form-label">Hlavní kategorie:*</label>
            <select name="main_category" id="main_category" class="form-select" required>
                <option value=""></option>
                <option value="beletrie">Beletrie</option>
                <option value="odborna">Odborná</option>
                <option value="detska">Dětská</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="sub_category" class="form-label">Podkategorie:</label>
            <select name="sub_category" id="sub_category" class="form-select">
                <option value=""></option>
                <option value="Beletrie">Beletrie</option>
                <option value="Odborná literatura">Odborná</option>
                <option value="Dětská pohádka">Dětská</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Cena:*</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="currency" class="form-label">Měna:*</label>
            <select name="currency" id="currency" class="form-select" required>
                <option value="CZK">CZK</option>
                <option value="EUR">EUR</option>
                <option value="USD">USD</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN:*</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Rok vydání:*</label>
            <input type="number" class="form-control" id="year" name="year" required>
        </div>
        <div class="mb-3">
            <label for="pages" class="form-label">Počet stran:*</label>
            <input type="number" class="form-control" id="pages" name="pages" required>
        </div>
        <div class="mb-3">
            <label for="recommendation" class="form-label">Doporučení:</label>
            <br>
            <input type="checkbox" name="recommendation[]" value="Studenti" id="recommendation1">
            <label for="recommendation1">Studenti</label>
            <br>
            <input type="checkbox" name="recommendation[]" value="Hobíci" id="recommendation2">
            <label for="recommendation2">Hobíci</label>
            <br>
            <input type="checkbox" name="recommendation[]" value="Profesionálové" id="recommendation3">
            <label for="recommendation3">Profesionálové</label>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Popis:*</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">URL obrázku:</label>
            <input type="text" class="form-control" id="image_url" name="image_url">
        </div>
<!--        <div class="mb-3">-->
<!--            <label for="image_source" class="form-label">Obrázek:</label>-->
<!--            <input type="file" id="image_source" name="image_source">-->
<!--        </div>-->
        <button type="submit" class="btn btn-primary mb-3">Přidat knihu</button>
    </form>
</div>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script>
    document.querySelector('form').onsubmit = function(event) {
        const price = document.getElementById('price').value;
        const year = document.getElementById('year').value;
        const pages = document.getElementById('pages').value;
        const mainCategory = document.getElementById('main_category').value;
        const subCategory = document.getElementById('sub_category').value;

        if (price < 0 || year < 0 || pages < 0) {
            alert('Cena, rok vydání a počet stran musí být kladné číslo.');
            event.preventDefault();
        }

        if (mainCategory === subCategory) {
            alert('Podkategorie nesmí být stejná jako hlavní kategorie.');
            event.preventDefault();
        }
    };
</script>
</body>
</html>
