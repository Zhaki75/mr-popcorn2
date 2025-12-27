    <?php
    session_start();

    ?>
    
    <?php
    $title = "Liste des films";
    $description= "Découvrez la liste...";
    $keywords = "Cinéma, répertoire, film, dwwm";
    ?>
    
    <?php include_once __DIR__ . "/../partials/head.php"; ?>

    <?php include_once __DIR__ . "/../partials/nav.php"; ?>

        <!-- Main -->
         <main class="container">
            <h1 class="text-center my-3 display-5">Liste des films</h1>

            <div class="d-flex justify-content-end align-items-center my-3">
                <a href="/create.php" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    Ajouter film
                </a>
            </div>

            <?php if(isset($_SESSION['success']) && !empty($_SESSION['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <?= $_SESSION['success']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']); ?>
                
                <?php endif ?>
         </main>
    
    <?php include_once __DIR__ . "/../partials/footer.php"; ?>

    <?php include_once __DIR__ . "/../partials/foot.php"; ?>