
   <?php
   session_start();
   // var_dump($_SERVER);
   // die()

   require_once __DIR__ . "/../functions/db.php";

   if ($_SERVER['REQUEST_METHOD']=== 'POST'){

      if (
         !isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || 
         empty($_POST['csrf_token']) || empty($_SESSION['csrf_token']) ||
         $_POST['csrf_token'] !== $_SESSION['csrf_token']
         
      ){
         header('Location: create.php');
         die();
      }
      unset($_SESSION['csrf_token']);
      unset($_POST['csrf_token']);

      // die('Continue la partie');

      if (!isset($_POST['honey_pot']) || !empty($_POST['honey_pot']) ){
         header('Location: create.php');
         die();
      }
      unset($_POST['honey_pot']);

      // die('Continuer la partie');
      $formErrors = [];

         if(isset($_POST['title'])) {
            $title = trim($_POST['title']);

         if(empty($title)){
            $formErrors['title'] = "Le titre est obligatoite.";
         }
         else if(mb_strlen($title) > 255) {
            $formErrors['title'] = "Le titre ne doit pas dépasser 255 caractères.";
         
         }
      }

      // var_dump($_POST). die();

      if (isset($_POST['rating']) && $_POST['rating'] !== ""){
         $rating = trim($_POST['rating']);

      if (!is_numeric($rating)){
         $formErrors['rating'] = "la note doit être un nombre.";
      } else if(floatval($rating) < 0 || floatval($rating) > 5){
         $formErrors['rating'] = "la note doit être comprise entre 0 et 5.";
       }

      }


      if (isset($_POST['comment']) && $_POST['comment'] !== ""){
         $comment = trim($_POST['comment']);

         if (mb_strlen($comment) > 1000){
            $formErrors['comment'] = "le commentaire ne doit pas dépasser 1000 caractères";
         }

      }

         if (count($formErrors) > 0 ){
            
            $_SESSION['form_errors'] = $formErrors;


            $_SESSION['old'] = $_POST;


            header('Location: create.php');
            die();

         }

          $ratingRounted = null;

        if (isset ($_POST['rating']) && $_POST['rating'] !== ""){
            $ratingRounted = round($_POST['rating'], 1);
        }


            // die('continuer la partie');

            insertFilm($ratingRounted, $_POST);

            $_SESSION['success'] = "Le film a été ajouté à la liste avec succés.";

            header("Location: index.php");
            die();


      }

   $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
   // die();
   
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
             <div class="container mt-3">
               <div class="col-md-8 col-lg-5 mx-auto p-4 bg-white shadow rounded">

               <?php if(isset($_SESSION['form_errors']) && !empty($_SESSION['form_errors'])) : ?>
                  <div class="alert alert-danger" role="alert">
                     <ul>
                        <?php foreach($_SESSION['form_errors'] as $error) : ?>
                           <li><?= $error; ?></li>
                        <?php endforeach ?>
                        <?php unset($_SESSION['form_errors']); ?>

                     </ul>
                  </div>
                  <?php endif ?>

                     <form method="post">
                        <div class="mb-3">
                           <label for="title">Titre <span class="text-danger">*</span></label>
                           <input type="text" name="title" id="title" class="form-control" autofocus required value="<?= isset($_SESSION['old']['title']) && !empty($_SESSION['old']['title']) ? htmlspecialchars($_SESSION['old']['title']) : ''; unset($_SESSION['old']['title']); ?>">
                        </div>
                        <div class="mb-3">
                           <label for="rating">Note / 5</label>
                           <input type="number" min="0" max="5" step="0.5" inputmode="decimal" name="rating" id="rating" class="form-control" value="<?= isset($_SESSION['old']['rating']) && $_SESSION['old']['rating'] != "" ? htmlspecialchars($_SESSION['old']['rating']) : ''; unset($_SESSION['old']['rating']); ?>">
                        </div>
                        <div class="mb-3">
                           <label for="comment">Laissez un commentaire</label>
                           <textarea name="comment" id="comment" class="form-control" rows="4"><?= isset($_SESSION['old']['comment']) && !empty($_SESSION['old']['comment']) ? htmlspecialchars($_SESSION['old']['comment']) : ''; unset($_SESSION['old']['comment']); ?></textarea>
                           <small id="comment-counter">
                              0 / 1000 caractères
                           </small>
                        </div>
                        <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token'];?>">
                        <input type="hidden" name="honey_pot" value="">
                        <div>
                           <input formnovalidate type="submit" value="Ajouter" class="w-100 btn btn-primary shadow">
                        </div>
                  </form>

               </div>
             </div>
         </main>
    
    <?php include_once __DIR__ . "/../partials/footer.php"; ?>

    <?php include_once __DIR__ . "/../partials/foot.php"; ?>