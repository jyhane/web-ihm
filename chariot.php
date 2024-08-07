<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="chariot.css" rel="stylesheet">
    <title>Jyhane Pruvot - Shopping Cart</title>
</head>

<body>
<?php include 'header.inc.php'; ?>
    <main>
        <?php
        // Initialiser le tableau en dehors de la balise <main>
        $articles = [];

        // Vérifier si l'identifiant de l'article est passé en paramètre GET
        if (isset($_GET['id']))
            {
                // Récupérer l'identifiant de l'article depuis l'URL
                $articleId = $_GET['id'];
                // Ajouter l'article au tableau
                $articles[] = $articleId;
            }
        ?>
        <div class="row rowa">
            <div class="col-md-12">toto</div>
        </div>
        <div class="row rowb">
            <div class="col-md-12">titi</div>
        </div>
        <div class="row rowc">
            <div class="col-md-3">tutu</div>
            <div class="col-md-9" style="background-color: red;">lulu</div>
        </div>
        <div class="row fixe">
            <div class="col-md-3">
                <img src="pack/ressources/img-14.png" alt="">
            </div>
            <div class="col-md-3">
                <img src="pack/ressources/img-15.png" alt="">
            </div>
            <div class="col-md-3">
                <img src="pack/ressources/img-16.png" alt="">
            </div>
            <div class="col-md-3">
                <img src="pack/ressources/img-17.png" alt="">
            </div>
        </div>
        <!-- Afficher les articles ajoutés au panier -->
        <h2>Articles ajoutés au panier :</h2>
        <ul>
            <?php foreach ($articles as $article) : ?>
                <li><?php echo $article; ?></li>
            <?php endforeach; ?>
        </ul>
    </main>
<?php include 'footer.inc.php'; ?>
</body>
</html>