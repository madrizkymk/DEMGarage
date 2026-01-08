<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Server Error - DEMGarage</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="icon" type="image/x-icon" href="{{ asset('asset/favicon.ico') }}">
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center">
  <div class="text-center">
    <div class="mb-8">
      <h1 class="text-9xl font-bold text-red-400">500</h1>
    </div>
    <h2 class="text-3xl font-semibold text-gray-700 mb-4">Server Error</h2>
    <p class="text-gray-500 mb-8 max-w-md mx-auto">
      Something went wrong on our end. Please try again later or contact support if the problem persists.
    </p>
    <div class="space-y-4">
      <a href="{{ route('home') }}"
        class="inline-block bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition-colors">
        Go Home
      </a>
      <br>
      <button onclick="window.location.reload()" class="text-gray-600 hover:text-gray-800 transition-colors">
        Try Again
      </button>
    </div>
  </div>
</body>

</html>
