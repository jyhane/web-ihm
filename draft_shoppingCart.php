<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="draft_shoppingCart.css" rel="stylesheet">
    <title>Draft_ShoppingCart</title>
</head>
<body>
<?php include 'header.inc.php'; ?>
<main>
    <h1>Shopping Cart</h1>
    <div class="success-message">
        L'article a bien été ajouté au panier !
    </div>
    <table class="cart-table">
        <thead>
        <tr>
            <th>Article</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Sous-total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><img src="item1.png" alt="Item 1"><a href="#">Nam Tempus Dictumib</a></td>
            <td>€100.00</td>
            <td><input type="number" value="1" min="1"></td>
            <td>€100.00</td>
        </tr>
        <tr>
            <td><img src="item2.png" alt="Item 2"><a href="#">Nam Tempus Dictumib</a></td>
            <td>€100.00</td>
            <td><input type="number" value="1" min="1"></td>
            <td>€100.00</td>
        </tr>
        </tbody>
    </table>
    <div class="summary">
        <div class="shipping">
            <h2>Frais d'envoi</h2>
            <form>
                <label for="country">Pays *</label>
                <input type="text" id="country" name="country">
                <label for="state">Adresse *</label>
                <input type="text" id="state" name="state">
                <label for="zip">Code postal *</label>
                <input type="text" id="zip" name="zip">
                <button type="button">Get a Quote</button>
            </form>
        </div>
        <div class="coupon">
            <h2>Code Promo</h2>
            <form>
                <label for="coupon">Entrer un code promo</label>
                <input type="text" id="coupon" name="coupon">
                <button type="button">Appliquer le code promo</button>
            </form>
        </div>
        <div class="order-total">
            <h2>Commande totale</h2>
            <p>Sous-total: €200.00</p>
            <p>Total: €200.00</p>
            <button type="button">Vérifier</button>
        </div>
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
</main>
<?php
include 'footer.inc.php';
?>
<!--<footer>
    <div class="footer-links">
        <a href="#">Trial & Free Softwares</a>
        <a href="#">Banner 280 x 160</a>
        <a href="#">Gifts & Events</a>
        <a href="#">Submit your apps</a>
    </div>
    <div class="footer-info">
        <div>
            <h3>SoftMarket</h3>
            <ul>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Shipping & Return</a></li>
                <li><a href="#">Terms of Use</a></li>
            </ul>
        </div>
        <div>
            <h3>Global Resellers</h3>
            <ul>
                <li><a href="#">United States</a></li>
                <li><a href="#">England</a></li>
                <li><a href="#">China</a></li>
                <li><a href="#">Australia</a></li>
            </ul>
        </div>
        <div>
            <h3>Popular Categories</h3>
            <ul>
                <li><a href="#">Uncle omnes</a></li>
                <li><a href="#">Isle natale</a></li>
                <li><a href="#">Si voluptatem</a></li>
                <li><a href="#">Acquarium</a></li>
            </ul>
        </div>
        <div>
            <h3>From Our Blog</h3>
            <ul>
                <li><a href="#">Lorem ipsum velitpatern quia voluptas</a></li>
                <li><a href="#">Nesciunt quae autem nam sequi</a></li>
                <li><a href="#">Qui dolorem ipsum quia dolor sit amet</a></li>
            </ul>
        </div>
    </div>
    <div class="social-media">
        <a href="#">Facebook</a>
        <a href="#">Twitter</a>
        <a href="#">YouTube</a>
        <a href="#">RSS Feed</a>
    </div>
</footer>-->
</body>
</html>