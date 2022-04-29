<?php session_start();
if(isset($_SESSION['table'])) $table = $_SESSION['table'];
?>

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

                <?php
                if(isset($_GET['add'])) { 
                    include './includes/form.inc.html';
                }            
                elseif(isset($_POST['enregistrer'])){
                    $prenom = $_POST['first_name'];
                    $nom = $_POST['last_name'];
                    $age = $_POST['age'];
                    $size = $_POST['size'];
                    $sex = $_POST['sex_civility'];
                    

                    // if ($civility = $_GET['man']) {
                    //     $civility = 'man';
                    // } else {
                    //     $civility = 'women';
                    // }


                    $table = array (
                        "first_name" => $prenom,
                        "last_name" => $nom,
                        "age" => $age,
                        "size" => $size,
                        "civility" => $sex,
                    );
                    $_SESSION['table'] = $table;
                    echo '<div class="alert alert-dismissible alert-success">
                        <p class="text-center mb-1 mt-2">Données Sauvegardées</p></div>';

                } elseif(isset($_GET['debugging'])) { 

                    echo '<p class="h2 text-center">Débogage</p>
                    <p class="h3 text-start mt-4 fs-6">
                    ===> Lecture du tableau à l\'aide de la fonction print_r()
                    </p>';
                    print '<pre>';
                    print_r($table);
                    print '</pre>';
                    echo $_POST['civility'] ;
                    
                } 
                 elseif(isset($_GET['concatenation'])) { 

                    echo "<p class=\"h2 text-center\">Concaténation</p>

                        <div>
                            <p class=\"h3 text-start mt-4 fs-6\">
                                ===> Construction d'une phrase avec le contenu du tableau
                            </p> ";
                                echo "$sex_civility $first_name $last_name '<br> j'ai ' $age ' et je mesure ' $size;
                        </div>
                        <div>
                            <p class=\"h3 text-start mt-4 fs-6\">
                                ===> Construction d'une phrase après MAJ du tableau
                            </p>
                                echo '$sex_civility $first_name $last_name '<br> j'ai ' $age ' et je mesure ' $size;
                        </div>
                        <div>
                            <p class=\"h3 text-start mt-4 fs-6\">
                                ===> Affichage d'une virgule à la place du point pour la taille 
                            </p>
                                echo '$sex_civility $first_name $last_name '<br> j'ai ' $age ' et je mesure ' $size;
                        </div>";
                    
                    
                } 
                else {
                    echo '<a role="button" class=" btn btn-primary" href="index.php?add">Ajouter des données</a>' ; 
                }

                ?>

                </section>
            </div>
        </div>   
    </div>

    <?php include 'includes/footer.inc.html';  ?>

</body>
</html>