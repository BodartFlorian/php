<!DOCTYPE html>
<html lang="fr">

    <?php  include 'includes/head.inc.html';  ?>
<body>
     <?php include 'includes/header.inc.html';  ?>
     

     <div class="container">
        <div class="row">
            <div class="col-3">
                <nav>
                    <div class="d-grid gap-2">
                            <a type="button" class="btn btn-outline-secondary btn-block" href="index.php">Home</a>
                    </div>
                    
                    <?php
                    if (isset($table)) include_once './includes/ul.inc.php'; 
                    ?>
                </nav>
            </div>

            <div class="col-9">         
                <section>

                <a role="button" class=" btn btn-primary" href="index.php?add">Ajouter des données</a>

                <?php if(isset($_GET['add'])) { include './includes/form.inc.html';} 
                else {
                    echo ; 
                }?>
               

                <?php if(isset($_POST('formulaire.php'))){
                    $prenom = $_POST['first_name'];
                    $nom = $_POST['last_name'];
                    $age = $_POST['age'];
                    $size = $_POST['size'];
                    $civility = $_POST['civility'];
                    $table = array (
                        "first_name" => $prenom,
                        "last_name" => $nom,
                        "age" => $age,
                        "size" => $size,
                        "civility" => $civility,
                    );
                    $_SESSION['table'] = $table;
                    echo 'good';
                }


                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Something posted

                    if (isset($_POST['btnDelete'])) {
                        // btnDelete
                    } else {
                        // Assume btnSubmit
                    }
                }



                // données enregistrées 
                $isEnabled = true;
                // si données tableau enregistrées 
                if ($isEnabled == true) {
                    echo "apparition div alert succes";
                }

                ?>

                </section>
            </div>
        </div>   
    </div>
      
         <!-- include 'includes/ul.inc.php'; -->

    <?php include 'includes/footer.inc.html';  ?>

</body>
</html>