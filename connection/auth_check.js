
  // Check if token and role are present in localStorage
  const token = localStorage.getItem('auth_token');
  const role = localStorage.getItem('user_role');

  if (!token || role !== 'admin') {
    // If no token or role is not admin, redirect to login page
    window.location.href = "../frontend/login.php";
  }

