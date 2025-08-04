<script>
  // Check if token and role are present in localStorage
  const token = localStorage.getItem('auth_token');
  const role = localStorage.getItem('user_role');

  if (!token || role !== 'admin') {
    // If no token or role is not admin, redirect to login page
    window.location.href = "../login.php";
  }
</script>

<!DOCTYPE html>
<html lang="en">
<?php include '../connection/config.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Johar Traders - Admin Panel</title>
    <link rel="icon" href="../Johar_traders_uploads/logo/5N9MOS9NAN-20190102-073826.png">
    <link rel="apple-touch-icon" href="../Johar_traders_uploads/logo/5N9MOS9NAN-20190102-073826.png">
    <!-- <script src="../connection/auth_check.js"></script> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .sidebar-item:hover {
            background-color: #f97316;
            color: white;
        }
        
        .sidebar-item.active {
            background-color: #ea580c;
            color: white;
        }
        
        .content-section {
            display: none;
        }
        
        .content-section.active {
            display: block;
        }
        
        .stats-card {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
        }
        
        .table-row:hover {
            background-color: #f9fafb;
        }
        
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }
        
        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Top Header -->
    <div class="bg-white shadow-md">
        <div class="flex justify-between items-center px-6 py-4">
            <!-- Logo -->
            <div class="flex items-center gap-4">
            <div class="flex items-center justify-center w-full">
                <img src="../Johar_traders_uploads/logo/KLMIP2NATC-20190102-073826.png" 
                alt="Company Logo" 
                class="w-full max-w-[300px] md:max-w-[400px] h-auto object-contain">
            </div>
            </div>

            <!-- User Area -->
            <div class="flex items-center gap-4">
            <div class="relative">
                <button class="flex items-center gap-2 bg-gray-100 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors">
                <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-white text-sm font-bold">
                    <img src="../Johar_traders_uploads/logo/5N9MOS9NAN-20190102-073826.png" alt="User Logo" 
                    class="w-full max-w-[20px] md:max-w-[40px] h-auto object-contain">
                </div>
                <span id="adminUserName" class="text-gray-700">Admin User</span>
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                </button>
            </div>
            <button id="logoutBtn" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors">
                Logout
            </button>
            </div>
        </div>
    </div>

