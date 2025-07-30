<div id="orders" class="content-section">
    <div class="mb-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Orders</h2>
        <p class="text-gray-600">Manage customer orders</p>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <div class="flex gap-4">
                <input type="text" placeholder="Search orders..." class="border border-gray-300 rounded-lg px-4 py-2 w-64">
                <select class="border border-gray-300 rounded-lg px-4 py-2">
                    <option>All Status</option>
                    <option>Pending</option>
                    <option>Processing</option>
                    <option>Completed</option>
                    <option>Cancelled</option>
                </select>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3 px-4">Order ID</th>
                        <th class="text-left py-3 px-4">Customer</th>
                        <th class="text-left py-3 px-4">Products</th>
                        <th class="text-left py-3 px-4">Total Amount</th>
                        <th class="text-left py-3 px-4">Status</th>
                        <th class="text-left py-3 px-4">Date</th>
                        <th class="text-left py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-row border-b">
                        <td class="py-3 px-4 font-semibold">#ORD-001</td>
                        <td class="py-3 px-4">John Doe</td>
                        <td class="py-3 px-4">Mixie Machine, Food Processor</td>
                        <td class="py-3 px-4">₹7,598</td>
                        <td class="py-3 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Completed</span></td>
                        <td class="py-3 px-4">2024-01-15</td>
                        <td class="py-3 px-4">
                            <div class="flex gap-2">
                                <button class="text-blue-600 hover:text-blue-800">View</button>
                                <button class="text-green-600 hover:text-green-800">Update</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="table-row border-b">
                        <td class="py-3 px-4 font-semibold">#ORD-002</td>
                        <td class="py-3 px-4">Jane Smith</td>
                        <td class="py-3 px-4">Ice Cube Maker</td>
                        <td class="py-3 px-4">₹15,999</td>
                        <td class="py-3 px-4"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-sm">Pending</span></td>
                        <td class="py-3 px-4">2024-01-14</td>
                        <td class="py-3 px-4">
                            <div class="flex gap-2">
                                <button class="text-blue-600 hover:text-blue-800">View</button>
                                <button class="text-green-600 hover:text-green-800">Update</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="table-row">
                        <td class="py-3 px-4 font-semibold">#ORD-003</td>
                        <td class="py-3 px-4">Mike Johnson</td>
                        <td class="py-3 px-4">Grinding Machine</td>
                        <td class="py-3 px-4">₹8,999</td>
                        <td class="py-3 px-4"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">Processing</span></td>
                        <td class="py-3 px-4">2024-01-13</td>
                        <td class="py-3 px-4">
                            <div class="flex gap-2">
                                <button class="text-blue-600 hover:text-blue-800">View</button>
                                <button class="text-green-600 hover:text-green-800">Update</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>