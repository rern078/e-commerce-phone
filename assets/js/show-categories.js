document.addEventListener('DOMContentLoaded', function () {
    const allProducts = document.querySelectorAll('.showproduct');
    const categoryButtons = document.querySelectorAll('.view-all');

    categoryButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove 'active' class from all category buttons
            categoryButtons.forEach(btn => btn.classList.remove('active'));

            const category = button.classList[1]; // Assuming the second class is the category
            if (category === 'all') {
                allProducts.forEach(showproduct => {
                    showproduct.style.display = 'block';
                });
            } else {
                allProducts.forEach(showproduct => {
                    if (showproduct.classList.contains(category)) {
                        showproduct.style.display = 'block';
                    } else {
                        showproduct.style.display = 'none';
                    }
                });
            }

            button.classList.add('active');
        });
    });
});