<?php include("header.php"); ?>
<div class="body_section">
    <style>
        .category-modal {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 400px;
            width: max-content;
            background: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            z-index: 50;
            max-height: 400px;
            overflow-y: auto;
            border-radius: 8px;
        }
        
        .categories-dropdown:hover .category-modal {
            display: block;
        }
        
        .categories-dropdown:hover .dropdown-arrow {
            transform: rotate(180deg);
        }
        
        .product-slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        
        .product-card {
            min-width: 280px;
            margin-right: 20px;
        }
        
        @media (max-width: 768px) {
            .product-card {
                min-width: 250px;
                margin-right: 15px;
            }
            .category-modal {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                min-width: 100%;
                width: 100%;
                max-height: 100%;
                border-radius: 0;
                z-index: 60;
            }
        }
        
        .mobile-menu {
            display: none;
        }
        
        .mobile-menu.active {
            display: block;
        }
        
        .thumbnail-active {
            border: 2px solid #ea580c;
        }
        
        .main-image {
            transition: transform 0.3s ease;
        }
        
        .main-image:hover {
            transform: scale(1.05);
        }
    </style>
    <!-- Breadcrumb -->
    <div class="max-w-7xl mx-auto mt-5 px-5">
        <nav class="text-sm text-gray-600">
            <a href="index" class="hover:text-orange-600">Home</a>
            <span class="mx-2">/</span>
            <a href="#" class="hover:text-orange-600">Kitchen Appliances</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800">Premium Mixie Machine</span>
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
                        <img id="mainImage" 
                             src="https://images.pexels.com/photos/4226796/pexels-photo-4226796.jpeg?auto=compress&cs=tinysrgb&w=600&h=600&dpr=1" 
                             alt="Premium Mixie Machine" 
                             class="w-full h-64 md:h-96 object-cover main-image">
                    </div>
                    
                    <!-- Thumbnail Images -->
                    <div class="flex justify-center align-center gap-2 overflow-x-auto">
                        <img onclick="changeMainImage(this)" 
                             src="https://images.pexels.com/photos/4226796/pexels-photo-4226796.jpeg?auto=compress&cs=tinysrgb&w=150&h=150&dpr=1" 
                             alt="Mixie Image 1" 
                             class="w-16 h-16 md:w-20 md:h-20 object-cover rounded-lg cursor-pointer thumbnail-active hover:opacity-80 transition-opacity">
                        <img onclick="changeMainImage(this)" 
                             src="https://images.pexels.com/photos/3985062/pexels-photo-3985062.jpeg?auto=compress&cs=tinysrgb&w=150&h=150&dpr=1" 
                             alt="Mixie Image 2" 
                             class="w-16 h-16 md:w-20 md:h-20 object-cover rounded-lg cursor-pointer hover:opacity-80 transition-opacity">
                        <img onclick="changeMainImage(this)" 
                             src="https://images.pexels.com/photos/4226140/pexels-photo-4226140.jpeg?auto=compress&cs=tinysrgb&w=150&h=150&dpr=1" 
                             alt="Mixie Image 3" 
                             class="w-16 h-16 md:w-20 md:h-20 object-cover rounded-lg cursor-pointer hover:opacity-80 transition-opacity">
                        <img onclick="changeMainImage(this)" 
                             src="https://images.pexels.com/photos/4226796/pexels-photo-4226796.jpeg?auto=compress&cs=tinysrgb&w=150&h=150&dpr=1" 
                             alt="Mixie Image 4" 
                             class="w-16 h-16 md:w-20 md:h-20 object-cover rounded-lg cursor-pointer hover:opacity-80 transition-opacity">
                    </div>
                </div>
                
                <!-- Product Info -->
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Premium Mixie Machine</h1>
                    
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
                        <span class="ml-2 text-gray-600">(4.8) 156 Reviews</span>
                    </div>
                    
                    <!-- Price -->
                    <div class="mb-6">
                        <div class="flex items-center gap-4">
                            <span class="text-3xl font-bold text-orange-600">₹2,999</span>
                            <span class="text-xl text-gray-500 line-through">₹4,999</span>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-bold">40% OFF</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">Inclusive of all taxes</p>
                    </div>
                    
                    <!-- Key Features -->
                    <div class="mb-6">
                        <h3 class="font-bold text-lg mb-3">Key Features:</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700">750W Powerful Motor</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700">3 Stainless Steel Jars</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700">Overload Protection</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700">2 Year Warranty</span>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Quantity and Add to Cart -->
                    <div class="mb-6">
                        <div class="flex items-center gap-4 mb-4">
                            <span class="font-bold">Quantity:</span>
                            <div class="flex items-center border rounded-lg">
                                <button onclick="decreaseQuantity()" class="px-3 py-2 hover:bg-gray-100">-</button>
                                <span id="quantity" class="px-4 py-2 border-x">1</span>
                                <button onclick="increaseQuantity()" class="px-3 py-2 hover:bg-gray-100">+</button>
                            </div>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-3">
                            <button class="flex-1 bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-bold transition-colors">
                                Add to Cart
                            </button>
                            <button class="flex-1 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-bold transition-colors">
                                Buy Now
                            </button>
                        </div>
                    </div>
                    
                    <!-- Additional Info -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span>Free Delivery</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>2 Year Warranty</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            <span>Easy Returns</span>
                        </div>
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
                <p class="text-gray-700 mb-4">
                    The Premium Mixie Machine is designed to meet all your kitchen grinding and mixing needs. With its powerful 750W motor and premium stainless steel jars, this mixie delivers exceptional performance for both wet and dry grinding.
                </p>
                <p class="text-gray-700 mb-4">
                    Whether you're preparing fresh chutneys, grinding spices, or making smooth batters, this versatile kitchen appliance ensures consistent results every time. The ergonomic design and safety features make it perfect for daily use in modern kitchens.
                </p>
                
                <h3 class="text-xl font-bold text-gray-800 mb-3 mt-6">What's in the Box:</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>1 x Premium Mixie Machine (750W Motor)</li>
                    <li>1 x Large Jar (1.5L) - For wet grinding</li>
                    <li>1 x Medium Jar (1L) - For dry grinding</li>
                    <li>1 x Small Jar (0.5L) - For chutneys</li>
                    <li>3 x Stainless Steel Blades</li>
                    <li>1 x User Manual</li>
                    <li>1 x Warranty Card</li>
                </ul>
                
                <h3 class="text-xl font-bold text-gray-800 mb-3 mt-6">Benefits:</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Saves time with efficient grinding and mixing</li>
                    <li>Durable construction ensures long-lasting performance</li>
                    <li>Easy to clean and maintain</li>
                    <li>Compact design fits perfectly in any kitchen</li>
                    <li>Energy efficient operation</li>
                </ul>
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
                <div class="product-slider" id="relatedProductsSlider">
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <img src="https://images.pexels.com/photos/4226140/pexels-photo-4226140.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1" alt="Food Processor" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="font-bold text-lg mb-2">Multi-Purpose Food Processor</h3>
                        <p class="text-gray-600 text-sm mb-3">Advanced food processor with multiple attachments</p>
                        <div class="flex justify-between items-center">
                            <span class="text-orange-600 font-bold text-xl">₹4,599</span>
                            <button class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <img src="https://images.pexels.com/photos/3985062/pexels-photo-3985062.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1" alt="Grinding Machine" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="font-bold text-lg mb-2">Commercial Grinding Machine</h3>
                        <p class="text-gray-600 text-sm mb-3">Heavy-duty grinder for commercial use</p>
                        <div class="flex justify-between items-center">
                            <span class="text-orange-600 font-bold text-xl">₹8,999</span>
                            <button class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <img src="https://images.pexels.com/photos/4226796/pexels-photo-4226796.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1" alt="Chatna Machine" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="font-bold text-lg mb-2">Automatic Chatna Machine</h3>
                        <p class="text-gray-600 text-sm mb-3">Perfect for making fresh chutneys</p>
                        <div class="flex justify-between items-center">
                            <span class="text-orange-600 font-bold text-xl">₹3,499</span>
                            <button class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <img src="https://images.pexels.com/photos/4226140/pexels-photo-4226140.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1" alt="Blender" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="font-bold text-lg mb-2">High-Speed Blender</h3>
                        <p class="text-gray-600 text-sm mb-3">Professional blender for smoothies</p>
                        <div class="flex justify-between items-center">
                            <span class="text-orange-600 font-bold text-xl">₹5,499</span>
                            <button class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product-card bg-gray-50 rounded-lg p-4 hover:shadow-lg transition-shadow">
                        <img src="https://images.pexels.com/photos/3985062/pexels-photo-3985062.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&dpr=1" alt="Wet Grinder" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="font-bold text-lg mb-2">Traditional Wet Grinder</h3>
                        <p class="text-gray-600 text-sm mb-3">Stone grinder for authentic taste</p>
                        <div class="flex justify-between items-center">
                            <span class="text-orange-600 font-bold text-xl">₹6,999</span>
                            <button class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const mobileMenu = document.querySelector('.mobile-menu');
            mobileMenu.classList.toggle('active');
        }
        
        // Image gallery functionality
        function changeMainImage(thumbnail) {
            const mainImage = document.getElementById('mainImage');
            const thumbnails = document.querySelectorAll('img[onclick="changeMainImage(this)"]');
            
            // Update main image
            mainImage.src = thumbnail.src.replace('w=150&h=150', 'w=600&h=600');
            
            // Update active thumbnail
            thumbnails.forEach(thumb => thumb.classList.remove('thumbnail-active'));
            thumbnail.classList.add('thumbnail-active');
        }
        
        // Quantity controls
        let quantity = 1;
        
        function increaseQuantity() {
            quantity++;
            document.getElementById('quantity').textContent = quantity;
        }
        
        function decreaseQuantity() {
            if (quantity > 1) {
                quantity--;
                document.getElementById('quantity').textContent = quantity;
            }
        }
        
        // Related products slider
        let relatedProductsPosition = 0;
        
        function scrollRelatedProducts(direction) {
            const slider = document.getElementById('relatedProductsSlider');
            const cardWidth = 300; // 280px + 20px margin
            const maxScroll = (slider.children.length - 3) * cardWidth; // Show 3 cards at a time
            
            if (direction === 'right') {
                relatedProductsPosition = Math.min(relatedProductsPosition + cardWidth, maxScroll);
            } else {
                relatedProductsPosition = Math.max(relatedProductsPosition - cardWidth, 0);
            }
            
            slider.style.transform = `translateX(-${relatedProductsPosition}px)`;
        }
        
        // Close mobile category modal when clicking outside
        document.addEventListener('click', function(event) {
            const categoryModal = document.querySelector('.category-modal');
            const categoriesDropdown = document.querySelector('.categories-dropdown');
            
            if (!categoriesDropdown.contains(event.target)) {
                categoryModal.style.display = 'none';
            }
        });
    </script>
    <!-- Footer -->
<?php include("footer.php"); ?>