// Ajouter un produit au panier
quantite:let number;
let number;
number;
function addToCart(id, nom, prix, image) {
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

    // Vérifier si le produit est déjà dans le panier
    let existingProductIndex = cart.findIndex(product => product.id === id);

    if (existingProductIndex >= 0) {
        // Si le produit est déjà dans le panier, augmenter la quantité
        cart[existingProductIndex].quantite += 1;
    } else {
        // Si le produit n'est pas dans le panier, l'ajouter
        cart.push({ id: id, nom: nom, prix: prix, image: image, quantite: 1 });
    }

    sessionStorage.setItem('cart', JSON.stringify(cart));

    alert('Produit ajouté au panier!');
}

// Charger les produits dans le panier
document.addEventListener('DOMContentLoaded', function() {
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    let cartTableBody = document.querySelector('.cart-table tbody');

    if (cart.length > 0) {
        cart.forEach(function(product) {
            let row = document.createElement('tr');

            row.innerHTML = `
                <td>
                    <img src="${product.image}" alt="${product.nom}" style="width: 50px; height: auto; margin-right: 10px;">
                    <a href="#">${product.nom}</a>
                </td>
                <td>€${product.prix.toFixed(2)}</td>
                <td><input type="number" value="${product.quantite}" min="1" onchange="updateCart('${product.id}', this.value)"></td>
                <td>€${(product.prix * product.quantite).toFixed(2)}</td>
            `;

            cartTableBody.appendChild(row);
        });
    } else {
        cartTableBody.innerHTML = '<tr><td colspan="4">Votre panier est vide.</td></tr>';
    }
});

// Mettre à jour la quantité dans le panier
function updateCart(id, quantite) {
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

    let product = cart.find(product => product.id === id);

    if (product) {
        product.quantite = parseInt(quantite);
        sessionStorage.setItem('cart', JSON.stringify(cart));

        // Recharger la page pour mettre à jour le sous-total
        location.reload();
    }
}