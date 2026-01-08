<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page Not Found - DEMGarage</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="icon" type="image/x-icon" href="{{ asset('asset/favicon.ico') }}">
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center">
  <div class="text-center">
    <div class="mb-8">
      <h1 class="text-9xl font-bold text-gray-400">404</h1>
    </div>
    <h2 class="text-3xl font-semibold text-gray-700 mb-4">Page Not Found</h2>
    <p class="text-gray-500 mb-8 max-w-md mx-auto">
      Sorry, the page you are looking for doesn't exist or has been moved.
    </p>
    <div class="space-y-4">
      <a href="{{ route('home') }}"
        class="inline-block bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition-colors">
        Go Home
      </a>
      <br>
      <a href="javascript:history.back()" class="text-gray-600 hover:text-gray-800 transition-colors">
        ← Go Back
      </a>
    </div>
  </div>
</body>

</html>
