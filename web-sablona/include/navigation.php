<?php

session_start(); // Spusť session pro zjištění, zda je uživatel přihlášen

// Zjisti, zda je uživatel přihlášen
if (isset($_SESSION['user_nickname'])) {
    $user_display = $_SESSION['user_nickname'];
} else {
    $user_display = 'nepřihlášen';
}
?>

<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="index.php">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Domů</a></li>
                <li class="nav-item"><a class="nav-link" href="userRegistrationForm.php">Registrace</a></li>
                <?php if (isset($_SESSION['user_nickname'])) { ?>
                    <li class="nav-item"><a class="nav-link" href="bookInsertForm.php">Přidat knihu</a></li>
                    <li class="nav-item"><a class="nav-link" href="userLogout.php">Odhlášení</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link" href="userLoginForm.php">Přihlášení</a></li>
                <?php } ?>

                <li class="nav-item"><span class="nav-link text-<?php
                    echo isset($_SESSION['user_nickname']) ? 'success' : 'danger'; ?>"><?php
                        echo $user_display; ?></span></li>
            </ul>
        </div>
    </div>
</nav>