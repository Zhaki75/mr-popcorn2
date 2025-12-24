
   <?php
    $title = "Nouveau film";
    $description= "Ajout d'un nouveau film...";
    $keywords = "Cinéma, répertoire, film, dwwm";
    ?>
    
    
    <?php include_once __DIR__ . "/../partials/head.php"; ?>

    <?php include_once __DIR__ . "/../partials/nav.php"; ?>

        <!-- Main -->
         <main class="container">
            <h1 class="text-center my-3 display-5">Nouveau film</h1>

            <!-- Formulaire des nouveau films -->
             <div class="container">
               <div class="col-md-8 col-lg-5 mx-auto p-4 bg-white shadow rounded">
                  <form method="post">
                     <div class="mb-3">
                        <label for="title">Titre <span class="text-danger">*</label>
                        <input type="text" name="title" id="title" class="form-control" autofocus>
                     </div>
                     <div class="mb-3">
                        <label for="title">Note / 5</label>
                        <input type="number" min="0" max="5" step=".5" inputmode="decimal" name="rating" id="title" class="form-control" autofocus>
                     </div>
                     <div class="mb-3">
                        <label for="comment">Laissez un commentaire</label>
                        <textarea name="comment" id="comment" class="form-control"></textarea>

                     </div>
                     <div>
                        <input type="submit" value="Ajouter" class="w-100 btn btn-primary shadow">
                     </div>
                  </form>
               </div>
             </div>
         </main>
    
    <?php include_once __DIR__ . "/../partials/footer.php"; ?>

    <?php include_once __DIR__ . "/../partials/foot.php"; ?>