<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="draft_prod.css" rel="stylesheet">
    <title>Drafts Produits - Page 1</title>
</head>
<body>
<?php include 'header.inc.php'; ?>
<main>
    <h1>Design - Page 1</h1>
    <div class="product-listing">
        <aside class="sidebar">
            <!-- Sidebar content here -->
        </aside>
        <div class="products">
            <div class="banner">
                <img src="pack/ressources/img-03.png" alt="Banner">
            </div>
            <div class="container">
                <!-- First row with three products -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="p-3 border bg-light text-center">
                            <img src="pack/ressources/prodA.png" class="img-fluid" alt="sac Adidas">
                            <h5>Sac de sport</h5>
                            <p>€ 20.00</p>
                            <a href="chariot.php?id=sac" id="sac" alt="sacAdidas">
                                <img src="pack/ressources/img-11.png" alt="addToCart">
                                <img src="pack/ressources/img-12.png" alt="12">
                                <img src="pack/ressources/img-13.png" alt="13">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border bg-light text-center">
                            <img src="pack/ressources/prod2.png" class="img-fluid" alt="basket Adidas">
                            <h5>Basket</h5>
                            <p><span class="prix-original">€ 220.00</span> € 180</p>
                            <a href="chariot.php?id=basket" id="basket" alt="basket">
                                <img src="pack/ressources/img-11.png" alt="addToCart">
                                <img src="pack/ressources/img-12.png" alt="12">
                                <img src="pack/ressources/img-13.png" alt="13">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border bg-light text-center">
                            <img src="pack/ressources/prod3.png" class="img-fluid" alt="short Adidas">
                            <h5>Short</h5>
                            <p><span class="prix-original">€ 89.00</span></p>
                            <a href="chariot.php?id=short" id="short" alt="short">
                                <img src="pack/ressources/img-11.png" alt="addToCart">
                                <img src="pack/ressources/img-12.png" alt="12">
                                <img src="pack/ressources/img-13.png" alt="13">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination">
                <a href="page2.prod.php">next &raquo;</a>
            </div>
        </div>
    </div>
</main>
<?php include 'footer.inc.php';?>
</body>
</html>
