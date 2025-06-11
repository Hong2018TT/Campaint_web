<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{asset('assets/img/logo/Logo Campaint Original.png')}}">

  {{-- Link style Css --}}
  <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
  
  {{-- Icon Google --}}
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=battery_charging_80" />
  <!-- Remixicon CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
  />

  {{-- Link script Loading --}}
  <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/mirage.js"></script>

  @vite(['resources/css/index.css'])

  <title>Cam-aint-test</title>
</head>
<body class="flex justify-center items-center h-screen">
    {{-- This section for reload spinnering --}}
    <div id="spinner" class="spinner-index">
      <l-mirage
        size="90"
        speed="2.5"
        color="#002398"
      ></l-mirage>
    </div>
      <!-- Simple CSS Waves -->
        <div class="layout-box-index">
          <div class="flex justify-center items-center">
              <img src="{{asset('assets/img/logo/Logo Cam-Panit.png')}}" alt="" class="h-56 w-auto">
          </div>

          <form class="max-w-sm mx-auto">
            <div class="mt-8">
              {{-- <label for="email-address-icon" class="block mb-1 text-sm text-green-700 font-bold">Your Email</label> --}}
              <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <i class="ri-mail-fill text-blue-700 text-xl text-shadow-2xs"></i>
                </div>

                {{-- Set components input text --}}
                <input type="email" id="email-address-icon" class="index-input" placeholder="Enter your email.com" required>
              </div>

              {{-- =============== This section checks for authentication --}}
              <p class="mt-2 text-sm text-green-600 text-left sr-only"><span class="font-medium"></span> Email available!</p>
              <p class="text-sm text-red-600 text-left sr-only"><span class="font-medium"></span> Password available!</p>
            </div>

            <div class="mt-6">
              {{-- <label for="email-address-icon" class="block mb-1 text-sm text-green-700 font-bold">Your Passsword</label> --}}
              <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 cursor-pointer">
                  <i class="ri-lock-2-fill text-blue-700 text-xl text-shadow-2xs"></i>
                </div>
                <input type="password" id="password-address-icon" class="index-input" placeholder="Enter your password" required>
              </div>

              {{-- =============== This section checks for authentication --}}
              <p class="mt-1 text-sm text-green-600 text-left sr-only"><span class="font-medium"></span> Password available!</p>
              <p class="text-sm text-red-600 text-left sr-only"><span class="font-medium"></span> Password available!</p>
            </div>

            <div class="flex items-center justify-between mb-3 mt-3">

              <label class="inline-flex items-center">
                <input type="checkbox" class="form-checkbok accent-blue-500 h-3.5 w-3.5">
                <span class="ml-2 text-sm text-blue-900">Remember me</span>
              </label>
              <a href="#" class="text-sm text-blue-900 hover:underline">Forgot password?</a>
            </div>

            {{-- Style button animation --}}
            <button class="w-full cursor-pointer relative flex items-center px-6 py-3 overflow-hidden font-medium transition-all bg-indigo-500 rounded-md group">
              <span class="absolute top-0 right-0 inline-block w-4 h-4 transition-all duration-500 ease-in-out bg-indigo-700 rounded group-hover:-mr-4 group-hover:-mt-4">
                <span class="absolute top-0 right-0 w-5 h-5 rotate-45 translate-x-1/2 -translate-y-1/2 bg-white"></span>
              </span>
              <span class="absolute bottom-0 rotate-180 left-0 inline-block w-4 h-4 transition-all duration-500 ease-in-out bg-indigo-700 rounded group-hover:-ml-4 group-hover:-mb-4">
                <span class="absolute top-0 right-0 w-5 h-5 rotate-45 translate-x-1/2 -translate-y-1/2 bg-white"></span>
              </span>
              <span class="absolute bottom-0 left-0 w-full h-full transition-all duration-500 ease-in-out delay-200 -translate-x-full bg-indigo-600 rounded-md group-hover:translate-x-0"></span>
                <span class="relative w-full text-center text-white transition-colors duration-200 ease-in-out group-hover:text-white font-bold">Login</span>
            </button>
          </form>
        </div>

      <!-- SVG Waves -->
      <div class="fixed w-screen bottom-0">
        <svg
          class="back-animation relative w-full h-[20vh] min-h-[300px] max-h-[150px] -mb-[7px]"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 24 150 28"
          preserveAspectRatio="none"
          shape-rendering="auto"
        >
          <defs>
            <path
              id="gentle-wave"
              d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"
            />
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
  <script src="{{asset('assets/js/spinner_index.js')}}"></script>
</body>
</html>