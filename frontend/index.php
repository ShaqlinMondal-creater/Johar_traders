<?php include("header.php") ?>

<div class="body_section">
    <!-- Main Content -->
    <div class="max-w-9xl mx-auto mt-1 px-3 md:px-1">
        <!-- Image Slider -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="slider-container h-64 md:h-96 relative">
                <div class="slider-track h-full" id="sliderTrack"></div>

                <!-- Slider Navigation -->
                <button class="absolute left-2 md:left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 text-gray-800 p-2 rounded-full transition-all"
                    onclick="previousSlide()">
                    <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="absolute right-2 md:right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 text-gray-800 p-2 rounded-full transition-all"
                    onclick="nextSlide()">
                    <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Slider Dots -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2" id="sliderDots"></div>
            </div>
        </div>
    </div>

    <!-- Featured Categories Section -->
    <div class="max-w-8xl mx-auto mt-6 md:mt-10 px-3 md:px-5">
        <div class="bg-white rounded-lg p-4 md:p-6">
            <div class="flex justify-between items-center mb-4 md:mb-6">
                <h2 class="text-xl md:text-2xl  text-gray-800">Featured Categories</h2>
                <div class="flex gap-2">
                    <button onclick="scrollProducts('featured', 'left')"
                        class="bg-orange-600 hover:bg-orange-700 text-white p-2 rounded-full transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>
                    <button onclick="scrollProducts('featured', 'right')"
                        class="bg-orange-600 hover:bg-orange-700 text-white p-2 rounded-full transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="overflow-hidden">
                <div class="product-slider" id="featuredSlider">
                    <div class="product-card bg-gray-100 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <img src="Johar_traders_uploads/placeholder.png"
                            alt="Mixie Machine" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                        <h3 class=" text-base md:text-lg mb-2">Mixie Machine</h3>
                        <p class="text-gray-600 text-sm mb-3">High-quality kitchen mixie for all your grinding needs</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹2,999</span> -->
                            <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                        </div>
                    </div>
                    <div class="product-card bg-gray-100 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <img src="Johar_traders_uploads/placeholder.png"
                            alt="Food Processor" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                        <h3 class=" text-base md:text-lg mb-2">Food Processor</h3>
                        <p class="text-gray-600 text-sm mb-3">Multi-functional food processor for modern kitchens</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹4,599</span> -->
                            <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                        </div>
                    </div>
                    <div class="product-card bg-gray-100 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <img src="Johar_traders_uploads/placeholder.png"
                            alt="Grinding Machine" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                        <h3 class=" text-base md:text-lg mb-2">Grinding Machine</h3>
                        <p class="text-gray-600 text-sm mb-3">Professional grinding machine for commercial use</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹8,999</span> -->
                            <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                        </div>
                    </div>
                    <div class="product-card bg-gray-100 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <img src="Johar_traders_uploads/placeholder.png"
                            alt="Chatna Machine" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                        <h3 class=" text-base md:text-lg mb-2">Chatna Machine</h3>
                        <p class="text-gray-600 text-sm mb-3">Specialized machine for making fresh chutneys</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹3,499</span> -->
                            <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                        </div>
                    </div>
                    <div class="product-card bg-gray-100 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <img src="Johar_traders_uploads/placeholder.png"
                            alt="Noodle Machine" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                        <h3 class=" text-base md:text-lg mb-2">Noodle Machine</h3>
                        <p class="text-gray-600 text-sm mb-3">Automatic noodle making machine for restaurants</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹12,999</span> -->
                            <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dynamic Product Showing -->
    <div class="max-w-8xl mx-auto mt-6 md:mt-10 px-3 md:px-5" id="dynamic-category-sections"></div>

    <!-- Best Selling Section -->
    <div class="max-w-8xl mx-auto mt-6 md:mt-10 px-3 md:px-5">
        <div class="bg-white rounded-lg p-4 md:p-6">
            <div class="flex justify-between items-center mb-4 md:mb-6">
                <h2 class="text-xl md:text-2xl  text-gray-800">Best Selling</h2>
                <div class="flex gap-2">
                    <button onclick="scrollProducts('bestselling', 'left')"
                        class="bg-orange-600 hover:bg-orange-700 text-white p-2 rounded-full transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>
                    <button onclick="scrollProducts('bestselling', 'right')"
                        class="bg-orange-600 hover:bg-orange-700 text-white p-2 rounded-full transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="overflow-hidden">
                <div class="product-slider" id="bestsellingSlider">
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="Johar_traders_uploads/placeholder.png"
                                alt="Premium Mixie" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                            <span
                                class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs ">Best
                                Seller</span>
                        </div>
                        <h3 class=" text-base md:text-lg mb-2">Premium Mixie</h3>
                        <p class="text-gray-600 text-sm mb-3">Top-rated mixie with 5-star customer reviews</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹3,999</span> -->
                            <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                        </div>
                    </div>
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="Johar_traders_uploads/placeholder.png"
                                alt="Commercial Grinder" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                            <span
                                class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs ">Best
                                Seller</span>
                        </div>
                        <h3 class=" text-base md:text-lg mb-2">Commercial Grinder</h3>
                        <p class="text-gray-600 text-sm mb-3">Heavy-duty grinder for commercial kitchens</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹15,999</span> -->
                            <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                        </div>
                    </div>
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="Johar_traders_uploads/placeholder.png"
                                alt="Multi-Purpose Processor" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                            <span
                                class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs ">Best
                                Seller</span>
                        </div>
                        <h3 class=" text-base md:text-lg mb-2">Multi-Purpose Processor</h3>
                        <p class="text-gray-600 text-sm mb-3">Versatile food processor with multiple attachments</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹6,999</span> -->
                            <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                        </div>
                    </div>
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="Johar_traders_uploads/placeholder.png"
                                alt="Professional Blender" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                            <span
                                class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs ">Best
                                Seller</span>
                        </div>
                        <h3 class=" text-base md:text-lg mb-2">Professional Blender</h3>
                        <p class="text-gray-600 text-sm mb-3">High-speed blender for smoothies and shakes</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹5,499</span> -->
                            <button class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">Add
                                to Cart</button>
                        </div>
                    </div>
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="Johar_traders_uploads/placeholder.png"
                                alt="Professional Blender" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                            <span
                                class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs ">Best
                                Seller</span>
                        </div>
                        <h3 class=" text-base md:text-lg mb-2">Blender</h3>
                        <p class="text-gray-600 text-sm mb-3">High-speed blender for smoothies and shakes</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹5,499</span> -->
                            <button class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">Add
                                to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Products Section -->
    <div class="max-w-8xl mx-auto mt-6 md:mt-10 px-3 md:px-5">
        <div class="bg-white rounded-lg p-4 md:p-6">
            <div class="flex justify-between items-center mb-4 md:mb-6">
                <h2 class="text-xl md:text-2xl  text-gray-800">New Products</h2>
                <div class="flex gap-2">
                    <button onclick="scrollProducts('newproducts', 'left')"
                        class="bg-orange-600 hover:bg-orange-700 text-white p-2 rounded-full transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>
                    <button onclick="scrollProducts('newproducts', 'right')"
                        class="bg-orange-600 hover:bg-orange-700 text-white p-2 rounded-full transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="overflow-hidden">
                <div class="product-slider" id="newproductsSlider">
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="Johar_traders_uploads/placeholder.png"
                                alt="Smart Mixie" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                            <span
                                class="absolute top-2 left-2 bg-green-500 text-white px-2 py-1 rounded-full text-xs ">New</span>
                        </div>
                        <h3 class=" text-base md:text-lg mb-2">Smart Mixie 2024</h3>
                        <p class="text-gray-600 text-sm mb-3">Latest smart mixie with digital controls</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹4,999</span> -->
                            <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                        </div>
                    </div>
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="Johar_traders_uploads/placeholder.png"
                                alt="AI Food Processor" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                            <span
                                class="absolute top-2 left-2 bg-green-500 text-white px-2 py-1 rounded-full text-xs ">New</span>
                        </div>
                        <h3 class=" text-base md:text-lg mb-2">AI Food Processor</h3>
                        <p class="text-gray-600 text-sm mb-3">AI-powered food processor with recipe suggestions</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹9,999</span> -->
                            <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                        </div>
                    </div>
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="Johar_traders_uploads/placeholder.png"
                                alt="Eco Grinder" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                            <span
                                class="absolute top-2 left-2 bg-green-500 text-white px-2 py-1 rounded-full text-xs ">New</span>
                        </div>
                        <h3 class=" text-base md:text-lg mb-2">Eco Grinder Pro</h3>
                        <p class="text-gray-600 text-sm mb-3">Energy-efficient grinder with eco-friendly design</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹7,499</span> -->
                            <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                        </div>
                    </div>
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="Johar_traders_uploads/placeholder.png"
                                alt="Compact Processor" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                            <span
                                class="absolute top-2 left-2 bg-green-500 text-white px-2 py-1 rounded-full text-xs ">New</span>
                        </div>
                        <h3 class=" text-base md:text-lg mb-2">Compact Processor</h3>
                        <p class="text-gray-600 text-sm mb-3">Space-saving processor perfect for small kitchens</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹3,299</span> -->
                            <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                        </div>
                    </div>
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="Johar_traders_uploads/placeholder.png"
                                alt="Compact Processor" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                            <span
                                class="absolute top-2 left-2 bg-green-500 text-white px-2 py-1 rounded-full text-xs ">New</span>
                        </div>
                        <h3 class=" text-base md:text-lg mb-2">Compact Processor II</h3>
                        <p class="text-gray-600 text-sm mb-3">Space-saving processor perfect for small kitchens</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹3,299</span> -->
                            <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                        </div>
                    </div>
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="Johar_traders_uploads/placeholder.png"
                                alt="Compact Processor" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                            <span
                                class="absolute top-2 left-2 bg-green-500 text-white px-2 py-1 rounded-full text-xs ">New</span>
                        </div>
                        <h3 class=" text-base md:text-lg mb-2">Compact Processor Professional</h3>
                        <p class="text-gray-600 text-sm mb-3">Space-saving processor perfect for small kitchens</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-orange-600  text-lg md:text-xl">₹3,299</span> -->
                            <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const categoryIds = [45, 35, 13, 2, 33]; // your category IDs
    const categorySectionContainer = document.getElementById("dynamic-category-sections");

    function scrollCategoryProducts(sectionId, direction) {
        const container = document.getElementById(`${sectionId}Slider`);
        const scrollAmount = 300;
        container.scrollBy({
            left: direction === 'left' ? -scrollAmount : scrollAmount,
            behavior: 'smooth'
        });
    }

    async function loadCategorySections() {
        try {
            const response = await fetch(`<?php echo $BASE_URL_LOCAL; ?>/backend/apis/products/get_products_by_category.php`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ category_id: categoryIds.join(", ") })
            });

            const result = await response.json();
            if (result.status === 'success') {
                result.categories.forEach(category => {
                    if (!category.products || category.products.length === 0) return; // Skip empty categories

                    const sectionId = `category-${category.category_id}`;
                    let html = `
                    <div class="bg-white rounded-lg p-4 md:p-6 mt-6">
                        <div class="flex justify-between items-center mb-4 md:mb-6">
                            <h2 class="text-xl md:text-2xl text-gray-800">${category.category_name}</h2>
                            <div class="flex gap-2">
                                <button onclick=\"scrollCategoryProducts('${sectionId}', 'left')\" class="bg-orange-600 hover:bg-orange-700 text-white p-2 rounded-full">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button onclick=\"scrollCategoryProducts('${sectionId}', 'right')\" class="bg-orange-600 hover:bg-orange-700 text-white p-2 rounded-full">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            <div class="flex gap-4 overflow-x-hidden pb-2" id="${sectionId}Slider">
                    `;

                    category.products.forEach(product => {
                        const firstImage = product.image_link.split(",")[0];
                        html += `
                            <div class="product-card bg-gray-100 rounded-lg p-4 min-w-[240px] hover:shadow-lg transition-shadow">
                                <img src="${firstImage}" alt="${product.name}" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                                <h3 class="text-base md:text-lg mb-2">${product.name}</h3>
                                <p class="text-gray-600 text-sm mb-3">SKU: ${product.sku}</p>
                                <div class="flex justify-between items-center">
                                    <a href="comming_soon.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                                </div>
                            </div>
                        `;
                    });

                    html += `</div></div></div>`;
                    categorySectionContainer.innerHTML += html;
                });
            }
        } catch (error) {
            console.error("Error loading featured categories:", error);
        }
    }

    document.addEventListener("DOMContentLoaded", loadCategorySections);
</script>
<?php include("footer.php") ?>
