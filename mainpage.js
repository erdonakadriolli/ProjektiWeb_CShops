// mainpage.js

document.addEventListener('DOMContentLoaded', () => {
    // Event listener for category selection
    const categorySelect = document.getElementById('select-1');
    categorySelect.addEventListener('change', () => {
        const selectedCategory = categorySelect.value;
        alert(`You selected the category: ${selectedCategory}`);
    });

    // Event listener for search functionality
    const searchInput = document.getElementById('search-1');
    const searchButton = document.querySelector('img[src="images/search.png"]');

    searchButton.addEventListener('click', () => {
        const query = searchInput.value.trim();
        if (query) {
            alert(`Searching for: ${query}`);
        } else {
            alert('Please enter a search term.');
        }
    });

    // Event listener for "Shop Now" button
    const shopNowButton = document.getElementById('Submit-1');
    shopNowButton.addEventListener('click', () => {
        alert('Redirecting to the shop page...');
    });

    // Event listener for adding products to the cart
    const cartButtons = document.querySelectorAll('.container-5-1 img');
    cartButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            const productId = index + 1; // Assuming the product ID is based on the index
            fetch('/mainpage.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ productId }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(`${data.product.name} added to your cart.`);
                    } else {
                        alert(`Error: ${data.message}`);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });

    // "View All" button functionality
    const viewAllButtons = document.querySelectorAll('.search-2 input[type="submit"]');
    viewAllButtons.forEach(button => {
        button.addEventListener('click', () => {
            alert('Displaying all products in the selected category.');
        });
    });

    // Social media links functionality
    const socialLinks = document.querySelectorAll('.container-line a img');
    socialLinks.forEach(link => {
        link.addEventListener('click', () => {
            alert('Redirecting to social media platform...');
        });
    });
});