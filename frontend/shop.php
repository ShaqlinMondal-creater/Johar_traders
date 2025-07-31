<?php include("header.php"); ?>
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
        
        .product-card:hover {
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
    </style>
<div class="body_section">
    <!-- Main Content -->
    <div class="max-w-9xl mx-auto mt-5 px-5 flex gap-5">
        <!-- Left Sidebar - Categories Filter -->
        <div class="w-80 bg-white rounded-lg shadow-lg h-fit">
            <div class="bg-orange-600 text-white p-4 font-bold text-lg rounded-t-lg flex justify-between items-center">
                Categories
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
            <div class="p-4">
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <input type="checkbox" id="demo1" class="filter-checkbox mr-3 text-orange-600">
                        <label for="demo1" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Demo category 1</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="demo2" class="filter-checkbox mr-3 text-orange-600">
                        <label for="demo2" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Demo category 2</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="demo3" class="filter-checkbox mr-3 text-orange-600">
                        <label for="demo3" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Demo category 3</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="uncategorized" class="filter-checkbox mr-3 text-orange-600">
                        <label for="uncategorized" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Uncategorized</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="mixie" class="filter-checkbox mr-3 text-orange-600">
                        <label for="mixie" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Mixie Machine</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="grinding" class="filter-checkbox mr-3 text-orange-600">
                        <label for="grinding" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Grinding & Pulverizers Machine</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="chatna" class="filter-checkbox mr-3 text-orange-600">
                        <label for="chatna" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Chatna Machines</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="namkeen" class="filter-checkbox mr-3 text-orange-600">
                        <label for="namkeen" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Namkeen/ Noodle/Sewai Processing</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="bone" class="filter-checkbox mr-3 text-orange-600">
                        <label for="bone" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Bone Saw Machines</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="pulper" class="filter-checkbox mr-3 text-orange-600">
                        <label for="pulper" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Pulper Machine</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="chicken" class="filter-checkbox mr-3 text-orange-600">
                        <label for="chicken" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Chicken De-Feathering Machine</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="vegetable" class="filter-checkbox mr-3 text-orange-600">
                        <label for="vegetable" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Vegetable Cutter</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="toaster" class="filter-checkbox mr-3 text-orange-600">
                        <label for="toaster" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Toaster & Grillers</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="noodles" class="filter-checkbox mr-3 text-orange-600">
                        <label for="noodles" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Noodles / Sewai Machines</label>
                    </li>
                    <li class="flex items-center">
                        <input type="checkbox" id="namkeen-machines" class="filter-checkbox mr-3 text-orange-600">
                        <label for="namkeen-machines" class="text-gray-700 cursor-pointer hover:text-orange-600 transition-colors">Namkeen Machines</label>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Right Side - Products -->
        <div class="flex-1">
            
            <!-- Breadcrumb and Sort -->
            <div class="bg-white rounded-lg p-2 mb-2">
                <div class="flex justify-between items-center">
                    <div class="text-gray-600">
                        <a href="index.html" class="hover:text-orange-600 transition-colors">Home</a>
                        <span class="mx-2">/</span>
                        <span class="text-gray-800 font-semibold">"All categories"</span>
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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="productsGrid">
                    <!-- Product Card 1 -->
                    <div class="product-card border border-orange-300 p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-2 right-2 flex flex-col gap-2">
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Coconut Scrapper Machine</h3>
                        <p class="text-orange-600 font-bold text-lg mb-3">$0.00</p>
                        <button class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-700 transition-colors">
                            Add to cart
                        </button>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="product-card border border-orange-300 p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-2 right-2 flex flex-col gap-2">
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Ice Cube Maker WOI-45</h3>
                        <p class="text-orange-600 font-bold text-lg mb-3">$0.00</p>
                        <button class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-700 transition-colors">
                            Add to cart
                        </button>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="product-card border border-orange-300 p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-2 right-2 flex flex-col gap-2">
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Drinking Water Cooler</h3>
                        <p class="text-orange-600 font-bold text-lg mb-3">$0.00</p>
                        <button class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-700 transition-colors">
                            Add to cart
                        </button>
                    </div>

                    <!-- Product Card 4 -->
                    <div class="product-card border border-orange-300 p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-2 right-2 flex flex-col gap-2">
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                            <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                </svg>
                            </button>
                        </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Western Visi Cooler SRC 280</h3>
                        <p class="text-orange-600 font-bold text-lg mb-3">$0.00</p>
                        <button class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-700 transition-colors">
                            Add to cart
                        </button>
                    </div>

                    <!-- Product Card 5 -->
                    <div class="product-card border border-orange-300 p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-2 right-2 flex flex-col gap-2">
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Commercial Grinder Pro</h3>
                        <p class="text-orange-600 font-bold text-lg mb-3">$0.00</p>
                        <button class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-700 transition-colors">
                            Add to cart
                        </button>
                    </div>

                    <!-- Product Card 6 -->
                    <div class="product-card border border-orange-300 p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-2 right-2 flex flex-col gap-2">
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Food Processor Deluxe</h3>
                        <p class="text-orange-600 font-bold text-lg mb-3">$0.00</p>
                        <button class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-700 transition-colors">
                            Add to cart
                        </button>
                    </div>

                    <!-- Product Card 7 -->
                    <div class="product-card border border-orange-300 p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-2 right-2 flex flex-col gap-2">
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Mixie Machine Premium</h3>
                        <p class="text-orange-600 font-bold text-lg mb-3">$0.00</p>
                        <button class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-700 transition-colors">
                            Add to cart
                        </button>
                    </div>

                    <!-- Product Card 8 -->
                    <div class="product-card border border-orange-300 p-4 transition-all duration-300 hover:shadow-lg">
                        <div class="relative mb-4">
                            <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-2 right-2 flex flex-col gap-2">
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                                <button class="w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Noodle Making Machine</h3>
                        <p class="text-orange-600 font-bold text-lg mb-3">$0.00</p>
                        <button class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-700 transition-colors">
                            Add to cart
                        </button>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center items-center mt-8 space-x-2">
                    <button class="pagination-btn px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button class="pagination-btn active px-4 py-2 border border-gray-300 rounded-lg transition-colors">1</button>
                    <button class="pagination-btn px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">2</button>
                    <button class="pagination-btn px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">3</button>
                    <span class="px-2 text-gray-500">...</span>
                    <button class="pagination-btn px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">10</button>
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
        document.querySelectorAll('.product-card button').forEach(btn => {
            if (btn.textContent.includes('Add to cart')) {
                btn.addEventListener('click', function() {
                    console.log('Added to cart:', this.closest('.product-card').querySelector('h3').textContent);
                });
            }
        });

        // Wishlist functionality
        document.querySelectorAll('.product-card .absolute button').forEach(btn => {
            btn.addEventListener('click', function() {
                console.log('Wishlist/Compare clicked');
            });
        });
    </script>
<?php include("footer.php"); ?>