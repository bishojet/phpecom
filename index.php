<?php 

session_start();
include_once 'inc/header.php'; 
include_once 'inc/navbar.php'; 

?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <?php
            if (isset($_SESSION['message'])) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                unset($_SESSION['message']);
            }
            ?>


            <h1>Hello, world!</h1>
            <button class="btn btn-success">Bootstrap</button>

        </div>
    </div>
</div>

<?php include_once 'inc/footer.php'; ?>