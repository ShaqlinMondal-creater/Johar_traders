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
        max-height: 300px;
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
</style>

<div class="body_section">  

    <!-- Main Content -->
    <div class="max-w-9xl mx-auto mt-5 px-5 flex gap-5">
        <!-- Left Sidebar - Filters -->
        <div class="w-80 bg-white rounded-lg shadow-lg h-fit hidden lg:block">
            <!-- Categories Filter -->
            <div class="filter-section">
                <div class="bg-orange-600 text-white p-4 font-bold text-lg rounded-t-lg flex justify-between items-center cursor-pointer" onclick="toggleFilter('categories')">
                    Categories
                    <svg class="w-4 h-4 filter-toggle" id="categories-toggle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
                <div class="filter-content active" id="categories-content">
                    <div class="p-4">
                        
                        <!-- Kitchen Appliances -->
                        <div class="mb-4">
                            <div class="font-semibold text-gray-800 mb-2">Kitchen Appliances</div>
                            <div class="child-category space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="mixie" class="filter-checkbox mr-3 text-orange-600">
                                    <label for="mixie" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Mixie Machine</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="grinding" class="filter-checkbox mr-3 text-orange-600">
                                    <label for="grinding" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Grinding & Pulverizers</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="chatna" class="filter-checkbox mr-3 text-orange-600">
                                    <label for="chatna" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Chatna Machines</label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Food Processing -->
                        <div class="mb-4">
                            <div class="font-semibold text-gray-800 mb-2">Food Processing</div>
                            <div class="child-category space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="namkeen" class="filter-checkbox mr-3 text-orange-600">
                                    <label for="namkeen" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Namkeen Machines</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="noodles" class="filter-checkbox mr-3 text-orange-600">
                                    <label for="noodles" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Noodle Machines</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="sewai" class="filter-checkbox mr-3 text-orange-600">
                                    <label for="sewai" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Sewai Machines</label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Commercial Equipment -->
                        <div class="mb-4">
                            <div class="font-semibold text-gray-800 mb-2">Commercial Equipment</div>
                            <div class="child-category space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="bone" class="filter-checkbox mr-3 text-orange-600">
                                    <label for="bone" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Bone Saw Machines</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="chicken" class="filter-checkbox mr-3 text-orange-600">
                                    <label for="chicken" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Chicken De-Feathering</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="vegetable" class="filter-checkbox mr-3 text-orange-600">
                                    <label for="vegetable" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Vegetable Cutter</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
            <!-- Price Filter -->
            <div class="filter-section">
                <div class="bg-gray-100 p-4 font-bold text-gray-800 flex justify-between items-center cursor-pointer" onclick="toggleFilter('price')">
                    Price Range
                    <svg class="w-4 h-4 filter-toggle" id="price-toggle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
                <div class="filter-content" id="price-content">
                    <div class="p-4">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Price Range: $<span id="minPriceDisplay">0</span> - $<span id="maxPriceDisplay">10000</span></label>
                            <div class="flex items-center space-x-4">
                                <input type="range" id="minPrice" min="0" max="10000" value="0" class="price-range-slider flex-1">
                                <input type="range" id="maxPrice" min="0" max="10000" value="10000" class="price-range-slider flex-1">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="checkbox" id="price1" class="filter-checkbox mr-3 text-orange-600">
                                <label for="price1" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Under $100</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="price2" class="filter-checkbox mr-3 text-orange-600">
                                <label for="price2" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">$100 - $500</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="price3" class="filter-checkbox mr-3 text-orange-600">
                                <label for="price3" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">$500 - $1000</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="price4" class="filter-checkbox mr-3 text-orange-600">
                                <label for="price4" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Above $1000</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Fabric Filter -->
            <div class="filter-section">
                <div class="bg-gray-100 p-4 font-bold text-gray-800 flex justify-between items-center cursor-pointer" onclick="toggleFilter('fabric')">
                    Material/Fabric
                    <svg class="w-4 h-4 filter-toggle" id="fabric-toggle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
                <div class="filter-content" id="fabric-content">
                    <div class="p-4">
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="checkbox" id="stainless" class="filter-checkbox mr-3 text-orange-600">
                                <label for="stainless" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Stainless Steel</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="aluminum" class="filter-checkbox mr-3 text-orange-600">
                                <label for="aluminum" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Aluminum</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="plastic" class="filter-checkbox mr-3 text-orange-600">
                                <label for="plastic" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Food Grade Plastic</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="cast-iron" class="filter-checkbox mr-3 text-orange-600">
                                <label for="cast-iron" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Cast Iron</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="ceramic" class="filter-checkbox mr-3 text-orange-600">
                                <label for="ceramic" class="text-gray-600 cursor-pointer hover:text-orange-600 transition-colors">Ceramic</label>
                            </div>
                        </div>
                    </div>
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
            
            <!-- Breadcrumb and Sort -->
            <div class="bg-white rounded-lg p-2 mb-2">
                <div class="flex justify-between items-center">
                    <div class="text-gray-600">
                        <a href="index.html" class="hover:text-orange-600 transition-colors">Home</a>
                        <span class="mx-2">/</span>
                        <span class="text-gray-800 font-semibold">All Categories</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <label for="sort" class="text-gray-700">Sort by</label>
                        <select id="sort" class="border border-gray-300 rounded px-3 py-1 text-gray-700 focus:outline-none focus:border-orange-600">
                            <option value="default">Default</option>
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                            <option value="name">Name: A to Z</option>
                            <option value="newest">Newest First</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Products Title -->
            <div class="bg-white rounded-lg p-2 mb-2">
                <h1 class="text-2xl font-bold text-gray-800">All products</h1>
            </div>

            <!-- Products Grid -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6" id="productsGrid">
                    <!-- Product Card 1 -->
                    <div class="shop-product-card border border-orange-300 rounded-lg p-2 lg:p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-32 lg:h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 lg:w-16 lg:h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-1 right-1 lg:top-2 lg:right-2 flex flex-col gap-1 lg:gap-2">
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2 text-sm lg:text-base">Coconut Scrapper Machine</h3>
                        <p class="text-orange-600 font-bold text-base lg:text-lg mb-2 lg:mb-3">$0.00</p>
                        <button class="w-full bg-gray-800 text-white py-1 lg:py-2 rounded-lg hover:bg-gray-700 transition-colors text-sm lg:text-base">
                            Add to cart
                        </button>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="shop-product-card border border-orange-300 rounded-lg p-2 lg:p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-32 lg:h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 lg:w-16 lg:h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-1 right-1 lg:top-2 lg:right-2 flex flex-col gap-1 lg:gap-2">
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2 text-sm lg:text-base">Ice Cube Maker WOI-45</h3>
                        <p class="text-orange-600 font-bold text-base lg:text-lg mb-2 lg:mb-3">$0.00</p>
                        <button class="w-full bg-gray-800 text-white py-1 lg:py-2 rounded-lg hover:bg-gray-700 transition-colors text-sm lg:text-base">
                            Add to cart
                        </button>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="shop-product-card border border-orange-300 rounded-lg p-2 lg:p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-32 lg:h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 lg:w-16 lg:h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-1 right-1 lg:top-2 lg:right-2 flex flex-col gap-1 lg:gap-2">
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2 text-sm lg:text-base">Drinking Water Cooler</h3>
                        <p class="text-orange-600 font-bold text-base lg:text-lg mb-2 lg:mb-3">$0.00</p>
                        <button class="w-full bg-gray-800 text-white py-1 lg:py-2 rounded-lg hover:bg-gray-700 transition-colors text-sm lg:text-base">
                            Add to cart
                        </button>
                    </div>

                    <!-- Product Card 4 -->
                    <div class="shop-product-card border border-orange-300 rounded-lg p-2 lg:p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-32 lg:h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 lg:w-16 lg:h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-1 right-1 lg:top-2 lg:right-2 flex flex-col gap-1 lg:gap-2">
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2 text-sm lg:text-base">Western Visi Cooler SRC 280</h3>
                        <p class="text-orange-600 font-bold text-base lg:text-lg mb-2 lg:mb-3">$0.00</p>
                        <button class="w-full bg-gray-800 text-white py-1 lg:py-2 rounded-lg hover:bg-gray-700 transition-colors text-sm lg:text-base">
                            Add to cart
                        </button>
                    </div>

                    <!-- Product Card 5 -->
                    <div class="shop-product-card border border-orange-300 rounded-lg p-2 lg:p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-32 lg:h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 lg:w-16 lg:h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-1 right-1 lg:top-2 lg:right-2 flex flex-col gap-1 lg:gap-2">
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2 text-sm lg:text-base">Commercial Grinder Pro</h3>
                        <p class="text-orange-600 font-bold text-base lg:text-lg mb-2 lg:mb-3">$0.00</p>
                        <button class="w-full bg-gray-800 text-white py-1 lg:py-2 rounded-lg hover:bg-gray-700 transition-colors text-sm lg:text-base">
                            Add to cart
                        </button>
                    </div>

                    <!-- Product Card 6 -->
                    <div class="shop-product-card border border-orange-300 rounded-lg p-2 lg:p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-32 lg:h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 lg:w-16 lg:h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-1 right-1 lg:top-2 lg:right-2 flex flex-col gap-1 lg:gap-2">
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2 text-sm lg:text-base">Food Processor Deluxe</h3>
                        <p class="text-orange-600 font-bold text-base lg:text-lg mb-2 lg:mb-3">$0.00</p>
                        <button class="w-full bg-gray-800 text-white py-1 lg:py-2 rounded-lg hover:bg-gray-700 transition-colors text-sm lg:text-base">
                            Add to cart
                        </button>
                    </div>

                    <!-- Product Card 7 -->
                    <div class="shop-product-card border border-orange-300 rounded-lg p-2 lg:p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-32 lg:h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 lg:w-16 lg:h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-1 right-1 lg:top-2 lg:right-2 flex flex-col gap-1 lg:gap-2">
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2 text-sm lg:text-base">Mixie Machine Premium</h3>
                        <p class="text-orange-600 font-bold text-base lg:text-lg mb-2 lg:mb-3">$0.00</p>
                        <button class="w-full bg-gray-800 text-white py-1 lg:py-2 rounded-lg hover:bg-gray-700 transition-colors text-sm lg:text-base">
                            Add to cart
                        </button>
                    </div>

                    <!-- Product Card 8 -->
                    <div class="shop-product-card border border-orange-300 rounded-lg p-2 lg:p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-32 lg:h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 lg:w-16 lg:h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-1 right-1 lg:top-2 lg:right-2 flex flex-col gap-1 lg:gap-2">
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-6 h-6 lg:w-8 lg:h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-3 h-3 lg:w-4 lg:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2 text-sm lg:text-base">Noodle Making Machine</h3>
                        <p class="text-orange-600 font-bold text-base lg:text-lg mb-2 lg:mb-3">$0.00</p>
                        <button class="w-full bg-gray-800 text-white py-1 lg:py-2 rounded-lg hover:bg-gray-700 transition-colors text-sm lg:text-base">
                            Add to cart
                        </button>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center items-center mt-6 lg:mt-8 space-x-1 lg:space-x-2">
                    <button class="pagination-btn px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button class="pagination-btn active px-3 lg:px-4 py-2 border border-gray-300 rounded-lg transition-colors text-sm lg:text-base">1</button>
                    <button class="pagination-btn px-3 lg:px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-sm lg:text-base">2</button>
                    <button class="pagination-btn px-3 lg:px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-sm lg:text-base">3</button>
                    <span class="px-1 lg:px-2 text-gray-500 text-sm lg:text-base">...</span>
                    <button class="pagination-btn px-3 lg:px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-sm lg:text-base">10</button>
                    <button class="pagination-btn px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
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
    
    // Price range sliders
    const minPriceSlider = document.getElementById('minPrice');
    const maxPriceSlider = document.getElementById('maxPrice');
    const minPriceDisplay = document.getElementById('minPriceDisplay');
    const maxPriceDisplay = document.getElementById('maxPriceDisplay');
    
    if (minPriceSlider && maxPriceSlider) {
        minPriceSlider.addEventListener('input', function() {
            minPriceDisplay.textContent = this.value;
            if (parseInt(this.value) > parseInt(maxPriceSlider.value)) {
                maxPriceSlider.value = this.value;
                maxPriceDisplay.textContent = this.value;
            }
        });
        
        maxPriceSlider.addEventListener('input', function() {
            maxPriceDisplay.textContent = this.value;
            if (parseInt(this.value) < parseInt(minPriceSlider.value)) {
                minPriceSlider.value = this.value;
                minPriceDisplay.textContent = this.value;
            }
        });
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

<!-- Footer -->
<?php include("footer.php"); ?>