<?php include("header.php"); ?>

<style>

    .category-product-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .pagination-btn.active {
        background-color: #ff5722;
        color: white;
    }
    
    .category_products_section{
        min-height: 200px;
        max-height: 800px;
        overflow-y: auto;
        scroll-behavior: smooth;
        scrollbar-width: none;
    }
</style>

<div class="body_section">  

    <!-- Main Content -->
    <div class="max-w-9xl mx-auto mt-5 px-5 flex gap-5">
        <div class="flex-1">
            <!-- Products Title -->
            <div class="bg-white rounded-lg p-2 mb-2">
                <h1 class="text-2xl font-bold text-gray-800" id="categoryTitle">Category Name products</h1>
            </div>

            <!-- Products Grid -->
            <div class="bg-white rounded-lg p-2">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 category_products_section" id="catproductsGrid">
                    <!-- Products will be injected here -->
                </div>

                <!-- Pagination -->
                <div class="flex justify-center items-center mt-6 lg:mt-8 space-x-1 lg:space-x-2" id="paginationControls">
                    <!-- Pagination buttons will be injected dynamically -->
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Footer -->
<?php include("footer.php"); ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const baseUrl = "<?php echo $BASE_URL_LOCAL; ?>/products/get_products.php";
        const categorySlug = new URLSearchParams(window.location.search).get('category'); // Get category slug from URL
        const categoryTitle = document.getElementById("categoryTitle");
        const productsGrid = document.getElementById("catproductsGrid");
        const paginationControls = document.getElementById("paginationControls");

        let limit = 16; // Number of products per page
        let offset = 0; // Starting point for pagination
        let totalPages = 1; // Default number of pages

        fetchProducts();

        async function fetchProducts() {
            const response = await fetch(baseUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ 
                    category_name: categorySlug, 
                    limit: limit, 
                    offset: offset 
                })
            });
            const data = await response.json();

            if (data.status === "success") {
                totalPages = Math.ceil(data.pagination.total / limit);
                categoryTitle.textContent = `${categorySlug} products`; // Set category title
                renderProducts(data.data);
                renderPagination();
            } else {
                productsGrid.innerHTML = "<p>No products found in this category.</p>";
            }
        }

        function renderProducts(products) {
            productsGrid.innerHTML = ''; // Clear the grid
            products.forEach(product => {
                const productCard = document.createElement("div");
                productCard.classList.add("category-product-card", "border", "border-orange-300", "rounded-lg", "p-2", "lg:p-4", "transition-all", "duration-300", "hover:shadow-lg");

                const firstImage = product.photos.split(",")[0];
                const imageSrc = firstImage
                    ? `Johar_traders_uploads/product/${firstImage}`
                    : `Johar_traders_uploads/placeholder.png`;

                const displayName = product.name.length > 25 
                            ? product.name.slice(0, 25) + '...' 
                            : product.name;

                productCard.innerHTML = `
                        <a href="product-detail?slug=${product.slug}">
                            <div class="relative mb-4">
                                <img src="${imageSrc}" alt="${displayName}" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                                <p class="font-semibold text-gray-800 mb-2 text-sm lg:text-base">${displayName}</p>
                            </div>
                        </a>
                        <a href="product-detail?slug=${product.slug}" class="w-full bg-orange-600 text-white py-1 lg:py-2 px-6 rounded-lg hover:bg-orange-400 transition-colors text-sm lg:text-base">View</a>
                    `;
                productsGrid.appendChild(productCard);
            });
        }

        function renderPagination() {
            paginationControls.innerHTML = ''; // Clear pagination
            for (let page = 1; page <= totalPages; page++) {
                const pageButton = document.createElement("button");
                pageButton.classList.add("pagination-btn", "px-3", "py-2", "border", "rounded-md", "hover:bg-orange-600", "transition-colors");
                pageButton.textContent = page;
                pageButton.addEventListener('click', function() {
                    offset = (page - 1) * limit; // Calculate offset for the page
                    fetchProducts();
                });
                paginationControls.appendChild(pageButton);
            }
        }
    });
</script>

