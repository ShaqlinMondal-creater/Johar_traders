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

