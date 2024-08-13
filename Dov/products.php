<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="products.css" rel="stylesheet">
    <title>produits</title>
</head>
<body>
<div class="page-container">
<?php include 'header.inc.php'; ?>
<main>
    <div class="product-listing">
        <aside class="sidebar">
            <div class="shopBy">
                <h2>Shop By</h2>
            </div>
            <div class="filter" >
                <h3 >Categories </h3>
                <ul >
                    <li><a href="#">Sac de sport (50)</a></li>
                    <li><a href="#">Basket (10)</a></li>
                    <li><a href="#">Short (50)</a></li>
                    <li><a href="#">Chaussettes (12)</a></li>
                    <li><a href="#">Maillot (37)</a></li>
                    <li><a href="#">Slip (25)</a></li>
                    <li><a href="#">Brassière (8)</a></li>
                    <li><a href="#">Tee-Shirt (88)</a></li>
                    <li><a href="#">Sweat à capuche (12)</a></li>
                    <li><a href="#">Legging (55)</a></li>
                    <li><a href="#">Veste (2)</a></li>
                    <li><a href="#">Robe (18)</a></li>
                </ul>
            </div>

            <div class="filter" >
                <h3 >Prix</h3>
                <label>
                    <input type="range" min="0" max="10000" step="100" value="5000">
                </label>
            </div>

            <div class="filter">
                <h3>Color</h3>
                <div class="colors">
                    <span style="background-color: red;"></span>
                    <span style="background-color: blue;"></span>
                    <span style="background-color: green;"></span>
                    <span style="background-color: yellow;"></span>
                    <span style="background-color: purple;"></span>
                    <span style="background-color: black;"></span>
                </div>
            </div>

            <div class="filter">
                <h3>Brand</h3>
                <label><input type="checkbox"> Karma (50)</label>
                <label><input type="checkbox"> Ideas (50)</label>
            </div>

        </aside>

        <div class="products">
            <div class="banner">
                <img src="pack/ressources/img-03.png" alt="Banner" class="img-fluid" >
            </div>
            <div class="row under-banner">
                <div class="col-md-6 text-left">
                    <label>150 item(s)</label>
                </div>
                <div class="col-md-6 ">
                    <div style="text-align: right">
                        <img src="pack/ressources/img-04.png" class="img-fluid" alt="Image 04">
                        <img src="pack/ressources/img-05.png" class="img-fluid" alt="Image 05">
                        <img src="pack/ressources/img-06.png" class="img-fluid" alt="Image 06">
                        <img src="pack/ressources/img-07.png" class="img-fluid" alt="Image 07">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="row code">
                        <?php
                        // nombre de produits par page
                        $productsPerPage = 6;
                        // déterminer la page actuelle
                        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        // calculer l'offset
                        $offset = ($currentPage - 1) * $productsPerPage;

                        // Ouvrir le fichier prod.csv
                        if (($handle = fopen("prod.csv", "r")) !== FALSE) {
                            // Lire la première ligne pour obtenir les en-têtes de colonne
                            $headers = fgetcsv($handle, 1000);
                            // Compteur de produits
                            $count = 0;
                            // Boucle pour lire les lignes et les afficher en fonction de la page actuelle
                            while (($data = fgetcsv($handle, 1000)) !== FALSE) {
                                // Vérifier que le nombre d'éléments correspond
                                if (count($headers) == count($data)) {
                                    if ($count >= $offset && $count < $offset + $productsPerPage) {
                                        // Associer les données aux en-têtes de colonnes
                                        $product = array_combine($headers, $data);
                                        // Afficher les produits
                                        echo '<div class="col-md-4">';
                                        echo '<div class="p-3 border bg-light text-center product-item">';
                                        echo '<img src="' . $product['image'] . '" class="img-fluid" alt="' . $product['nom'] . '">';
                                        echo '<h5>' . $product['nom'] . '</h5>';
                                        echo '<p>€ ' . $product['prix'] . '</p>';
                                        echo '<div class="d-flex justify-content-center align-items-center">';
                                        echo '<form method="post" action="products.php" style="display:inline-block; margin-right: 5px;">';
                                        echo '<input type="image" src="pack/ressources/img-11.png" alt="Submit" onclick="addToCart(\'' . $product['id'] . '\', \'' . $product['nom'] . '\', ' . $product['prix'] . ', \'' . $product['image'] . '\')">';
                                        echo '</form>';
                                        echo '<img src="pack/ressources/img-12.png" alt="image 12" style="margin-right: 5px;">';
                                        echo '<img src="pack/ressources/img-13.png" alt="image 13">';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                    $count++;
                                }
                            }
                            fclose($handle);
                        } else {
                            echo "Erreur lors de l'ouverture du fichier CSV.";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="pagination" style="text-align: center; width: 100%;">
                <?php
                // Calculer le nombre total de produits
                if (($handle = fopen("prod.csv", "r")) !== FALSE) {
                    fgetcsv($handle, 1000); // Ignorer les en-têtes
                    $totalProducts = 0;
                    while (fgetcsv($handle, 1000)) {
                        $totalProducts++;
                    }
                    fclose($handle);
                }
                // Calculer le nombre total de pages
                $totalPages = ceil($totalProducts / $productsPerPage);

                // Afficher les liens de pagination
                if ($currentPage > 1) {
                    echo '<a href="?page=' . ($currentPage - 1) . '">&laquo; Précédent</a>';
                }
                for ($i = 1; $i <= $totalPages; $i++) {
                    if ($i == $currentPage) {
                        echo '<strong>' . $i . '</strong>';
                    } else {
                        echo '<a href="?page=' . $i . '">' . $i . '</a>';
                    }
                }
                if ($currentPage < $totalPages) {
                    echo '<a href="?page=' . ($currentPage + 1) . '">Suivant &raquo;</a>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
</main>
<?php include 'footer.inc.php'; ?>
<script src="panier.js"></script>
</body>
</html>