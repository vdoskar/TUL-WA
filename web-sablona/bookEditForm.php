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
        'book_id' => $_POST['book_id'],
        'title' => $_POST['title'],
        'authors' => $_POST['authors'],
        'main_category' => $_POST['main_category'],
        'sub_category' => $_POST['sub_category'],
        'price' => $_POST['price'],
        'currency' => $_POST['currency'],
        'isbn' => $_POST['isbn'],
        'year' => $_POST['year'],
        'pages' => $_POST['pages'],
        'recommendation' => !empty($_POST['recommendation']) ? implode(', ', $_POST['recommendation']) : '',
        'description' => $_POST['description'],
        'image_url' => $_POST['image_url'],
        'updated_at' => date('Y-m-d H:i:s'),
    ];

    if ($bookManager->save($bookData)) {
        echo '<div class="alert alert-success">Kniha byla úspěšně editována.</div>';
    } else {
        echo '<div class="alert alert-danger">Knihu se nepodařilo editovat.</div>';
    }
}

$existingBook = $bookManager->getBook($_GET['book_id']);
if (empty($existingBook["recommendation"])) {
    $existingBook["recommendation"] = ',';
}
print_r($existingBook["recommendation"]);

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
    <form action="bookEditForm.php?book_id=<?php echo $existingBook["book_id"]; ?>" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Název knihy:*</label>
            <input type="text" class="form-control" id="title" name="title" required value="<?php echo $existingBook["title"]; ?>">
        </div>
        <div class="mb-3">
            <label for="authors" class="form-label">Autoři:*</label>
            <input type="text" class="form-control" id="authors" name="authors" required value="<?php echo $existingBook["authors"]; ?>">
        </div>
        <div class="mb-3">
            <label for="main_category" class="form-label">Hlavní kategorie:*</label>
            <select name="main_category" id="main_category" class="form-select" required>
                <option value=""></option>
                <option value="beletrie" <?php if($existingBook["main_category"] == "beletrie") echo "selected"; ?>>Beletrie</option>
                <option value="odborna" <?php if($existingBook["main_category"] == "odborna") echo "selected"; ?>>Odborná</option>
                <option value="detska" <?php if($existingBook["main_category"] == "detska") echo "selected"; ?>>Dětská</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="sub_category" class="form-label">Podkategorie:</label>
            <select name="sub_category" id="sub_category" class="form-select">
                <option value=""></option>
                <option value="Beletrie" <?php if($existingBook["sub_category"] == "Beletrie") echo "selected"; ?>>Beletrie</option>
                <option value="Odborná literatura" <?php if($existingBook["sub_category"] == "Odborná literatura") echo "selected"; ?>>Odborná</option>
                <option value="Dětská pohádka" <?php if($existingBook["sub_category"] == "Dětská pohádka") echo "selected"; ?>>Dětská</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Cena:*</label>
            <input type="number" class="form-control" id="price" name="price" required value="<?php echo $existingBook["price"]; ?>">
        </div>
        <div class="mb-3">
            <label for="currency" class="form-label">Měna:*</label>
            <select name="currency" id="currency" class="form-select" required>
                <option value="CZK" <?php if($existingBook["currency"] == "CZK") echo "selected"; ?>>CZK</option>
                <option value="EUR" <?php if($existingBook["currency"] == "EUR") echo "selected"; ?>>EUR</option>
                <option value="USD" <?php if($existingBook["currency"] == "USD") echo "selected"; ?>>USD</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN:*</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required value="<?php echo $existingBook["isbn"]; ?>">
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Rok vydání:*</label>
            <input type="number" class="form-control" id="year" name="year" required value="<?php echo $existingBook["year"]; ?>">
        </div>
        <div class="mb-3">
            <label for="pages" class="form-label">Počet stran:*</label>
            <input type="number" class="form-control" id="pages" name="pages" required value="<?php echo $existingBook["pages"]; ?>">
        </div>
        <div class="mb-3">
            <label for="recommendation" class="form-label">Doporučení:</label>
            <br>
            <input type="checkbox" name="recommendation[]" value="Studenti" id="recommendation1"
                <?php if(in_array("Studenti", explode($existingBook["recommendation"], ","))) echo "checked"; ?>
            >
            <label for="recommendation1">Studenti</label>
            <br>
            <input type="checkbox" name="recommendation[]" value="Hobíci" id="recommendation2"
                <?php if(in_array("Hobíci", explode($existingBook["recommendation"], ","))) echo "checked"; ?>
            >
            <label for="recommendation2">Hobíci</label>
            <br>
            <input type="checkbox" name="recommendation[]" value="Profesionálové" id="recommendation3"
                <?php if(in_array("Profesionálové", explode($existingBook["recommendation"], ","))) echo "checked"; ?>
            >
            <label for="recommendation3">Profesionálové</label>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Popis:*</label>
            <textarea class="form-control" id="description" name="description" required ><?php echo $existingBook["description"]; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">URL obrázku:</label>
            <input type="text" class="form-control" id="image_url" name="image_url" value="<?php echo $existingBook["image_url"]; ?>">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Editovat knihu</button>
        <input type="text" name="book_id" hidden value="<?php echo $existingBook["book_id"]; ?>" >
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
