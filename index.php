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
                    
                            <button type="button" class="btn btn-outline-secondary btn-block">Home</button>
                    
                    </div>
                </nav>
            </div>

            <div class="col-9">         
                <section>
                    <button type="button" class="btn btn-primary">Ajouter des données</button>
                    
                    <?php  include 'includes/form.inc.html'; ?>
                </section>
            </div>
        </div>   
    </div>
    
       
         
         <!-- include 'includes/ul.inc.php'; -->
         
         
         
    <?php include 'includes/footer.inc.html';  ?>

</body>
</html>