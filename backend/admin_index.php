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
                        <button class="sidebar-item w-full text-left px-4 py-3 rounded-lg transition-colors flex items-center gap-3" onclick="showSection('customers')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                            Customers
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
            <?php include("sections/dashboard.php"); ?>

            <!-- Products Section -->
            <?php include("sections/products.php"); ?>
            
            <!-- Categories Section -->
            <?php include("sections/categories.php"); ?>
            
            <!-- Users Section -->
            <?php include("sections/users.php"); ?>

            <!-- Orders Section -->
            <?php include("sections/orders.php"); ?>

            <!-- Analytics Section -->
            <?php include("sections/analytics.php"); ?>

            <!-- Settings Section -->
            <?php include("sections/analytics.php"); ?>

        </div>
    </div>
    
<!-- Get Sections Logic -->
<script>
    // --- 4) SIDEBAR NAVIGATION ---
    function showSection(sectionId) {
        document.querySelectorAll('.content-section').forEach(section => section.classList.remove('active'));
        document.querySelectorAll('.sidebar-item').forEach(item => item.classList.remove('active'));

        document.getElementById(sectionId).classList.add('active');
        event.target.classList.add('active');

            // Load API data based on section
            if (sectionId === 'dashboard') loadDashboardData();
            if (sectionId === 'products') {
                setTimeout(() => loadProductsData(), 1000); // let DOM render pagination buttons
            }
            if (sectionId === 'categories') loadCategoriesData();
            if (sectionId === 'customers') loadCustomersData();
        }

    // --- 5) INITIAL DASHBOARD LOAD ---
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => loadDashboardData(), 1000); // let DOM render pagination buttons
    });
</script>

<script>
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

<?php include("footer.php"); ?>
