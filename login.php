<?php include 'connection/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
    <link rel="icon" href="Johar_traders_uploads/logo/5N9MOS9NAN-20190102-073826.png">
    <link rel="apple-touch-icon" href="Johar_traders_uploads/logo/5N9MOS9NAN-20190102-073826.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: url('Johar_traders_uploads/banner/PUC7IGNK95-20210522-065001.jpg') no-repeat center center/cover;
    }
    .overlay {
      background: rgba(0, 0, 0, 0.6);
      backdrop-filter: blur(6px);
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">
  <div class="overlay absolute inset-0"></div>
  <div class="relative z-10 w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login to Your Account</h2>
    <form id="loginForm" class="space-y-5">
      <!-- Username -->
      <div>
        <label for="user_name" class="block text-gray-600 font-medium mb-2">Username</label>
        <input type="text" id="user_name" name="user_name" placeholder="john_doe"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-gray-600 font-medium mb-2">Password</label>
        <input type="password" id="password" name="password" placeholder="••••••••"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      </div>

      <!-- Submit button -->
      <button type="submit"
        class="w-full bg-orange-500 text-white py-2 rounded-lg font-semibold hover:bg-orange-700 transition duration-200">
        Login
      </button>
    </form>

    <!-- Divider -->
    <div class="mt-6 text-center text-gray-500 text-sm">
        Don’t have an account?
        <a href="register.php" class="text-blue-600 hover:underline">Sign up</a>
    </div>

    <!-- Message -->
    <div id="message" class="mt-4 text-center text-sm"></div>
  </div>

  <script>

    document.getElementById('loginForm').addEventListener('submit', async (e) => {
      e.preventDefault();

      const user_name = document.getElementById('user_name').value;
      const password = document.getElementById('password').value;
      const messageDiv = document.getElementById('message');

      try {
        const response = await fetch(`<?php echo $BASE_URL_LOCAL; ?>/users/login_user.php`, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ user_name, password })
        });

        const data = await response.json();

        if (data.success) {
          localStorage.setItem('auth_token', data.data.token);
          localStorage.setItem('user_role', data.data.role);
          localStorage.setItem('user_name', data.data.name);
          localStorage.setItem('user_email', data.data.email);

          messageDiv.textContent = "Login successful! Redirecting...";
          messageDiv.className = "mt-4 text-center text-green-600 text-sm";

          setTimeout(() => {
            if (data.data.role === 'admin') {
              window.location.href = "backend/admin_index.php";
            } else {
              window.location.href = "index.php";
            }
          }, 1000);
        } else {
          messageDiv.textContent = data.message || "Login failed.";
          messageDiv.className = "mt-4 text-center text-red-600 text-sm";
        }
      } catch (error) {
        messageDiv.textContent = "Error: Unable to connect to server.";
        messageDiv.className = "mt-4 text-center text-red-600 text-sm";
        console.error(error);
      }
    });
  </script>
</body>
</html>
