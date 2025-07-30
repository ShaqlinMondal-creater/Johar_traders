<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Johar Traders</title>
    <link rel="icon" href="Johar_traders_uploads/logo/5N9MOS9NAN-20190102-073826.png">
    <link rel="apple-touch-icon" href="Johar_traders_uploads/logo/5N9MOS9NAN-20190102-073826.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    .floating {
      animation: float 3s ease-in-out infinite;
    }

    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.4; }
    }

    .blink {
      animation: blink 1.5s infinite;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-orange-400 to-orange-200 min-h-screen flex items-center justify-center text-white text-center px-4">

  <div class="max-w-xl w-full space-y-8">
    <!-- Logo -->
    <div class="w-124 h-48 mx-auto floating">
      <img src="Johar_traders_uploads/logo/KLMIP2NATC-20190102-073826.png" alt="Company Logo" class="w-full h-full object-contain" />
    </div>

    <!-- Heading -->
    <h1 class="text-4xl md:text-5xl font-bold tracking-tight animate-pulse">
      We're Coming Soon
    </h1>

    <!-- Message -->
    <p class="text-lg text-blue-400">
      Our website is under construction. We'll be here soon with a brand new experience.
    </p>

    <!-- Blinking text -->
    <p class="blink text-m mt-4 text-blue-900">Launching shortly... stay tuned!</p>
    <br><br>
    <a href="index.php" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-6 py-2 mt-4 rounded-lg text-xs md:text-lg transition-colors">Go Home</a>
    <!-- Optional: Cloud Animations -->
    <div class="absolute top-10 left-10 opacity-30 animate-pulse">
      <svg class="w-32 h-32 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
          d="M3 15a4 4 0 014-4h1a5 5 0 019.9-1.5A4.5 4.5 0 0121 14a4.5 4.5 0 01-4.5 4.5H7a4 4 0 01-4-3.5z" />
      </svg>
    </div>
  </div>
</body>
</html>
