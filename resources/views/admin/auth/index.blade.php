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
        <div class="flex items-center px-2 py-2 my-2 text-sm text-green-800 rounded-sm bg-green-100 border-2 border-green-400" role="alert">
          <svg class="flex-shrink-0 inline w-5 h-5 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
          </svg>
          <span class="sr-only">Info</span>
          <div>
            {{ session('success') }}
          </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="flex items-center px-2 py-2 my-2 text-sm text-red-800 rounded-lg bg-red-100 border-2 border-red-400" role="alert">
          <svg class="flex-shrink-0 inline w-5 h-5 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
          </svg>
          <span class="sr-only">Info</span>
          <div>
            {{ session('error') }}
          </div>
        </div>
    @endif

    <form class="max-w-sm mx-auto" id="form-login" action="{{ route('savelogin') }}" method="POST">
      @csrf
      
      <div class="mt-4">
        @error('email')
          <div class="rounded-md bg-red-100 text-sm border-2 border-red-400 text-red-700 px-2 py-1 my-2">
            {{ $message }}
          </div>
        @enderror
        <div class="relative shadow-md">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <i class="ri-mail-fill"></i>
          </div>
          {{-- Set components input text --}}
          <input type="email" id="email" name="email" class="index-input" placeholder="Enter your email.com" required value="{{old('email', Cookie::get('email'))?? '' }}" >
        </div>
        
        {{-- =============== This section checks for authentication --}}
        <p class="mt-2 text-sm text-green-600 text-left sr-only"><span class="font-medium"></span> Email available!</p>
        <p class="text-sm text-red-600 text-left sr-only"><span class="font-medium"></span> Password available!</p>
      </div>
      
      <div class="mt-4">
        @error('password')
          <div class="rounded-md bg-red-100 text-sm border-2 border-red-400 text-red-700 px-2 py-1 my-2">
              {{ $message }}
          </div>
        @enderror

        <div class="relative shadow-md">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3">
              <i class="ri-lock-2-fill"></i>
          </div>
          <input type="password" id="password" name="password" class="index-input" placeholder="Enter your password" required value="{{old('password', Cookie::get('password'))?? '' }}" >
          
          <div class="absolute inset-y-0 end-0 flex items-center pe-3 cursor-pointer">
              <i id="togglePassword" class="ri-eye-off-fill text-blue-900"></i>
          </div>
        </div>
        
        {{-- =============== This section checks for authentication --}}
        <p class="mt-1 text-sm text-green-600 text-left sr-only"><span class="font-medium"></span> Password available!</p>
        <p class="text-sm text-red-600 text-left sr-only"><span class="font-medium"></span> Password available!</p>
      </div>
      
      <div class="flex items-center justify-between mb-3 mt-3">
        <label class="inline-flex items-center">
          <input type="checkbox" id="remember" name="remember" class="form-checkbok accent-blue-500 h-3.5 w-3.5" {{ old('remember') || Cookie::get('email') ? 'checked' : '' }}>
          <span class="ml-2 text-sm text-blue-900">Remember me</span>
        </label>
        <a href="" class="text-sm text-blue-900 hover:underline">Forgot password?</a>
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