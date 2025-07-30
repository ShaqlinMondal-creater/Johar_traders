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

    <!-- Recent Orders -->
    <!-- <div class="bg-white rounded-lg shadow-lg p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Recent Orders</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3 px-4">Order ID</th>
                        <th class="text-left py-3 px-4">Customer</th>
                        <th class="text-left py-3 px-4">Product</th>
                        <th class="text-left py-3 px-4">Amount</th>
                        <th class="text-left py-3 px-4">Status</th>
                        <th class="text-left py-3 px-4">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-row border-b">
                        <td class="py-3 px-4">#ORD-001</td>
                        <td class="py-3 px-4">John Doe</td>
                        <td class="py-3 px-4">Mixie Machine</td>
                        <td class="py-3 px-4">₹2,999</td>
                        <td class="py-3 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Completed</span></td>
                        <td class="py-3 px-4">2024-01-15</td>
                    </tr>
                    <tr class="table-row border-b">
                        <td class="py-3 px-4">#ORD-002</td>
                        <td class="py-3 px-4">Jane Smith</td>
                        <td class="py-3 px-4">Food Processor</td>
                        <td class="py-3 px-4">₹4,599</td>
                        <td class="py-3 px-4"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-sm">Pending</span></td>
                        <td class="py-3 px-4">2024-01-14</td>
                    </tr>
                    <tr class="table-row">
                        <td class="py-3 px-4">#ORD-003</td>
                        <td class="py-3 px-4">Mike Johnson</td>
                        <td class="py-3 px-4">Grinding Machine</td>
                        <td class="py-3 px-4">₹8,999</td>
                        <td class="py-3 px-4"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">Processing</span></td>
                        <td class="py-3 px-4">2024-01-13</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> -->
</div>