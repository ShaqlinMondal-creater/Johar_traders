<!-- Logout Logics -->
<script>
  // Display user_name from localStorage
  const userName = localStorage.getItem('user_name') || "Admin User";
  document.getElementById('adminUserName').textContent = userName;

  // Logout functionality
  document.getElementById('logoutBtn').addEventListener('click', async () => {
    const logout_token = localStorage.getItem('auth_token');
    console.log("Logout Token:", logout_token);
    if (logout_token) {
      try {
        // Call logout API
        const response = await fetch(`<?php echo $BASE_URL_LOCAL; ?>/users/logout_user.php`, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ token: logout_token })
        });

        const data = await response.json();

        if (data.success) {
          // Remove all localStorage items
          localStorage.clear();
          window.location.href = "../frontend/index.php";
        } else {
          alert(data.message || "Logout failed.");
        }
      } catch (error) {
        console.error("Logout Error:", error);
        alert("Unable to connect to server.");
      }
    } else {
      // No token found, just clear and redirect
      localStorage.clear();
      window.location.href = "../frontend/index.php";
    }
  });
</script>

<!-- Get Dashboard Data -->
<script>
    const ad_role = localStorage.getItem('user_role');
    const ad_token = localStorage.getItem('auth_token');

    // If not logged in or role != admin, redirect
    // if (!ad_role || !ad_token ) {
    //     alert("Not Okay");
    //     // window.location.href = "../frontend/login.php";
    // }else{
    //     alert("okay");
    // }

    // --- 1) DASHBOARD DATA LOADER ---
    async function loadDashboardData() {
        // const dash_role = localStorage.getItem('user_role');
        // const dash_token = localStorage.getItem('auth_token');
        const apiUrl = `<?php echo $BASE_URL_LOCAL; ?>/dashboard_api.php?token=${encodeURIComponent(ad_token)}&role=${encodeURIComponent(ad_role)}`;
        // console.log(ad_token);
        try {
            const response = await fetch(apiUrl, { method: 'POST' });
            const result = await response.json();

            if (result.status === "success" && result.data) {
                document.getElementById('totalProducts').textContent = result.data.total_products || 0;
                document.getElementById('totalCategories').textContent = result.data.total_categories || 0;
                document.getElementById('totalUsers').textContent = result.data.total_users || 0;
                document.getElementById('totalOrders').textContent = "00"; // Static for now
            } else {
                console.warn('Dashboard API returned error:', result);
            }
        } catch (error) {
            console.error('Error fetching dashboard data:', error);
        }
    }
</script>

<!-- Get Products Data -->
<script>
    // --- 2) PRODUCTS DATA LOADER ---
    let currentPage = 1;
    let totalPages = 1;
    const limit = 10;

    async function loadProductsData(filters = {}) {
        const apiUrl = `<?php echo $BASE_URL_LOCAL; ?>/products/get_products.php`;

        const payload = {
            ...filters,
            limit: limit,
            offset: (currentPage - 1) * limit
        };

        try {
            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });

            const result = await response.json();

            if (result.status === 'success') {
                const products = result.data;
                const tbody = document.querySelector('#products tbody');
                tbody.innerHTML = '';
                

                products.forEach(product => {
                    const firstImage = product.photos.split(",")[0];
                    const imageSrc = firstImage
                        ? `../frontend/Johar_traders_uploads/product/${firstImage}`
                        : `../frontend/Johar_traders_uploads/placeholder.png`;

                    tbody.innerHTML += `
                        <tr class="table-row border-b">
                            <td class="py-3 px-4">
                                <img src="${imageSrc}" class="w-12 h-12 rounded-lg object-cover" alt="${product.name}">
                            </td>
                            <td class="py-3 px-4 font-semibold">${product.name}</td>
                            <td class="py-3 px-4">${product.category.category_name || 'N/A'}</td>
                            <td class="py-3 px-4">${product.brand.brand_name || 'N/A'}</td>
                            <td class="py-3 px-4">${product.stock || '-'}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full text-sm ${product.published == 1 ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'}">
                                    ${product.published == 1 ? 'Active' : 'Inactive'}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex gap-2">
                                    <button class="text-blue-600 hover:text-blue-800" href="edit(${product.id})">Edit</button>
                                    <button class="text-red-600 hover:text-red-800" href="delete(${product.id})">Delete</button>
                                </div>
                            </td>
                        </tr>
                    `;
                });

                // Update pagination
                totalPages = result.pagination.total_pages;
                document.getElementById('pageInfo').textContent = `Page ${currentPage} of ${totalPages}`;
                document.getElementById('product-prevPage').disabled = currentPage === 1;
                document.getElementById('product-nextPage').disabled = currentPage === totalPages;

            } else {
                console.warn('Products API returned error:', result);
            }
        } catch (error) {
            console.error('Error fetching products data:', error);
        }
    }
    // Product Pagination
    document.getElementById('product-prevPage').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            loadProductsData(); // Keep your filters here if added
        }
    });
    document.getElementById('product-nextPage').addEventListener('click', () => {
        if (currentPage < totalPages) {
            currentPage++;
            loadProductsData(); // Keep your filters here if added
        }
    });

    // Product Filter
    const nameInput = document.querySelector('input[placeholder="Search products..."]');
    const categorySelect = document.querySelector('select');

    [nameInput, categorySelect].forEach(el => {
        el.addEventListener('change', () => {
            currentPage = 1;
            const filters = {
                product_name: nameInput.value.trim(),
                category_name: categorySelect.value !== 'All Categories' ? categorySelect.value : undefined
            };
            loadProductsData(filters);
        });
    });
</script>

<!-- Get Categories Data -->
<script>
    // --- 3) CATEGORIES DATA LOADER ---
    let catCurrentPage = 1;
    let catTotalPages = 1;

    async function loadCategoriesData(filters = {}) {
        const apiUrl = `<?php echo $BASE_URL_LOCAL; ?>/categories/get_categories.php`;

        const payload = {
            ...filters,
            page: catCurrentPage,
            limit: 9
        };

        try {
            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });

            const result = await response.json();

            if (result.status === 'success') {
                const categories = result.data;
                const grid = document.getElementById('category-grid');
                grid.innerHTML = '';

                categories.forEach(cat => {
                    grid.innerHTML += `
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold">${cat.name}</h3>
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
                            <p class="text-gray-600 mb-2">Products: --</p>
                            <p class="text-sm text-gray-500">Category slug: ${cat.slug}</p>
                        </div>
                    `;
                });

                // Pagination update
                catTotalPages = result.pagination.total_pages;
                document.getElementById('cat-pageInfo').textContent = `Page ${catCurrentPage} of ${catTotalPages}`;
                document.getElementById('cat-prevPage').disabled = catCurrentPage === 1;
                document.getElementById('cat-nextPage').disabled = catCurrentPage === catTotalPages;
            }
        } catch (error) {
            console.error('Error loading categories:', error);
        }
    }
    // Categories pagination and filter
    // Event listeners for category pagination
    document.addEventListener('DOMContentLoaded', () => {
        const catPrev = document.getElementById('cat-prevPage');
        const catNext = document.getElementById('cat-nextPage');

        if (catPrev && catNext) {
            catPrev.addEventListener('click', () => {
                if (catCurrentPage > 1) {
                    catCurrentPage--;
                    loadCategoriesData({ category_name: document.getElementById('cat-search-input')?.value || '' });
                }
            });

            catNext.addEventListener('click', () => {
                if (catCurrentPage < catTotalPages) {
                    catCurrentPage++;
                    loadCategoriesData({ category_name: document.getElementById('cat-search-input')?.value || '' });
                }
            });
        }

        // Filter on input change
        const catSearch = document.querySelector('input[placeholder="Search Category Name..."]');
        if (catSearch) {
            catSearch.id = 'cat-search-input'; // assign id if not present
            catSearch.addEventListener('input', () => {
                catCurrentPage = 1;
                loadCategoriesData({ category_name: catSearch.value.trim() });
            });
        }
    });
</script>

<!-- Get users Data -->
<script>
    let custCurrentPage = 1;
    let custTotalPages = 1;
    const custLimit = 10;

    async function loadCustomersData(filters = {}) {
        const apiUrl = `<?php echo $BASE_URL_LOCAL; ?>/users/get_users.php?token=${encodeURIComponent(ad_token)}&role=${encodeURIComponent(ad_role)}`;

        const payload = {
            ...filters,
            limit: custLimit,
            offset: (custCurrentPage - 1) * custLimit
        };

        try {
            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });

            const result = await response.json();

            if (result.status === 'success') {
                const users = result.data;
                const tbody = document.getElementById('customer-table-body');
                tbody.innerHTML = '';

                users.forEach((user, index) => {
                    tbody.innerHTML += `
                        <tr class="table-row border-b">
                            <td class="py-3 px-4">#CUST-${user.id.toString().padStart(3, '0')}</td>
                            <td class="py-3 px-4 font-semibold">
                              <span>${user.name}</span>
                              <br>
                              <span>${user.user_name}</span>
                            </td>                            
                            <td class="py-3 px-4">${user.mobile}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full text-sm ${user.is_loggedin == 1 ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'}">
                                    ${user.is_loggedin == 1 ? 'Active' : 'Inactive'}
                                </span>
                            </td>
                            <td class="py-3 px-4"><span class="px-2 py-1 rounded-full text-sm bg-orange-100 text-orange-800">${user.token}</span></td>
                            <td class="py-3 px-4">${user.role}</td>
                            <td class="py-3 px-4">${user.created_at}</td>
                            <td class="py-3 px-4">
                                <div class="flex gap-2">
                                    <button class="text-blue-600 hover:text-blue-800">View</button>
                                    <button class="text-green-600 hover:text-green-800">Edit</button>
                                </div>
                            </td>
                        </tr>
                    `;
                });

                // Update pagination
                custTotalPages = result.pagination.total_pages;
                document.getElementById('customer-pageInfo').textContent = `Page ${custCurrentPage} of ${custTotalPages}`;
                document.getElementById('customer-prevPage').disabled = custCurrentPage === 1;
                document.getElementById('customer-nextPage').disabled = custCurrentPage === custTotalPages;
            } else {
                console.warn('Customer API error:', result);
            }
        } catch (error) {
            console.error('Error loading customers:', error);
        }
    }

    // Event listeners
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('customer-search');
        const prevBtn = document.getElementById('customer-prevPage');
        const nextBtn = document.getElementById('customer-nextPage');

        if (prevBtn && nextBtn) {
            prevBtn.addEventListener('click', () => {
                if (custCurrentPage > 1) {
                    custCurrentPage--;
                    loadCustomersData({ user_name: searchInput.value.trim() });
                }
            });

            nextBtn.addEventListener('click', () => {
                if (custCurrentPage < custTotalPages) {
                    custCurrentPage++;
                    loadCustomersData({ user_name: searchInput.value.trim() });
                }
            });
        }

        if (searchInput) {
            searchInput.addEventListener('input', () => {
                custCurrentPage = 1;
                loadCustomersData({ user_name: searchInput.value.trim() });
            });
        }
    });
</script>
