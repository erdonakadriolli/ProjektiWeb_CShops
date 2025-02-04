console.log("Butoni.js loaded!");

document.addEventListener("DOMContentLoaded", function() {
    let buttons = document.querySelectorAll(".add-to-cart");

    buttons.forEach(button => {
        button.addEventListener("click", function() {
            let product = this.getAttribute("data-product");
            addToCart(product);
        });
    });

    loadCart();
});

function addToCart(product) {
    fetch("../shporta.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `product_name=${encodeURIComponent(product)}`
    })
    .then(response => response.json())
    .then(data => {
        console.log("Server response:", data); 
        alert(data.message || data.error);
        loadCart();
    })
    .catch(error => console.error("Error adding to cart:", error));
}

function loadCart() {
    fetch("../viewShporta.php")
    .then(response => response.json()) 
    .then(parsedData => {
        console.log("Parsed cart data:", parsedData);

        let cartDiv = document.getElementById("cart");
        cartDiv.innerHTML = "<h2>Your Cart</h2>";

        if (!parsedData || parsedData.length === 0) {
            cartDiv.innerHTML += "<p>Cart is empty</p>";
            return;
        }

        parsedData.forEach(item => {
            let quantity = item.quantity ? item.quantity : 1;
            cartDiv.innerHTML += `<p>${item.product_name} (x${quantity})</p>`;
        });
    })
    .catch(error => console.error("Error loading cart:", error));
}
