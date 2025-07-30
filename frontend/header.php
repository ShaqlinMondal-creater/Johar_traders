<!DOCTYPE html>
<html lang="en">
<?php //include("connection/db_connect.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Johar Traders</title>
    <link rel="icon" href="Johar_traders_uploads/logo/5N9MOS9NAN-20190102-073826.png">
    <link rel="apple-touch-icon" href="Johar_traders_uploads/logo/5N9MOS9NAN-20190102-073826.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body class="bg-white-100">
    <!-- Top Header - Sticky -->
    <div class="bg-orange-600 text-white px-3 md:px-5 py-2 text-sm sticky top-0 z-50">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-2 max-w-7xl mx-auto">
            <div class=" text-center sm:text-left">Helpline: +91 9831090825</div>
            <div class="relative w-full sm:w-auto">
                <input type="text"
                    class="px-4 py-2 pr-10 rounded-full w-full sm:w-72 text-gray-800 outline-none text-sm"
                    placeholder="I am shopping for...">
                <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Header - Sticky -->
    <div class="bg-white shadow-md sticky top-[40px] z-40">
        <div class="flex justify-center items-center max-w-7xl mx-auto min-h-[100px] px-3 md:px-5">
            <div class="flex items-center justify-center w-full">
                <img src="Johar_traders_uploads/logo/KLMIP2NATC-20190102-073826.png" 
                    alt="Company Logo" 
                    class="w-full max-w-[300px] md:max-w-[400px] h-auto object-contain">
            </div>
        </div>
    </div>

    <!-- Navigation Bar - Sticky -->
    <nav id="navbar"
        class="bg-orange-600 px-8 transition-all duration-300 sticky top-[140px] md:top-[140px] z-30">
        <div class="flex items-center nav_category_sec">
            <!-- Categories Dropdown -->
            <div class="categories-dropdown relative">
                <button id="categoriesBtn"
                    class="bg-black bg-opacity-20 text-white px-4 md:px-6 py-4  text-sm md:text-base flex items-center gap-2 hover:bg-opacity-30 transition-colors">
                    Categories
                    <svg class="w-4 h-4 dropdown-arrow transition-transform duration-300" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Category Modal -->
                <div id="categoryModal" class="category-modal">
                    <div class="flex justify-between items-center mb-4 md:hidden">
                        <h2 class="text-xl  text-orange-600">Categories</h2>
                        <button id="closeCategoryModal" class="text-gray-600 hover:text-gray-800">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 p-6">
                        <!-- Electronics Category -->
                        <div>
                            <h3 class=" text-orange-600 text-lg mb-3 border-b border-orange-200 pb-2">
                                Electronics</h3>
                            <ul class="space-y-2">
                                <li><a href="under_construction.php" 
                                        class="text-gray-700 hover:text-orange-600 transition-colors">Smartphones</a>
                                </li>
                                <li><a href="under_construction.php" 
                                        class="text-gray-700 hover:text-orange-600 transition-colors">Laptops</a></li>
                                <li><a href="under_construction.php" 
                                        class="text-gray-700 hover:text-orange-600 transition-colors">Tablets</a></li>
                                <li><a href="under_construction.php" 
                                        class="text-gray-700 hover:text-orange-600 transition-colors">Headphones</a>
                                </li>
                                <li><a href="under_construction.php" 
                                        class="text-gray-700 hover:text-orange-600 transition-colors">Cameras</a></li>
                            </ul>
                        </div>

                        <!-- Kitchen Appliances Category -->
                        <div>
                            <h3 class=" text-orange-600 text-lg mb-3 border-b border-orange-200 pb-2">Kitchen
                                Appliances</h3>
                            <ul class="space-y-2">
                                <li><a href="under_construction.php"  class="text-gray-700 hover:text-orange-600 transition-colors">Mixie
                                        Machine</a></li>
                                <li><a href="under_construction.php"  class="text-gray-700 hover:text-orange-600 transition-colors">Grinding &
                                        Pulverizers</a></li>
                                <li><a href="under_construction.php"  class="text-gray-700 hover:text-orange-600 transition-colors">Chatna
                                        Machines</a></li>
                                <li><a href="under_construction.php"  class="text-gray-700 hover:text-orange-600 transition-colors">Food
                                        Processors</a></li>
                                <li><a href="under_construction.php" 
                                        class="text-gray-700 hover:text-orange-600 transition-colors">Blenders</a></li>
                            </ul>
                        </div>

                        <!-- Food Processing Category -->
                        <div>
                            <h3 class=" text-orange-600 text-lg mb-3 border-b border-orange-200 pb-2">Food
                                Processing</h3>
                            <ul class="space-y-2">
                                <li><a href="under_construction.php"  class="text-gray-700 hover:text-orange-600 transition-colors">Namkeen
                                        Machines</a></li>
                                <li><a href="under_construction.php"  class="text-gray-700 hover:text-orange-600 transition-colors">Noodle
                                        Machines</a></li>
                                <li><a href="under_construction.php"  class="text-gray-700 hover:text-orange-600 transition-colors">Sewai
                                        Machines</a></li>
                                <li><a href="under_construction.php"  class="text-gray-700 hover:text-orange-600 transition-colors">Pasta
                                        Machines</a></li>
                                <li><a href="under_construction.php"  class="text-gray-700 hover:text-orange-600 transition-colors">Snack
                                        Makers</a></li>
                            </ul>
                        </div>

                        <!-- Home Appliances Category -->
                        <div>
                            <h3 class=" text-orange-600 text-lg mb-3 border-b border-orange-200 pb-2">Home
                                Appliances</h3>
                            <ul class="space-y-2">
                                <li><a href="under_construction.php"  class="text-gray-700 hover:text-orange-600 transition-colors">Washing
                                        Machines</a></li>
                                <li><a href="under_construction.php" 
                                        class="text-gray-700 hover:text-orange-600 transition-colors">Refrigerators</a>
                                </li>
                                <li><a href="under_construction.php"  class="text-gray-700 hover:text-orange-600 transition-colors">Air
                                        Conditioners</a></li>
                                <li><a href="under_construction.php"  class="text-gray-700 hover:text-orange-600 transition-colors">Vacuum
                                        Cleaners</a></li>
                                <li><a href="under_construction.php"  class="text-gray-700 hover:text-orange-600 transition-colors">Water
                                        Heaters</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Links - Desktop -->
            <ul class="hidden md:flex desk_ul_navi">
                <li><a href="under_construction.php" 
                        class="text-white px-4 lg:px-6 py-4  text-sm lg:text-base hover:bg-black hover:bg-opacity-20 transition-colors">Home</a>
                </li>
                <li><a href="under_construction.php" 
                        class="text-white px-4 lg:px-6 py-4  text-sm lg:text-base hover:bg-black hover:bg-opacity-20 transition-colors">Flash
                        Sale</a></li>
                <li><a href="under_construction.php" 
                        class="text-white px-4 lg:px-6 py-4  text-sm lg:text-base hover:bg-black hover:bg-opacity-20 transition-colors">Blogs</a>
                </li>
                <li><a href="under_construction.php" 
                        class="text-white px-4 lg:px-6 py-4  text-sm lg:text-base hover:bg-black hover:bg-opacity-20 transition-colors">All
                        Brands</a></li>
                <li><a href="under_construction.php" 
                        class="text-white px-4 lg:px-6 py-4  text-sm lg:text-base hover:bg-black hover:bg-opacity-20 transition-colors">All
                        Categories</a></li>
            </ul>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="md:hidden text-white px-4 py-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="mobile-menu md:hidden bg-orange-600 border-t border-orange-500">
            <ul class="py-2">
                <li><a href="under_construction.php" 
                        class="block text-white px-6 py-3  text-base hover:bg-black hover:bg-opacity-20 transition-colors">Home</a>
                </li>
                <li><a href="under_construction.php" 
                        class="block text-white px-6 py-3  text-base hover:bg-black hover:bg-opacity-20 transition-colors">Flash
                        Sale</a></li>
                <li><a href="under_construction.php" 
                        class="block text-white px-6 py-3  text-base hover:bg-black hover:bg-opacity-20 transition-colors">Blogs</a>
                </li>
                <li><a href="under_construction.php" 
                        class="block text-white px-6 py-3  text-base hover:bg-black hover:bg-opacity-20 transition-colors">All
                        Brands</a></li>
                <li><a href="under_construction.php" 
                        class="block text-white px-6 py-3  text-base hover:bg-black hover:bg-opacity-20 transition-colors">All
                        Categories</a></li>
            </ul>
        </div>
    </nav>