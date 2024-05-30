<?php

require_once "include/dbConnection.php";
global $conn;

class User
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function registerUser($firstName, $lastName, $nickname, $email, $password)
    {
        try {
            $sql = "
                INSERT INTO users (first_name, last_name, nickname, email, password, is_admin) 
                VALUES (?, ?, ?, ?, ?, 0)
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssss", $firstName, $lastName, $nickname, $email, $password);
            $stmt->execute();

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

$user = new User($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST["first_name"]);
    $lastName = htmlspecialchars($_POST["last_name"]);
    $nickname = htmlspecialchars($_POST["nickname"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = hash("sha256", $_POST["pass1"]);

    if ($user->registerUser($firstName, $lastName, $nickname, $email, $password)) {
        $registrationMessage = "Registrace proběhla úspěšně";
    } else {
        $registrationMessage = "Registrace se nezdařila";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once("include/head.php"); ?>
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
<h1 class="honk-honk text-center mt-5">Registrační formulář</h1>
<div id="main">
    <?php
    if (!empty($registrationMessage)) {
        echo "<p class='text-center'>$registrationMessage</p>";
    }
    ?>
</div>

<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container px-4 px-lg-5">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>