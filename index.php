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
                $buttonSubmit = '<div class="d-flex flex-row-reverse bd-highlight mt-4">
                                <button name="enregistrer" type="submit" class="btn btn-primary">Enregistrer des données</button> </div>';
                if(isset($_GET['add'])) { 
                    echo '<p class="h1 text-center">Ajouter des données</p>';
                    include './includes/form.inc.html';
                    echo $buttonSubmit . '</form>';
                } 
                else if (isset($_GET['addmore'])) {
                    include './includes/form2.inc.php';
                    echo print_r($table);
                }              
                elseif(isset($_POST['enregistrer'])){
                    
                    $prenom = htmlspecialchars($_POST['first_name']);
                    $nom = htmlspecialchars($_POST['last_name']);
                    $age = htmlspecialchars($_POST['age']);
                    $size = htmlspecialchars($_POST['size']);
                    $sex = htmlspecialchars($_POST['sex_type']);
                    $html = $_POST['html'];
                    $css = $_POST['css'];
                    $js = $_POST['javascript'];
                    $php = $_POST['php'];
                    $mysql = $_POST['mysql'];
                    $bootstrap = $_POST['bootstrap'];
                    $symfony = $_POST['Symfony'];
                    $react = $_POST['react'];
                    $color = $_POST['color'];
                    $dob = $_POST['date'];
                    $nameImg = $_FILES['userfile']['name'];
                    $typeImg = $_FILES['userfile']['type'];
                    $tmp_nameImg = $_FILES['userfile']['tmp_name'];
                    $errorImg = $_FILES['userfile']['error'];
                    $sizeImg =  $_FILES['userfile']['size'];

                    $tableFull = array (
                            "first_name" => $prenom,
                            "last_name" => $nom,
                            "age" => $age,
                            "size" => $size,
                            "civility" => $sex,
                            "html" => $html,
                            "css" => $css,
                            "javascript" => $js,
                            "php" => $php,
                            "mysql" => $mysql,
                            "bootstrap" => $bootstrap,
                            "symfony" => $symfony,
                            "react" => $react,
                            "color" => $color,
                            "dob" => $dob,
                            "img" => $img = array (
                                        "name" => $nameImg,
                                        "type" => $typeImg,
                                        "tmp_name" => $tmp_nameImg,
                                        "error" => $errorImg,
                                        "size" => $sizeImg,
                            )
                    );

                    $table = array_filter($tableFull);
                    $_SESSION['table'] = $table;

                    if (empty($_FILES['userfile'])) {
                        unset ($_SESSION['table']['img']);
                        echo '<div class="alert alert-dismissible alert-success">
                            <p class="text-center mb-1 mt-2">Données Sauvegardées</p></div>';
                    } else {
                        move_uploaded_file($tmp_nameImg, './uploaded/' . $nameImg);
                        $tabExtension = explode('.', $nameImg);
                        $extension = strtolower(end($tabExtension));
                        $extensionsAutorisees = ['jpg', 'png', 'jpeg'];

                        if ($errorImg == 4) {
                            echo '<p class="alert-danger text-center pb-3 pt-4">Aucun fichier n\'a été téléchargé</p>';
                            unset($_SESSION['table']);
                        } elseif(in_array($extension,$extensionsAutorisees) === false) {
                            echo '<p class="alert-danger text-center pb-3 pt-4">Extension "' .$extension . '" non prise en charge';
                            unset($_SESSION['table']);
                        } elseif($errorImg == 2) {
                            echo '<p class="alert-danger text-center pb-3 pt-4">La taille de l\'image doit être inférieure à 2Mo</p>';
                            unset($_SESSION['table']);
                        } elseif($errorImg == 1 || $errorImg == 3 || $errorImg > 4) {
                            echo '<p class="alert-danger text-center pb-3 pt-4">error: '.$errorImg.'</p>';
                            unset($_SESSION['table']);
                        }elseif ($errorImg == 0) {
                            $table = array_filter($tableFull);
                            $_SESSION['table'] = $table;
                            echo '<div class="alert alert-dismissible alert-success">
                                <p class="text-center mb-1 mt-2">Données Sauvegardées</p></div>';   
                        }
                    }

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

                                // if ($table['civility'] = 'man') {
                                //     $sex = 'Mr';
                                // } else {
                                //      $sex = 'Mme';
                                // }


                                    $sex = 'man' ? 'Mr' : 'Mme' ;


                            echo '<p>'. $sex .' '. $table['first_name'] . ' ' . $table['last_name'] .'<br> j`ai '. $age .' ans et je mesure '. $size . 'm. </p>' ;

                            $table['last_name'] = strtoupper($table['last_name']);
                            $table['first_name'] = ucwords($table['first_name']);

                            
                            echo '<p class="h3 text-start mt-4 fs-6"> ===> Construction d\'une phrase après MAJ du tableau </p>';
                            echo '<p>' . $sex . ' ' . $table['first_name'] . ' ' . $table['last_name'] . '<br> j`ai ' . $age . ' ans et je mesure ' . $size . 'm. </p>';

                            $table['size'] = str_replace('.', ',', $table['size']);
                            
                            echo '<p class="h3 text-start mt-4 fs-6"> ===> Affichage d\'une virgule à la place du point pour la taille </p>';
                            echo '<p>' . $sex . ' ' . $table['first_name'] . ' ' . $table['last_name'] . '<br> j`ai ' . $age . ' ans et je mesure ' . $table['size'] . 'm. </p>';

                        } elseif(isset($_GET['loop'])) {
                            echo '<p class="h2 text-center">Boucle</p>
                            <p class="h3 text-start mt-5 fs-6"> ===> Lecture du tableau à l\'aide d\'une boucle foreach </p>';

                            $i = 0;
                            foreach ($table as $property => $propertyValue) {
                                if ($property != 'img') {
                                    echo 'à la ligne n°' . $i . ' correspond la clé "' . $property . '" et contient "' . $propertyValue . '"<br>';
                                    $i++;
                                } elseif (($table['img']['name'] == true && $property == 'img')) {
                                    echo 'à la ligne n°' . $i . ' correspond la clé "' . $property . '" et contient <br>';
                                    echo "<img class='w-100' src='./uploaded/" . $table['img']['name'] . "'>";
                                    $i++;
                                } else {
                                    break;
                                }
                            }
                            

                            
                        } elseif (isset($_GET['function'])) {
                            echo '<p class="h2 text-center">fonction</p>
                            <p class="h3 text-start mt-5 fs-6"> ===> J\'utilise ma function readTable() </p>';

                            function readTable(){
                                $i = 0;
                                $table = $_SESSION['table'];
                                foreach ($table as $property => $propertyValue) {
                                    if ($property != 'img') {
                                        echo 'à la ligne n°' . $i . ' correspond la clé "' . $property . '" et contient "' . $propertyValue . '"<br>';
                                        $i++;
                                    } elseif (($table['img']['name'] == true && $property == 'img')) {
                                        echo 'à la ligne n°' . $i . ' correspond la clé "' . $property . '" et contient <br>';
                                        echo "<img class='w-100' src='./uploaded/" . $table['img']['name'] . "'>";
                                        $i++;
                                    } else {
                                        break;
                                    }
                                }
                            }
                            readTable ();
                        } elseif (isset($_GET['del'])) {
                            unset ($_SESSION['table']);
                            $delFile = "./uploaded/".$table['img']['name'];
                                unlink($delFile);
                            if (empty($_SESSION['table'])) {
                                echo '<div class="alert alert-dismissible alert-success">
                                <p class="text-center mb-1 mt-2">Données Supprimées</p></div>';
                            }
                        } 
                            else {
                                echo '<a role="button" class=" btn btn-primary me-2" href="index.php?add">Ajouter des données</a>';
                                echo '<a role="button" class=" btn btn-secondary" href="index.php?addmore">Ajouter plus de données</a>';
                            }
                    }
                    else {
                        echo '<a role="button" class=" btn btn-primary me-2" href="index.php?add">Ajouter des données</a>' ;
                        echo '<a role="button" class=" btn btn-secondary" href="index.php?addmore">Ajouter plus de données</a>';
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