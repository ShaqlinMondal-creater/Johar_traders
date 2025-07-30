<div id="settings" class="content-section">
    <div class="mb-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Settings</h2>
        <p class="text-gray-600">Manage system settings</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold mb-4">General Settings</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Site Name</label>
                    <input type="text" value="Active Ecommerce CMS" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Site Description</label>
                    <textarea class="w-full border border-gray-300 rounded-lg px-3 py-2 h-20">Best rated ecommerce item</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Contact Email</label>
                    <input type="email" value="johartrader52@gmail.com" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Payment Settings</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Currency</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option>INR (₹)</option>
                        <option>USD ($)</option>
                        <option>EUR (€)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tax Rate (%)</label>
                    <input type="number" value="18" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="enablePayments" checked class="rounded">
                    <label for="enablePayments" class="text-sm text-gray-700">Enable Online Payments</label>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 flex justify-end">
        <button class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
            Save Settings
        </button>
    </div>
</div>