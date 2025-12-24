
   <?php
   session_start();
   // var_dump($_SERVER);
   // die()


   if ($_SERVER['REQUEST_METHOD']=== 'POST'){

   }

   $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
   die();
   
   ?>
   
   
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
                        <textarea name="comment" id="comment" class="form-control" rows="4"></textarea>
                     </div>
                     <input type="hidden" name="csrf_token" value="<?=  $_SESSION['csrf_token']; ?>">
                     <div>
                        <input type="submit" value="Ajouter" class="w-100 btn btn-primary shadow">
                     </div>
                  </form>
               </div>
             </div>
         </main>
    
    <?php include_once __DIR__ . "/../partials/footer.php"; ?>

    <?php include_once __DIR__ . "/../partials/foot.php"; ?>