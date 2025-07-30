<?php include("header.php"); ?>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg min-h-screen">
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <button class="sidebar-item active w-full text-left px-4 py-3 rounded-lg transition-colors flex items-center gap-3" onclick="showSection('dashboard')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            </svg>
                            Dashboard
                        </button>
                    </li>
                    <li>
                        <button class="sidebar-item w-full text-left px-4 py-3 rounded-lg transition-colors flex items-center gap-3" onclick="showSection('products')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Products
                        </button>
                    </li>
                    <li>
                        <button class="sidebar-item w-full text-left px-4 py-3 rounded-lg transition-colors flex items-center gap-3" onclick="showSection('categories')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            Categories
                        </button>
                    </li>
                    <li>
                        <button class="sidebar-item w-full text-left px-4 py-3 rounded-lg transition-colors flex items-center gap-3" onclick="showSection('orders')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Orders
                        </button>
                    </li>
                    <li>
                        <button class="sidebar-item w-full text-left px-4 py-3 rounded-lg transition-colors flex items-center gap-3" onclick="showSection('customers')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                            Customers
                        </button>
                    </li>
                    <li>
                        <button class="sidebar-item w-full text-left px-4 py-3 rounded-lg transition-colors flex items-center gap-3" onclick="showSection('analytics')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Analytics
                        </button>
                    </li>
                    <li>
                        <button class="sidebar-item w-full text-left px-4 py-3 rounded-lg transition-colors flex items-center gap-3" onclick="showSection('settings')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
                        </button>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">

            <!-- Dashboard Section -->
            <div id="dashboard" class="content-section active">
                <div class="mb-6">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Dashboard</h2>
                    <p class="text-gray-600">Welcome to your admin dashboard</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8" id="statsSection">
                    <!-- Products -->
                    <div class="stats-card bg-orange-600 text-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-orange-100">Total Products</p>
                                <p class="text-3xl font-bold" id="totalProducts">0</p>
                            </div>
                            <svg class="w-12 h-12 text-orange-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Orders -->
                    <div class="bg-green-600 text-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100">Total Orders</p>
                                <p class="text-3xl font-bold" id="totalOrders">00</p>
                            </div>
                            <svg class="w-12 h-12 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Customers -->
                    <div class="bg-blue-600 text-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-blue-100">Total Customers</p>
                                <p class="text-3xl font-bold" id="totalUsers">0</p>
                            </div>
                            <svg class="w-12 h-12 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="bg-purple-600 text-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-100">Total Categories</p>
                                <p class="text-3xl font-bold" id="totalCategories">0</p>
                            </div>
                            <svg class="w-12 h-12 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Section -->
            <div id="products" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Products</h2>
                        <p class="text-gray-600">Manage your product inventory</p>
                    </div>
                    <button onclick="openModal('addProductModal')" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        Add New Product
                    </button>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex gap-4">
                            <input type="text" placeholder="Search products..." class="border border-gray-300 rounded-lg px-4 py-2 w-64">
                            <select class="border border-gray-300 rounded-lg px-4 py-2">
                                <option>All Categories</option>
                                <option>Mixie Machine</option>
                                <option>Food Processor</option>
                                <option>Grinding Machine</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3 px-4">Image</th>
                                    <th class="text-left py-3 px-4">Product Name</th>
                                    <th class="text-left py-3 px-4">Category</th>
                                    <th class="text-left py-3 px-4">Price</th>
                                    <th class="text-left py-3 px-4">Stock</th>
                                    <th class="text-left py-3 px-4">Status</th>
                                    <th class="text-left py-3 px-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-row border-b">
                                    <td class="py-3 px-4">
                                        <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 font-semibold">Coconut Scrapper Machine</td>
                                    <td class="py-3 px-4">Kitchen Appliances</td>
                                    <td class="py-3 px-4">₹2,999</td>
                                    <td class="py-3 px-4">25</td>
                                    <td class="py-3 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Active</span></td>
                                    <td class="py-3 px-4">
                                        <div class="flex gap-2">
                                            <button class="text-blue-600 hover:text-blue-800">Edit</button>
                                            <button class="text-red-600 hover:text-red-800">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="table-row border-b">
                                    <td class="py-3 px-4">
                                        <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 font-semibold">Ice Cube Maker WOI-45</td>
                                    <td class="py-3 px-4">Cooling Equipment</td>
                                    <td class="py-3 px-4">₹15,999</td>
                                    <td class="py-3 px-4">12</td>
                                    <td class="py-3 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Active</span></td>
                                    <td class="py-3 px-4">
                                        <div class="flex gap-2">
                                            <button class="text-blue-600 hover:text-blue-800">Edit</button>
                                            <button class="text-red-600 hover:text-red-800">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="table-row">
                                    <td class="py-3 px-4">
                                        <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 font-semibold">Drinking Water Cooler</td>
                                    <td class="py-3 px-4">Cooling Equipment</td>
                                    <td class="py-3 px-4">₹8,499</td>
                                    <td class="py-3 px-4">8</td>
                                    <td class="py-3 px-4"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-sm">Low Stock</span></td>
                                    <td class="py-3 px-4">
                                        <div class="flex gap-2">
                                            <button class="text-blue-600 hover:text-blue-800">Edit</button>
                                            <button class="text-red-600 hover:text-red-800">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Categories Section -->
            <div id="categories" class="content-section">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Categories</h2>
                        <p class="text-gray-600">Manage product categories</p>
                    </div>
                    <button onclick="openModal('addCategoryModal')" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        Add New Category
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">Mixie Machine</h3>
                            <div class="flex gap-2">
                                <button class="text-blue-600 hover:text-blue-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                <button class="text-red-600 hover:text-red-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">Products: 15</p>
                        <p class="text-sm text-gray-500">Kitchen appliances for grinding and mixing</p>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">Food Processors</h3>
                            <div class="flex gap-2">
                                <button class="text-blue-600 hover:text-blue-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                <button class="text-red-600 hover:text-red-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">Products: 8</p>
                        <p class="text-sm text-gray-500">Multi-functional food processing equipment</p>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">Cooling Equipment</h3>
                            <div class="flex gap-2">
                                <button class="text-blue-600 hover:text-blue-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                <button class="text-red-600 hover:text-red-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">Products: 12</p>
                        <p class="text-sm text-gray-500">Refrigeration and cooling solutions</p>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    
    <!-- Add Product Modal -->
    <div id="addProductModal" class="modal">
        <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-2xl mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold">Add New Product</h3>
                <button onclick="closeModal('addProductModal')" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter product name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option>Select Category</option>
                            <option>Mixie Machine</option>
                            <option>Food Processor</option>
                            <option>Cooling Equipment</option>
                        </select>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Price (₹)</label>
                        <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0.00">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity</label>
                        <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="0">
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea class="w-full border border-gray-300 rounded-lg px-3 py-2 h-24" placeholder="Enter product description"></textarea>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
                    <input type="file" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                
                <div class="flex justify-end gap-4 pt-4">
                    <button type="button" onclick="closeModal('addProductModal')" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg transition-colors">
                        Add Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Category Modal -->
    <div id="addCategoryModal" class="modal">
        <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold">Add New Category</h3>
                <button onclick="closeModal('addCategoryModal')" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                    <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Enter category name">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea class="w-full border border-gray-300 rounded-lg px-3 py-2 h-20" placeholder="Enter category description"></textarea>
                </div>
                
                <div class="flex justify-end gap-4 pt-4">
                    <button type="button" onclick="closeModal('addCategoryModal')" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="px-6 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg transition-colors">
                        Add Category
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Sidebar navigation
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Remove active class from all sidebar items
            document.querySelectorAll('.sidebar-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Show selected section
            document.getElementById(sectionId).classList.add('active');
            
            // Add active class to clicked sidebar item
            event.target.classList.add('active');
        }

        // Modal functions
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        // Close modal when clicking outside
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.remove('active');
                }
            });
        });

        // Sample data and interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add click handlers for edit/delete buttons
            document.querySelectorAll('button').forEach(button => {
                if (button.textContent.includes('Edit') || button.textContent.includes('Delete') || 
                    button.textContent.includes('View') || button.textContent.includes('Update')) {
                    button.addEventListener('click', function() {
                        console.log('Action clicked:', this.textContent);
                    });
                }
            });
        });
    </script>
    <?php include "section_js/script.php"; ?>
</body>
</html>

<?php //include("footer.php"); ?>
