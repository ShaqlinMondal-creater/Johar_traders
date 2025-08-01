<?php include("header.php"); ?>

<!-- <script>
    // Get the product slug from URL
    const urlParams = new URLSearchParams(window.location.search);
    const productSlug = urlParams.get('slug');

    async function loadProductDetails() {
        try {
            // Fetch the product details using the slug
            const response = await fetch("<?php echo $BASE_URL_LOCAL; ?>/products/get_products.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    "product_slug": productSlug
                })
            });

            const result = await response.json();
            if (result.status === "success" && result.data.length > 0) {
                const product = result.data[0]; // Get the first product (if there are multiple)
                
                // Set the product details dynamically
                document.getElementById("mainImage").src = product.photos.split(",")[0]; // First image
                document.querySelector(".productName").innerText = product.name; // Set the name of the product
                document.getElementById("productBrands").innerText = product.brand.brand_name;
                document.getElementById("productFeatures").innerHTML = product.features || "No Features available."; // Rendering HTML tags
                document.getElementById("productDescription").innerHTML = product.description || "No description available."; // Rendering HTML tags
                // console.log(product.category.category_id);

                // Handle images
                const images = product.photos ? product.photos.split(",") : [];
                const mainImage = images.length > 0 ? images[0] : 'placeholder.jpg'; // Use placeholder if no image
                const thumbnails = images.length > 1 ? images : ['placeholder.jpg']; // Use placeholder if no other images

                document.getElementById("mainImage").src = mainImage;

                const thumbnailContainer = document.querySelector("#thumbnailImages");
                thumbnailContainer.innerHTML = ''; // Clear existing thumbnails
                thumbnails.forEach(thumbnail => {
                    const thumbElement = document.createElement("img");
                    thumbElement.src = thumbnail;
                    thumbElement.alt = product.name;
                    thumbElement.classList.add("w-16", "h-16", "md:w-20", "md:h-20", "object-cover", "rounded-lg", "cursor-pointer", "hover:opacity-80", "transition-opacity");
                    thumbElement.onclick = function () {
                        changeMainImage(this);
                    };
                    thumbnailContainer.appendChild(thumbElement);
                });
                // Set related products
                loadRelatedProducts(product.category.category_name);
                
            } else {
                // If no product found
                alert("Product not found.");
            }
        } catch (error) {
            console.error("Error loading product details:", error);
        }
    }

    // Load related products based on category_name
    async function loadRelatedProducts(categoryName) {
        try {
            const response = await fetch("<?php echo $BASE_URL_LOCAL; ?>/products/get_products.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ "category_name": categoryName })
            });

            const result = await response.json();
            if (result.status === "success") {
                const relatedProductsGrid = document.getElementById("relatedProductsGrid");
                relatedProductsGrid.innerHTML = ""; // Clear the grid

                result.data.forEach(product => {
                    const rlProductimages = product.image_link ? product.image_link.split(",") : [];
                    const firstImage = rlProductimages.length > 0 ? rlProductimages[0] : 'placeholder.jpg'; // Use placeholder if no image
                    relatedProductsGrid.innerHTML += `
                        <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                            <a href="product-detail.php?slug=${product.slug}">
                                <img src="${firstImage}" alt="${product.name}" class="w-full h-48 object-cover rounded-lg mb-4">
                                <h3 class="font-bold text-lg mb-2">${product.name}</h3>
                                <p class="text-gray-600 text-sm mb-3">₹${product.unit_price}</p>
                            </a>
                        </div>
                    `;
                });
            }
        } catch (error) {
            console.error("Error loading related products:", error);
        }
    }


    document.addEventListener("DOMContentLoaded", loadProductDetails);
</script> -->

<script>
    // Get the product slug from URL
    const urlParams = new URLSearchParams(window.location.search);
    const productSlug = urlParams.get('slug');

    async function loadProductDetails() {
        try {
            // Fetch the product details using the slug
            const response = await fetch("<?php echo $BASE_URL_LOCAL; ?>/products/get_products.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    "product_slug": productSlug
                })
            });

            const result = await response.json();
            if (result.status === "success" && result.data.length > 0) {
                const product = result.data[0]; // Get the first product (if there are multiple)

                // Handle product images
                const images = product.photos ? product.photos.split(",") : [];
                const mainImage = images.length > 0 && images[0] ? `Johar_traders_uploads/product/${images[0]}` : 'Johar_trader_uploads/placeholder.jpg'; // Use placeholder if no image
                const thumbnails = images.length > 1 ? images : ['placeholder.jpg']; // Use placeholder if no other images

                // Set the main image and thumbnails
                document.getElementById("mainImage").src = mainImage;
                const thumbnailContainer = document.querySelector("#thumbnailImages");
                thumbnailContainer.innerHTML = ''; // Clear existing thumbnails
                thumbnails.forEach(thumbnail => {
                    const thumbElement = document.createElement("img");
                    thumbElement.src = thumbnail ? `Johar_traders_uploads/product/${thumbnail}` : 'Johar_trader_uploads/placeholder.jpg'; // Fallback to placeholder if no image
                    thumbElement.alt = product.name;
                    thumbElement.classList.add("w-16", "h-16", "md:w-20", "md:h-20", "object-cover", "rounded-lg", "cursor-pointer", "hover:opacity-80", "transition-opacity");
                    thumbElement.onclick = function () {
                        changeMainImage(this);
                    };
                    thumbnailContainer.appendChild(thumbElement);
                });

                // Set the product details dynamically
                document.querySelector(".productName").innerText = product.name || 'Product Name';
                document.getElementById("productBrands").innerText = product.brand?.brand_name || 'Unknown Brand';
                document.getElementById("productFeatures").innerHTML = product.features || "No Features available."; // Rendering HTML tags
                document.getElementById("productDescription").innerHTML = product.description || "No description available."; // Rendering HTML tags

                // Set related products
                loadRelatedProducts(product.category.category_name);

            } else {
                alert("Product not found.");
            }
        } catch (error) {
            console.error("Error loading product details:", error);
        }
    }

    // Change main image when a thumbnail is clicked
    function changeMainImage(thumbnail) {
        const mainImage = document.getElementById('mainImage');
        mainImage.src = thumbnail.src.replace('w=150&h=150', 'w=600&h=600'); // Update main image URL
    }

    // Load related products based on category_name
    async function loadRelatedProducts(categoryName) {
        try {
            const response = await fetch("<?php echo $BASE_URL_LOCAL; ?>/products/get_products.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ "category_name": categoryName })
            });

            const result = await response.json();
            if (result.status === "success") {
                const relatedProductsGrid = document.getElementById("relatedProductsGrid");
                relatedProductsGrid.innerHTML = ""; // Clear the grid

                result.data.forEach(product => {
                    const rlProductimages = product.photos ? product.photos.split(",") : [];
                    const firstImage = rlProductimages.length > 0 && rlProductimages[0] 
                        ? `Johar_traders_uploads/product/${rlProductimages[0]}` 
                        : 'Johar_traders_uploads/placeholder.jpg'; // Use placeholder if no image

                    relatedProductsGrid.innerHTML += `
                        <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                            <a href="product-detail.php?slug=${product.slug}">
                                <img src="${firstImage}" alt="${product.name}" class="w-full h-48 object-cover rounded-lg mb-4">
                                <h3 class="font-bold text-lg mb-2">${product.name}</h3>
                                <p class="text-gray-600 text-sm mb-3">${product.brand.brand_name}</p>
                            </a>
                        </div>
                    `;
                });
            }
        } catch (error) {
            console.error("Error loading related products:", error);
        }
    }

    document.addEventListener("DOMContentLoaded", loadProductDetails);
</script>

<!-- Product Detail Page -->
<div class="body_section">
    <!-- Breadcrumb -->
    <div class="max-w-7xl mx-auto mt-5 px-5">
        <nav class="text-sm text-gray-600">
            <a href="index" class="hover:text-orange-600">Home</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 productName" id="productName">Product Name</span> <!-- Initially placeholder for the name -->
        </nav>
    </div>

    <!-- Product Detail Section -->
    <div class="max-w-7xl mx-auto mt-5 px-5">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6">
                <!-- Product Images -->
                <div>
                    <!-- Main Image -->
                    <div class="mb-4 overflow-hidden rounded-lg">
                        <img id="mainImage" src="Johar_trader_uploads/placeholder.jpg" 
                        alt="Product Image" class="w-full h-64 md:h-96 object-contain main-image">
                    </div>

                    <!-- Thumbnail Images -->
                    <div class="flex justify-center align-center gap-2 overflow-x-auto" id="thumbnailImages">
                        <!-- Thumbnails will be dynamically populated -->
                    </div>
                </div>

                <!-- Product Info -->
                <div>
                    <h1 id="productName" class="productName text-2xl md:text-3xl font-bold text-gray-800 mb-4">Product Name</h1>
                    
                    <!-- Rating -->
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        </div>
                        <span class="ml-2 text-gray-600">(4.8)</span>
                    </div>

                    <!-- Brands -->
                    <div class="mb-6">
                        <div class="flex items-center gap-4">
                            <span id="productBrands" class="text-3xl font-bold text-orange-600">Johar</span>
                        </div>
                        <!-- <p class="text-sm text-gray-600 mt-1">Inclusive of all taxes</p> -->
                    </div>

                    <!-- Key Features -->
                    <div class="mb-6">
                        <h3 class="font-bold text-lg mb-3">Key Features:</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center" id="productFeatures">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700">750W Powerful Motor</span>
                            </li>
                        </ul>
                    </div>

                    <!-- WhatsApp Button -->
                    <div class="mt-6">
                        <a href="https://wa.me/?text=I%20have%20a%20question%20about%20${encodeURIComponent(document.querySelector('.productName').innerText)}" 
                            class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-bold transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 1.2c6.16 0 11.2 5.04 11.2 11.2 0 2.09-.63 4.07-1.72 5.75l2.64 5.44-5.45-2.64c-1.69 1.1-3.67 1.72-5.73 1.72-6.16 0-11.2-5.04-11.2-11.2 0-2.09.63-4.07 1.72-5.75L2.56 2.72 8.01 5.36c1.1-1.69 2.69-2.92 4.69-3.17 1.55-.13 3.13.21 4.48 1.12-.64-.44-1.43-.75-2.24-.94l-.07.1a6.9 6.9 0 0 0-3.41.07c-.8.45-1.41 1.04-1.8 1.75z"></path>
                            </svg>
                            Chat with us on WhatsApp
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Description -->
    <div class="max-w-7xl mx-auto mt-8 px-5">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Product Description</h2>
            <div class="prose max-w-none">
                <p id="productDescription" class="text-gray-700 mb-4">
                    Description goes here...
                </p>
            </div>
        </div>
    </div>

    <!-- Related Products Section -->
    <div class="max-w-9xl mx-auto mt-10 px-5">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Related Products</h2>
                <div class="flex gap-2">
                    <button onclick="scrollRelatedProducts('left')" class="bg-orange-600 hover:bg-orange-700 text-white p-2 rounded-full transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button onclick="scrollRelatedProducts('right')" class="bg-orange-600 hover:bg-orange-700 text-white p-2 rounded-full transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="overflow-hidden">
                <div class="product-slider" id="relatedProductsGrid">
                    <!-- Related Products will be injected dynamically -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Related products slider functionality
    let relatedProductsPosition = 0;

    function scrollRelatedProducts(direction) {
        const slider = document.getElementById('relatedProductsGrid');
        const cardWidth = 300; // Assuming card width is 280px + margin
        const maxScroll = (slider.children.length - 3) * cardWidth; // Show 3 cards at a time
        
        if (direction === 'right') {
            relatedProductsPosition = Math.min(relatedProductsPosition + cardWidth, maxScroll);
        } else {
            relatedProductsPosition = Math.max(relatedProductsPosition - cardWidth, 0);
        }
        
        slider.style.transform = `translateX(-${relatedProductsPosition}px)`;
    }
</script>

<?php include("footer.php"); ?>
