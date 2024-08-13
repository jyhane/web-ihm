// cart.js
function addToCart(id, nom, prix, image) {
    // Journaliser pour s'assurer que la fonction est appelée
    console.log("Ajout au panier:", { id, nom, prix, image });

    // Récupérer le panier du stockage local ou l'initialiser s'il n'existe pas
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Vérifier si le produit est déjà dans le panier
    const existingProductIndex = cart.findIndex(item => item.id === id);

    if (existingProductIndex !== -1) {
        // Si le produit est déjà dans le panier, augmenter sa quantité
        cart[existingProductIndex].quantity += 1;
    } else {
        // Si le produit n'est pas dans le panier, l'ajouter
        const product = {
            id: id,
            nom: nom,
            prix: prix,
            image: image,
            quantity: 1
        };
        cart.push(product);
    }

    // Sauvegarder le panier dans le stockage local
    localStorage.setItem('cart', JSON.stringify(cart));

    // Journaliser le panier pour vérifier son état avant l'alerte
    console.log("Panier mis à jour:", cart);

    // Afficher un message pop-up de succès
    alert('Produit ajouté au panier avec succès !');
}

// Appeler displayCart lorsque la page du panier se charge
if (window.location.pathname.includes('draft_shoppingCart.php')) {
    displayCart();
}

document.addEventListener('DOMContentLoaded', function() {
    displayCart();
});

function displayCart() {

    console.log("Affichage du panier début");

    // Récupérer le panier du stockage local ou l'initialiser s'il n'existe pas
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartTableBody = document.querySelector('.cart-table tbody');

    cartTableBody.innerHTML = ''; // Effacer toutes les lignes existantes

    let subtotal = 0;

    cart.forEach(product => {
        const row = document.createElement('tr');

        const productTotal = product.prix * product.quantity;
        subtotal += productTotal;

        row.innerHTML = `
            <td>
                <img src="${product.image}" alt="${product.nom}" class="cart-image" style="width: 50px; height: 50px;"> 
                ${product.nom}
            </td>
            <td>€ ${product.prix.toFixed(2)}</td>
            <td>${product.quantity}</td>
            <td>€ ${productTotal.toFixed(2)}</td>
        `;

        cartTableBody.appendChild(row);

        console.log("bouclage du produit");
    });

    updateCartTotal(subtotal);
}

function updateCartTotal(subtotal) {
    const totalElement = document.querySelector('.order-total p');
    totalElement.textContent = `Total: €${subtotal.toFixed(2)}`;
}

// Fonction pour supprimer un produit du panier
function removeFromCart(id) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Filtrer le panier pour supprimer le produit correspondant à l'id
    cart = cart.filter(item => item.id !== id);

    // Sauvegarder le panier mis à jour dans le stockage local
    localStorage.setItem('cart', JSON.stringify(cart));

    // Mettre à jour l'affichage du panier
    displayCart();
}

// Mise à jour de la fonction displayCart pour inclure le bouton de suppression
function displayCart() {
    console.log("Affichage du panier début");

    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartTableBody = document.querySelector('.cart-table tbody');

    cartTableBody.innerHTML = ''; // Effacer toutes les lignes existantes

    let subtotal = 0;

    cart.forEach(product => {
        const row = document.createElement('tr');

        const productTotal = product.prix * product.quantity;
        subtotal += productTotal;

        row.innerHTML = `
            <td>
                <img src="${product.image}" alt="${product.nom}" class="cart-image" style="width: 50px; height: 50px;"> 
                ${product.nom}
            </td>
            <td>€ ${product.prix.toFixed(2)}</td>
            <td>${product.quantity}</td>
            <td>€ ${productTotal.toFixed(2)}</td>
            <td>
                <img src="pack/ressources/cart-02.png" alt="Supprimer" style="cursor: pointer;" onclick="removeFromCart('${product.id}')">
            </td>
        `;

        cartTableBody.appendChild(row);

        console.log("bouclage du produit");
    });

    updateCartTotal(subtotal);
}

// Fonction existante pour mettre à jour le total du panier
function updateCartTotal(subtotal) {
    const totalElement = document.querySelector('.order-total p');
    totalElement.textContent = `Total: €${subtotal.toFixed(2)}`;
}