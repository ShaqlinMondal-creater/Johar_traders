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

    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <div class="flex gap-4">
                <input type="text" placeholder="Search Category Name..." class="border border-gray-300 rounded-lg px-4 py-2 w-64">
            </div>
        </div>
        <div id="category-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!--  -->
        </div>
        <div id="category-pagination" class="flex justify-between items-center mt-4 flex-wrap gap-4 text-sm">
            <button id="cat-prevPage" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Prev</button>
            <div id="cat-pageInfo" class="text-gray-700">Page 1 of 1</div>
            <button id="cat-nextPage" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Next</button>
        </div>
    </div>
</div>