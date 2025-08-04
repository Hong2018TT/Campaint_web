<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- Link set Logo tabs website --}}
  <link rel="icon" href="{{asset('assets/img/logo/favicon.ico')}}" type="image/x-icon">
  @vite(['resources/css/index.css'])
  {{-- Link style Css --}}
  <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
  <!-- Remixicon CSS -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  
  <title>Campaint</title>
</head>
<body class="flex justify-center items-center h-screen">
  {{-- This section for reload spinnering --}}
  <div id="spinner" class="spinner-index">
    <l-mirage 
      size="100"
      speed="2.5" 
      color="#002398"
    ></l-mirage>
  </div>

  <!-- Simple CSS Waves -->
  <div class="layout-box-index">
    <div class="flex justify-center items-center mb-2">
      <img src="{{asset('assets/img/logo/Logo Cam-Panit.png')}}" alt="" class="h-60 w-auto" loading="lazy">
    </div>
    {{-- Success/Error Messages --}}
    @if (session()->has('success'))
        <div class="rounded-md bg-green-100 border border-green-400 text-green-700 px-2 py-1 my-2">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="rounded-md bg-red-100 border border-red-400 text-red-700 px-2 py-1 my-2">
            {{ session('error') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold mb-6 text-center">Forgot Your Password?</h2>
    <p class="text-gray-600 text-center mb-6">Enter your email address below and we'll send you a link to reset your password.</p>

    <form class="max-w-sm mx-auto" id="form-login" action="" method="POST">

      <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
          <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

          @error('email')
              <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
          @enderror
      </div>

      <div class="flex items-center justify-between">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
              Send Password Reset Link
          </button>
      </div>

      {{-- Style button animation --}}
      <button type="submit" class="w-full cursor-pointer relative flex items-center px-6 py-3 overflow-hidden font-medium transition-all bg-indigo-600 rounded-md group">
        <span class="absolute top-0 right-0 inline-block w-4 h-4 transition-all duration-500 ease-in-out bg-indigo-800 rounded group-hover:-mr-4 group-hover:-mt-4">
          <span class="absolute top-0 right-0 w-5 h-5 rotate-45 translate-x-1/2 -translate-y-1/2 bg-white"></span>
        </span>
        <span class="absolute bottom-0 rotate-180 left-0 inline-block w-4 h-4 transition-all duration-500 ease-in-out bg-indigo-800 rounded group-hover:-ml-4 group-hover:-mb-4">
          <span class="absolute top-0 right-0 w-5 h-5 rotate-45 translate-x-1/2 -translate-y-1/2 bg-white"></span>
        </span>
        <span class="absolute bottom-0 left-0 w-full h-full transition-all duration-500 ease-in-out delay-200 -translate-x-full bg-indigo-700 rounded-md group-hover:translate-x-0"></span>
        <span class="relative w-full text-center text-white transition-colors duration-200 ease-in-out group-hover:text-white font-bold">Login</span>
      </button>
    </form>
  </div>
  
  <!-- SVG Waves -->
  <div class="fixed w-screen bottom-0">
    <svg
    class="back-animation relative w-full h-[20vh] min-h-[300px] max-h-[150px] -mb-[7px]"
    xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto"
    >
      <defs>
        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
      </defs>
      <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="#ED1C24" />    <!-- Red -->
        <use xlink:href="#gentle-wave" x="48" y="3" fill="#002D72" />    <!-- Navy Blue -->
        <use xlink:href="#gentle-wave" x="48" y="5" fill="#009444" />    <!-- Green -->
        <use xlink:href="#gentle-wave" x="48" y="7" fill="#FFD200" />    <!-- Yellow -->
      </g>
    </svg>
  </div>

  <!-- Content -->
  <div class="relative  h-[0vh] flex items-center justify-center">
    <!-- By. Goodkatz | Free to use -->
    <p class="text-gray-700 text-sm tracking-wide"></p>
  </div>

  {{-- Link script Loading --}}
  <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/mirage.js"></script>
  <script>
    // Function to show the spinner on page load
    document.addEventListener("DOMContentLoaded", function () {
      const spinner = function () {
          setTimeout(function () {
            const el = document.getElementById('spinner');
            if (el) {
              el.classList.add('hide');
            }
          }, 200);
        };
      spinner();

      // The function to initialize the password toggle functionality
      function initializePasswordToggle() {
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        // Check if both elements exist on the page
        if (togglePassword && passwordInput) {
          togglePassword.addEventListener('click', function () {
            // Toggle the input type between 'password' and 'text'
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Change the icon class to reflect the state
            this.classList.toggle('ri-eye-fill');
            this.classList.toggle('ri-eye-off-fill');
          });
        }
      }
      initializePasswordToggle();
    });
  </script>
</body>
</html>