<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="draft_prod.css" rel="stylesheet">
    <title>Produits</title>
</head>
<body>
<?php include 'header.inc.php'; ?>
<main>
    <div class="product-listing">
        <aside class="sidebar">
            <h2>Shop By</h2>
            <p>______________________</p>
            <div class="filter">
                <h3>Categories</h3>
                <p>______________________</p>
                <ul>
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
            <div class="filter">
                <h3>Price</h3>
                <input type="range" min="0" max="10000" step="100" value="5000">
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
                <img src="pack/ressources/img-03.png" alt="Banner">
            </div>
            <div class="container">
                <div class="row">
                    <div class="row">
                        <?php
                        // Nombre de produits par page
                        $productsPerPage = 6;
                        // Déterminer la page actuelle
                        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        // Calculer l'offset
                        $offset = ($currentPage - 1) * $productsPerPage;

                        // Ouvrir le fichier CSV
                        if (($handle = fopen("prod.csv", "r")) !== FALSE) {
                            // Lire la première ligne pour obtenir les en-têtes de colonne
                            $headers = fgetcsv($handle, 1000, ",");
                            // Compteur de produits
                            $count = 0;
                            // Boucle pour lire les lignes et les afficher en fonction de la page actuelle
                            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                                if ($count >= $offset && $count < $offset + $productsPerPage) {
                                    // Associer les données aux en-têtes de colonne
                                    $product = array_combine($headers, $data);
                                    // Afficher les produits
                                    echo '<div class="col-md-4">';
                                    echo '<div class="p-3 border bg-light text-center product-item">';
                                    echo '<img src="' . $product['image'] . '" class="img-fluid" alt="' . $product['nom'] . '">';
                                    echo '<h5>' . $product['nom'] . '</h5>';
                                    echo '<p>' . $product['description'] . '</p>';
                                    echo '<p>€ ' . $product['prix'] . '</p>';
                                    echo '<a href="chariot.php?id=' . $product['id'] . '">';
                                    echo '<img id="cart" src="pack/ressources/img-11.png" alt="addToCart">';
                                    echo '</a>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                $count++;
                            }
                            fclose($handle);
                        } else {
                            echo "Erreur lors de l'ouverture du fichier CSV.";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="pagination">
                <?php
                // Calculer le nombre total de produits
                if (($handle = fopen("prod.csv", "r")) !== FALSE) {
                    fgetcsv($handle, 1000, ","); // Sauter les en-têtes
                    $totalProducts = 0;
                    while (fgetcsv($handle, 1000, ",")) {
                        $totalProducts++;
                    }
                    fclose($handle);
                }

                // Calculer le nombre total de pages
                $totalPages = ceil($totalProducts / $productsPerPage);

                // Afficher les liens de pagination
                if ($currentPage > 1) {
                    echo '<a href="?page=' . ($currentPage - 1) . '">&laquo; Previous</a>';
                }
                for ($i = 1; $i <= $totalPages; $i++) {
                    if ($i == $currentPage) {
                        echo '<strong>' . $i . '</strong>';
                    } else {
                        echo '<a href="?page=' . $i . '">' . $i . '</a>';
                    }
                }
                if ($currentPage < $totalPages) {
                    echo '<a href="?page=' . ($currentPage + 1) . '">Next &raquo;</a>';
                }
                ?>
            </div>
        </div>
    </div>
</main>
<?php include 'footer.inc.php';?>
</body>
</html  >