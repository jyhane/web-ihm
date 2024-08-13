<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="panier.css" rel="stylesheet">
        <title>panier</title>
    </head>
<body>
<div class="page-container">
    <?php include 'header.inc.php'; ?>
    <main>
        <h2>Shopping Cart</h2>
        <table class="cart-table">
            <thead>
            <tr>
                <th>Article</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Sous-total</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <!-- Les lignes de produits seront générées par JavaScript -->
            </tbody>
        </table>
        <div class="summary">
            <div class="shipping">
                <h4>Frais d'envoi</h4>
                <form>
                    <label for="country">Pays *</label>
                    <input type="text" id="country" name="country">
                    <label for="state">Adresse *</label>
                    <input type="text" id="state" name="state">
                    <label for="zip">Code postal *</label>
                    <input type="text" id="zip" name="zip">
                    <button type="button">Demander une réduction</button>
                </form>
            </div>
            <div class="coupon">
                <h4>Code Promo</h4>
                <form>
                    <label for="coupon">Entrer un code promo</label>
                    <input type="text" id="coupon" name="coupon">
                    <button type="button">Appliquer le code promo</button>
                </form>
            </div>
            <div class="order-total">
                <h4>Commande totale</h4>
                <p>Total: €0.00</p> <!-- Ce total est mis à jour par JavaScript -->
                <button type="button">Vérifier</button>
            </div>
        </div>
</div>
    </main>
    <?php include 'footer.inc.php'; ?>
    <script src="panier.js"></script>
</body>
</html>