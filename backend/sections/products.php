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