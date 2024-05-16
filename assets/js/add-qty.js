
function increaseQty(qtyId) {
    var location = document.getElementById(qtyId);
    var currentQty = location.value;
    var qty = Number(currentQty) + 1;
    location.value = qty;
    updateCartQuantity(qty);
}

function decreaseQty(qtyId) {
    var location = document.getElementById(qtyId);
    var currentQty = location.value;
    if (currentQty > 1) {
        var qty = Number(currentQty) - 1;
        location.value = qty;
        updateCartQuantity(qty);
    }
}

function updateCartQuantity(cartQuantityId, qty) {
    document.getElementById(cartQuantityId).textContent = qty;
}

function addToCart() {
    var qty = document.getElementById('cartQty').value;
    var currentCartQty = parseInt(document.getElementById('cartQuantity').textContent);
    var newCartQty = currentCartQty + parseInt(qty);
    updateCartQuantity('cartQuantity', newCartQty);
}

function addToFavorite() {
    var qty = document.getElementById('cartQty').value;
    var currentCartQty = parseInt(document.getElementById('cartFavorite').textContent);
    var newCartQty = currentCartQty + parseInt(qty);
    updateCartQuantity('cartFavorite', newCartQty);
}

