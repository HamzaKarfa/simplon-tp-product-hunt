<?php

if (isset($_POST['user_name'])) {
    setcookie('user_name', $_POST['user_name'], time() + 3600); //Cookie 1h
    $url = "index.php";
    $delay = 1;
    header("Refresh: $delay;url=$url");
}

include ROOT . 'src/Partials/header.php' 
?>

<main class='container-fluid d-flex justify-content-center flex-column pt-5 border '>

    <h1 class="mb-5 text-center"> Product Hunts </h1>

    <div class="row ">

        <div class=" col-xl-3 col-lg-1 ">
        </div>
        <div class="col-xl-6 col-lg-10 text-center m-0 p-0 ">

            <?php
            if (isset($_COOKIE['user_name'])) {
                include ROOT . 'src/Partials/product_list.php';
            } else {
                echo ("<h4>Créez un compte ou Connectez vous pour accéder au site.</h4> <hr>");
                include ROOT . 'src/Partials/index_login.php';
            }
            ?>

        </div>

        <div class=" col-xl-3 col-lg-1 ">
        </div>

    </div>

</main>

<?php include ROOT . 'src/Partials/footer.php' ?>
