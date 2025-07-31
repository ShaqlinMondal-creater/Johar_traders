<div id="customers" class="content-section">
    <div class="mb-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Customers</h2>
        <p class="text-gray-600">Manage customer accounts</p>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <input type="text" id="customer-search" placeholder="Search customers..." class="border border-gray-300 rounded-lg px-4 py-2 w-64">
        </div>

        <div class="overflow-x-auto max-h-[700px] overflow-y-auto">
            <table class="w-full min-w-[900px]">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3 px-4">Customer ID</th>
                        <th class="text-left py-3 px-4">Name</th>
                        <th class="text-left py-3 px-4">Phone</th>
                        <th class="text-left py-3 px-4">Status</th>
                        <th class="text-left py-3 px-4">Token</th>
                        <th class="text-left py-3 px-4">Role</th>
                        <th class="text-left py-3 px-4">Create Date</th>
                        <th class="text-left py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody id="customer-table-body">
                    <!-- Users Data -->
                </tbody>
            </table>
        </div>

        <div id="customer-pagination" class="flex justify-between items-center mt-4 flex-wrap gap-4 text-sm">
            <button id="customer-prevPage" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Prev</button>
            <div id="customer-pageInfo" class="text-gray-700">Page 1 of 1</div>
            <button id="customer-nextPage" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Next</button>
        </div>
    </div>
</div>
