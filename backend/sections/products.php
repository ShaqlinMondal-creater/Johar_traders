<div id="products" class="content-section ">
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
        
        <div class="overflow-x-auto max-h-[500px] overflow-y-auto">
            <table class="w-full min-w-[800px]">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3 px-4">Image</th>
                        <th class="text-left py-3 px-4">Product Name</th>
                        <th class="text-left py-3 px-4">Category</th>
                        <th class="text-left py-3 px-4">Brand</th>
                        <th class="text-left py-3 px-4">Stock</th>
                        <th class="text-left py-3 px-4">Status</th>
                        <th class="text-left py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!--  -->
                </tbody>
            </table>
            <div id="pagination" class="flex justify-between items-center mt-4 flex-wrap gap-4 text-sm">
                <button id="product-prevPage" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Prev</button>
                <div id="pageInfo" class="text-gray-700">Page 1 of 1</div>
                <button id="product-nextPage" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Next</button>
            </div>
        </div>
    </div>
</div>