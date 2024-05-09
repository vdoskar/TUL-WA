<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("include/head.php"); ?>
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
    <section>
        <div class="container h-80">
            <div class="row d-flex justify-content-center align-items-center h-80">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form class="mx-1 mx-md-4" method="POST" action="userRegistrationSaveToDb.php">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="text" id="first_name" name="first_name"
                                                       class="form-control"
                                                       required/>
                                                <label class="form-label" for="first_name">Your First Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="text" id="last_name" name="last_name" class="form-control"
                                                       required/>
                                                <label class="form-label" for="last_name">Your Last Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="text" id="nickname" name="nickname" class="form-control"
                                                       required/>
                                                <label class="form-label" for="nickname">Your nickname</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="email" id="email" name="email" class="form-control"
                                                       required/>
                                                <label class="form-label" for="email">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="password"
                                                       id="pass1"
                                                       name="pass1"
                                                       class="form-control"
                                                       required
                                                       pattern="^(?=.*[A-Z])(?=.*\d).{8,}$"
                                                       title="Heslo musí mít minimálně 8 znaků, alespoň jedno velké písmeno a alespoň jedno číslo."
                                                />
                                                <label class="form-label" for="pass1">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="password" id="pass2" name="pass2" class="form-control"
                                                       required/>
                                                <label class="form-label" for="pass2">Repeat your password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                    class="btn btn-primary btn-lg">Register
                                            </button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="assets/login.webp" class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

    // write a script that pre-fills the form with valid data
    document.getElementById('first_name').value = 'John';
    document.getElementById('last_name').value = 'Doe';
    document.getElementById('nickname').value = 'johndoex';
    document.getElementById('email').value = 'vladimir.doskar@tul.cz';
    document.getElementById('pass1').value = 'Password1';
    document.getElementById('pass2').value = 'Password1';

</script>
<script>
    document.querySelector("form").onsubmit = function (event) {

        const pass1 = document.getElementById("pass1").value;
        const pass2 = document.getElementById("pass2").value;

        if (pass1 !== pass2) {
            alert("Hesla se neshodují");
            return;
        }
    };
</script>
</body>

</html>