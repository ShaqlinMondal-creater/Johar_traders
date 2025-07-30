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

<!-- Get Dashboard Counts -->
<script>
  const dash_token = localStorage.getItem('auth_token');
  const dash_role = localStorage.getItem('user_role');

  // If not logged in or role != admin, redirect
  if (!dash_token || dash_role !== 'admin') {
    window.location.href = "../frontend/login.php";
  }

  // Fetch dashboard stats
  async function loadDashboardStats() {
    try {
      const response = await fetch(`<?php echo $BASE_URL_LOCAL; ?>/dashboard_api.php?token=${encodeURIComponent(dash_token)}&role=${dash_role}`);
      const result = await response.json();

      if (result.status === "success" && result.data) {
        document.getElementById('totalProducts').textContent = result.data.total_products || 0;
        document.getElementById('totalCategories').textContent = result.data.total_categories || 0;
        document.getElementById('totalUsers').textContent = result.data.total_users || 0;
        document.getElementById('totalOrders').textContent = "00"; // Static for now
      } else {
        console.error("Failed to fetch dashboard stats:", result);
      }
    } catch (error) {
      console.error("Error loading stats:", error);
    }
  }

  loadDashboardStats();
</script>