<p class="h1 text-center">Ajouter plus de données</p>

<div class="container">
    <div class="row">
        <div name="Prenom" class="card col-md-7 mx-auto my-1">
            <?php include './includes/form.inc.html'; ?>
        </div>
        <div name="Connaissances" class="card col-md-4 mx-auto my-1">
            <header class="text-start">Connaissances</header>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    HTML
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    CSS
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    JavaScript
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    PHP
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    MySQL
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Bootstrap
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Symfony
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    React
                </label>
            </div>
            <label for="exampleColorInput" class="form-label">Couleur préférée</label>
            <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
            <label class="form-label mt-2">Date de naissance</label>
            <input type="date" class="form-control w-50" id="exampleInputPassword1">
        </div>
        <div name="JoindreUneImage" class="card col-11 mx-auto my-1">
            <div class="form-group">
                <label for="formFile" class="form-label mt-4">Joindre une image (jpg ou png)</label>
                <input class="form-control" type="file" accept="image/*,.pdf" id="formFile">
            </div>
        </div>
    </div>
</div>