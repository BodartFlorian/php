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
                    $sex = $_POST['sex_type'];
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

                } else {
                    if (isset($table)) {
                        if(isset($_GET['debugging'])) { 

                            echo '<p class="h2 text-center">Débogage</p>
                            <p class="h3 text-start mt-5 fs-6"> ===> Lecture du tableau à l\'aide de la fonction print_r() </p>';
                            print '<pre>';
                            print_r($table);
                            print '</pre>';
                            
                        } elseif(isset($_GET['concatenation'])) { 
                            echo '<p class="h2 text-center">Concaténation</p>
                                <p class="h3 text-start mt-5 fs-6"> ===> Construction d\'une phrase avec le contenu du tableau </p>';

                            extract($table);

                                if ($table['civility'] = 'man') {
                                    $sex = 'Mr';
                                } else {
                                     $sex = 'Mme';
                                }

                            echo ''. $sex .' '. $table['first_name'] . ' ' . $table['last_name'] .'<br> j`ai '. $age .' ans et je mesure '. $size . 'm.' ;

                            $nomMajuscule = strtoupper($table['last_name']);
                            // $table['last_name']
                            echo '<p class="h3 text-start mt-4 fs-6"> ===> Construction d\'une phrase après MAJ du tableau </p>';
                            echo '' . $sex . ' ' . $table['first_name'] . ' ' . $nomMajuscule . '<br> j`ai ' . $age . ' ans et je mesure ' . $size . 'm.';
                            
                            echo '<p class="h3 text-start mt-4 fs-6"> ===> Affichage d\'une virgule à la place du point pour la taille </p>';
                            echo '' . $sex . ' ' . $table['first_name'] . ' ' . $table['last_name'] . '<br> j`ai ' . $age . ' ans et je mesure ' . $size . 'm.';

                        } elseif(isset($_GET['loop'])) {
                            echo '<p class="h2 text-center">Boucle</p>
                            <p class="h3 text-start mt-5 fs-6"> ===> Lecture du tableau à l\'aide d\'une boucle foreach </p>';


                            $i = 0;

                            foreach ($table as $property => $propertyValue) {
                                echo 'à la ligne n°' . $i . ' correspond la clé "' . $property . '" et contient "' . $propertyValue . '"<br>' ;
                                $i ++ ;
                            }
                            

                            
                        } elseif (isset($_GET['function'])) {
                            echo '<p class="h2 text-center">fonction</p>
                            <p class="h3 text-start mt-5 fs-6"> ===> J\'utilise ma function readTable() </p>';

                            

                            function readTable(){
                                $i = 0;
                                $table = $_SESSION['table'];
                                foreach ($table as $property => $propertyValue) {
                                    echo 'à la ligne n°' . $i . ' correspond la clé "' . $property . '" et contient "' . $propertyValue . '"<br>';
                                    $i++;
                                }
                            }
                            readTable ();

                        } elseif (isset($_GET['del'])) {
                            unset ($_SESSION['table']);
                            if (empty($_SESSION['table'])) {
                                echo '<div class="alert alert-dismissible alert-success">
                                <p class="text-center mb-1 mt-2">Données Supprimées</p></div>';
                            }
                        } 
                        else {
                            echo '<a role="button" class=" btn btn-primary" href="index.php?add">Ajouter des données</a>';
                        }
                    }
                    else {
                        echo '<a role="button" class=" btn btn-primary" href="index.php?add">Ajouter des données</a>' ; 
                    }
                }

                ?>

                </section>
            </div>
        </div>   
    </div>

    <?php include 'includes/footer.inc.html';  ?>

</body>
</html>