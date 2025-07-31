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

    <?php include "section_js/script.php"; ?>
</body>
</html>