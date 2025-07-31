<?php include("header.php"); ?>

<style>
    .categories-dropdown:hover .category-modal {
        display: block;
    }
    
    .categories-dropdown:hover .dropdown-arrow {
        transform: rotate(180deg);
    }
    
    .shop-product-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .pagination-btn.active {
        background-color: #ff5722;
        color: white;
    }
    
    .filter-checkbox:checked + label {
        color: #ff5722;
        font-weight: 600;
    }
    
    .filter-section {
        border-bottom: 1px solid #e5e7eb;
    }
    
    .filter-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-in-out;
    }
    
    .filter-content.active {
        min-height: 400px;
        max-height: 800px;
    }
    .products_section{
        min-height: 500px;
        max-height: 800px;
        overflow-y: auto;
        scroll-behavior: smooth;
        scrollbar-width: none;
    }
    
    .filter-toggle {
        transition: transform 0.3s ease;
    }
    
    .filter-toggle.active {
        transform: rotate(180deg);
    }
    
    .child-category {
        margin-left: 20px;
        font-size: 0.9em;
        color: #6b7280;
    }
    
    .price-range-slider {
        -webkit-appearance: none;
        appearance: none;
        height: 4px;
        background: #ddd;
        outline: none;
        border-radius: 2px;
    }
    
    .price-range-slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        background: #ff5722;
        cursor: pointer;
        border-radius: 50%;
    }
    
    .price-range-slider::-moz-range-thumb {
        width: 20px;
        height: 20px;
        background: #ff5722;
        cursor: pointer;
        border-radius: 50%;
        border: none;
    }

    .filter-content {
        overflow-y: auto; /* Ensure overflow for the content */
        scroll-behavior: smooth;
        scrollbar-width: none;
    }

</style>

<div class="body_section">  

    <!-- Main Content -->
    <div class="max-w-9xl mx-auto mt-5 px-5 flex gap-5">
        <!-- Left Sidebar - Filters -->
        <div class="w-80 bg-white rounded-lg shadow-lg h-fit hidden lg:block">
            <div class="filter-section" id="categories-section">
                <div class="bg-orange-600 text-white p-4 font-bold text-lg rounded-t-lg flex justify-between items-center cursor-pointer" onclick="toggleFilter('categories')">
                    Categories
                    <svg class="w-4 h-4 filter-toggle" id="categories-toggle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
                <div class="filter-content active" id="categories-content">
                    <!-- <div class="p-4"> -->
                        <!-- Categories will be injected dynamically -->
                    <!-- </div> -->
                </div>
            </div>
        </div>

        <!-- Right Side - Products -->
        <div class="flex-1">
            <!-- Mobile Filter Button -->
            <div class="lg:hidden mb-4">
                <button onclick="toggleMobileFilters()" class="bg-orange-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Filters
                </button>
            </div>
            
            <!-- Mobile Filter Modal -->
            <div id="mobileFilterModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden lg:hidden">
                <div class="bg-white w-80 h-full overflow-y-auto">
                    <div class="p-4 border-b flex justify-between items-center">
                        <h3 class="text-lg font-bold">Filters</h3>
                        <button onclick="toggleMobileFilters()" class="text-gray-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Same filter content as desktop -->
                    <div class="p-4">
                        <!-- Categories -->
                        <div class="mb-6">
                            <h4 class="font-bold text-gray-800 mb-3">Categories</h4>
                            <div class="space-y-4">
                                <div>
                                    <div class="font-semibold text-gray-700 mb-2">Kitchen Appliances</div>
                                    <div class="ml-4 space-y-2">
                                        <div class="flex items-center">
                                            <input type="checkbox" id="mobile-mixie" class="filter-checkbox mr-3 text-orange-600">
                                            <label for="mobile-mixie" class="text-gray-600">Mixie Machine</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="mobile-grinding" class="filter-checkbox mr-3 text-orange-600">
                                            <label for="mobile-grinding" class="text-gray-600">Grinding & Pulverizers</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Price Range -->
                        <div class="mb-6">
                            <h4 class="font-bold text-gray-800 mb-3">Price Range</h4>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="mobile-price1" class="filter-checkbox mr-3 text-orange-600">
                                    <label for="mobile-price1" class="text-gray-600">Under $100</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="mobile-price2" class="filter-checkbox mr-3 text-orange-600">
                                    <label for="mobile-price2" class="text-gray-600">$100 - $500</label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Material -->
                        <div class="mb-6">
                            <h4 class="font-bold text-gray-800 mb-3">Material</h4>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="mobile-stainless" class="filter-checkbox mr-3 text-orange-600">
                                    <label for="mobile-stainless" class="text-gray-600">Stainless Steel</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="mobile-aluminum" class="filter-checkbox mr-3 text-orange-600">
                                    <label for="mobile-aluminum" class="text-gray-600">Aluminum</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Title -->
            <div class="bg-white rounded-lg p-2 mb-2">
                <h1 class="text-2xl font-bold text-gray-800">All products</h1>
            </div>

            <!-- Products Grid -->
            <div class="bg-white rounded-lg p-2">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 products_section" id="productsGrid">
                    <!-- Products will be injected dynamically -->
                </div>

                <!-- Pagination -->
                <div class="flex justify-center items-center mt-6 lg:mt-8 space-x-1 lg:space-x-2" id="paginationControls">
                    <!-- Pagination buttons will be injected dynamically -->
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    // Filter toggle functionality
    function toggleFilter(filterName) {
        const content = document.getElementById(filterName + '-content');
        const toggle = document.getElementById(filterName + '-toggle');
        
        content.classList.toggle('active');
        toggle.classList.toggle('active');
    }
    
    // Mobile filter modal
    function toggleMobileFilters() {
        const modal = document.getElementById('mobileFilterModal');
        modal.classList.toggle('hidden');
    }
        
    // Filter functionality
    document.querySelectorAll('.filter-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Here you would implement the actual filtering logic
            console.log('Filter changed:', this.id, this.checked);
        });
    });

    // Sort functionality
    document.getElementById('sort').addEventListener('change', function() {
        // Here you would implement the actual sorting logic
        console.log('Sort changed:', this.value);
    });

    // Pagination functionality
    document.querySelectorAll('.pagination-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            document.querySelectorAll('.pagination-btn').forEach(b => {
                b.classList.remove('active');
                b.style.backgroundColor = '';
                b.style.color = '';
            });
            
            // Add active class to clicked button (if it's a number)
            if (!this.querySelector('svg')) {
                this.classList.add('active');
            }
            
            console.log('Page changed');
        });
    });

    // Add to cart functionality
    document.querySelectorAll('.shop-product-card button').forEach(btn => {
        if (btn.textContent.includes('Add to cart')) {
            btn.addEventListener('click', function() {
                console.log('Added to cart:', this.closest('.shop-product-card').querySelector('h3').textContent);
            });
        }
    });

    // Wishlist functionality
    document.querySelectorAll('.shop-product-card .absolute button').forEach(btn => {
        btn.addEventListener('click', function() {
            console.log('Wishlist/Compare clicked');
        });
    });
</script>

<!-- Product Filter For Shop page -->
<script>
   let currentPage = 1;
    let selectedCategory = ""; // Initially no category is selected, fetch all products by default

    // Fetch Categories (display them in filter section)
    async function loadCategories() {
        try {
            const response = await fetch('<?php echo $BASE_URL_LOCAL; ?>/categories/get_categories.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ "limit": 100, "offset": 1 })
            });

            const result = await response.json();
            if (result.status === 'success') {
                const categoriesSection = document.getElementById('categories-content');
                result.data.forEach(category => {
                    categoriesSection.innerHTML += `
                    <div class="px-4">
                        <div class="mb-4">
                            <div class="font-semibold text-gray-800 mb-1">${category.name}</div>
                            <div class="flex items-center space-x-2">
                                <input type="radio" name="category" value="${category.name}" class="filter-checkbox" ${selectedCategory === category.name ? 'checked' : ''}>
                                <label for="${category.slug}" class="text-gray-600 cursor-pointer">${category.name}</label>
                            </div>
                        </div>
                    </div>
                    `;
                });

                // Add event listener to category checkboxes
                document.querySelectorAll('.filter-checkbox').forEach(checkbox => {
                    checkbox.addEventListener('change', handleCategoryFilterChange);
                });

                // If no category is selected, load products for all categories
                if (!selectedCategory) {
                    loadProducts("", currentPage); // Fetch all products by default (no category)
                }
            }
        } catch (error) {
            console.error('Error fetching categories:', error);
        }
    }

    // Handle category selection
    function handleCategoryFilterChange() {
        selectedCategory = document.querySelector('input[name="category"]:checked').value;
        currentPage = 1; // Reset to first page when changing category
        loadProducts(selectedCategory, currentPage); // Load products for the selected category
    }

    // Fetch Products based on selected category and pagination
    async function loadProducts(category, page) {
        try {
            const payload = {
                limit: 12,
                offset: (page - 1) * 12
            };

            if (category) {
                payload.category_name = category; // Only add category_name when it's selected
            }

            const response = await fetch("<?php echo $BASE_URL_LOCAL; ?>/products/get_products.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(payload)
            });

            const result = await response.json();
            if (result.status === "success") {
                const productsGrid = document.getElementById("productsGrid");
                productsGrid.innerHTML = ""; // Clear current products

                result.data.forEach((product) => {
                    const firstImage = product.photos.split(",")[0];
                    const imageSrc = firstImage
                        ? `../frontend/Johar_traders_uploads/product/${firstImage}`
                        : `../frontend/Johar_traders_uploads/placeholder.png`;

                    const displayName = product.name.length > 25 
                                ? product.name.slice(0, 25) + '...' 
                                : product.name;
                    productsGrid.innerHTML += `
                        <div class="shop-product-card border border-orange-300 rounded-lg p-2 mt-2 lg:p-4 transition-all duration-300 hover:shadow-lg">
                            <a href="under_construction?slug=${product.slug}">
                                <div class="relative mb-4">
                                    <img src="${imageSrc}" alt="${displayName}" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                                    <p class="font-semibold text-gray-800 mb-2 text-sm lg:text-base">${displayName}</p>
                                </div>
                            </a>
                            <a href="under_construction?slug=${product.slug}" class="w-full bg-orange-600 text-white py-1 lg:py-2 px-6 rounded-lg hover:bg-orange-400 transition-colors text-sm lg:text-base">View</a>
                        </div>
                    `;
                });

                loadPaginationControls(result.pagination.total_pages); // Update pagination controls
            }
        } catch (error) {
            console.error("Error fetching products:", error);
        }
    }

    // Pagination Controls (keeps original design intact)
    function loadPaginationControls(totalPages) {
        const paginationControls = document.getElementById("paginationControls");
        paginationControls.innerHTML = ""; // Clear current pagination controls

        // Add Previous Button
        if (currentPage > 1) {
            paginationControls.innerHTML += `
                <button class="pagination-btn px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors" onclick="changePage('prev')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
            `;
        }

        // Add the first page
        paginationControls.innerHTML += `
            <button class="pagination-btn px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors ${currentPage === 1 ? 'active' : ''}" onclick="changePage(1)">
                1
            </button>
        `;

        // Add the ellipsis if the first few pages are skipped
        if (currentPage > 3) {
            paginationControls.innerHTML += `
                <span class="px-1 lg:px-2 text-gray-500 text-sm lg:text-base">...</span>
            `;
        }

        // Add pages around the current page
        let start = Math.max(currentPage - 1, 2); // The page before the current one
        let end = Math.min(currentPage + 1, totalPages - 1); // The page after the current one

        // Add intermediate pages (like 2, 3, or 6, 7 based on current page)
        for (let i = start; i <= end; i++) {
            paginationControls.innerHTML += `
                <button class="pagination-btn px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors ${i === currentPage ? 'active' : ''}" onclick="changePage(${i})">
                    ${i}
                </button>
            `;
        }

        // Add the ellipsis if there are more pages after the current range
        if (currentPage < totalPages - 2) {
            paginationControls.innerHTML += `
                <span class="px-1 lg:px-2 text-gray-500 text-sm lg:text-base">...</span>
            `;
        }

        // Add the last page
        if (totalPages > 1) {
            paginationControls.innerHTML += `
                <button class="pagination-btn px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors ${currentPage === totalPages ? 'active' : ''}" onclick="changePage(${totalPages})">
                    ${totalPages}
                </button>
            `;
        }

        // Add Next Button
        if (currentPage < totalPages) {
            paginationControls.innerHTML += `
                <button class="pagination-btn px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors" onclick="changePage('next')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            `;
        }
    }

    // Change Page (pagination)
    function changePage(page) {
        if (page === "prev") {
            currentPage--;
        } else if (page === "next") {
            currentPage++;
        } else {
            currentPage = page;
        }
        loadProducts(selectedCategory, currentPage); // Load products based on current page
    }

    document.addEventListener('DOMContentLoaded', () => {
        loadCategories(); // Load categories when the page loads
        loadProducts("", currentPage); // Fetch all products initially (no category)
    });


</script>
<!-- Footer -->
<?php include("footer.php"); ?>