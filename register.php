<?php include 'connection/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
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
    .toggle-btn {
      position: absolute;
      right: 10px;
      top: 65%;
      transform: translateY(-50%);
      cursor: pointer;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">
  <div class="overlay absolute inset-0"></div>
  <div class="relative z-10 w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Create an Account</h2>
    <form id="registerForm" class="space-y-5">
      <!-- Username -->
      <div>
        <label for="user_name" class="block text-gray-600 font-medium mb-2">Email</label>
        <input type="email" id="user_name" name="user_name" placeholder="you@example.com"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
      </div>

      <!-- Password -->
      <div class="relative">
        <label for="password" class="block text-gray-600 font-medium mb-2">Password</label>
        <input type="password" id="password" name="password" placeholder="••••••••"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10" required>
        <span class="toggle-btn text-gray-600" onclick="togglePassword('password', this)">•‿•</span>
      </div>

      <!-- Confirm Password -->
      <div class="relative">
        <label for="confirm_password" class="block text-gray-600 font-medium mb-2">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="••••••••"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10" required>
        <span class="toggle-btn text-gray-600" onclick="togglePassword('confirm_password', this)">•‿•</span>
      </div>

      <!-- Submit button -->
      <button type="submit"
        class="w-full bg-orange-400 text-white py-2 rounded-lg font-semibold hover:bg-orange-600 transition duration-200">
        Register
      </button>
    </form>

    <!-- Message -->
    <div id="message" class="mt-4 text-center text-sm"></div>

    <!-- Link to Login -->
    <div class="mt-6 text-center text-gray-500 text-sm">
      Already have an account?
      <a href="login.php" class="text-blue-600 hover:underline">Login</a>
    </div>
  </div>

  <script>
    // Toggle password visibility
    function togglePassword(fieldId, icon) {
      const input = document.getElementById(fieldId);
      if (input.type === "password") {
        input.type = "text";
        icon.textContent = "•‿•";
      } else {
        input.type = "password";
        icon.textContent = "~_~";
      }
    }

    document.getElementById('registerForm').addEventListener('submit', async (e) => {
      e.preventDefault();
      const user_name = document.getElementById('user_name').value.trim();
      const password = document.getElementById('password').value;
      const confirm_password = document.getElementById('confirm_password').value;
      const messageDiv = document.getElementById('message');

      // Email validation
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(user_name)) {
        messageDiv.textContent = "Please enter a valid email address.";
        messageDiv.className = "mt-4 text-center text-red-600 text-sm";
        return;
      }

      // Password match validation
      if (password !== confirm_password) {
        messageDiv.textContent = "Passwords do not match.";
        messageDiv.className = "mt-4 text-center text-red-600 text-sm";
        return;
      }

      try {
        const response = await fetch(`<?php echo $BASE_URL_LOCAL; ?>/users/register_user.php`, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ user_name, password })
        });

        const data = await response.json();

        if (data.success) {
          // Store token
          localStorage.setItem('auth_token', data.data.token);
          localStorage.setItem('user_role', data.data.role);
          localStorage.setItem('user_name', data.data.user_name);

          messageDiv.textContent = "Registration successful! Redirecting...";
          messageDiv.className = "mt-4 text-center text-green-600 text-sm";

          setTimeout(() => {
            if (data.data.role === 'admin') {
              window.location.href = "backend/admin_index.php";
            } else {
              window.location.href = "index.php";
            }
          }, 1000);
        } else {
          messageDiv.textContent = data.message || "Registration failed.";
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
