<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('assets/img/logo/favicon.ico') }}" type="image/x-icon">

  @vite(['resources/css/index.css'])
  <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  
  <title>Cam-aint-test</title>
</head>
<body class="flex justify-center items-center h-screen">
  <div id="spinner" class="spinner-index">
    <l-mirage size="100" speed="2.5" color="#002398"></l-mirage>
  </div>

  <div class="layout-box-index">
    <div class="flex justify-center items-center">
      <img src="{{ asset('assets/img/logo/Logo Cam-Panit.png') }}" alt="CamPaint Logo" class="h-60 w-auto" loading="lazy">
    </div>

<form class="max-w-sm mx-auto" id="form-login" action="{{ route('login.submit') }}" method="POST">
  @csrf

  {{-- EMAIL --}}
  <div class="mt-8">
    <div class="relative">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        <i class="ri-mail-fill"></i>
      </div>
      <input 
        type="email" 
        name="email" 
        class="index-input @error('email') border-red-500 @enderror" 
        placeholder="Enter your email.com" 
        value="{{ old('email') }}" 
        required
      >
    </div>
    @error('email')
      <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
    <p id="email-error" class="text-sm text-red-600 mt-1 hidden"></p>
  </div>

  {{-- PASSWORD --}}
  <div class="mt-6">
    <div class="relative">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 cursor-pointer">
        <i class="ri-lock-2-fill"></i>
      </div>
      <input 
        type="password" 
        name="password" 
        id="password" 
        class="index-input @error('password') border-red-500 @enderror" 
        placeholder="Enter your password" 
        required
      >
      <button type="button" id="togglePassword" class="absolute right-3 top-2.5 text-sm text-blue-900">Show</button>
    </div>
    @error('password')
      <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
    <p id="password-error" class="text-sm text-red-600 mt-1 hidden"></p>
  </div>

  {{-- REMEMBER + FORGOT --}}
  <div class="flex items-center justify-between mb-3 mt-3">
    <label class="inline-flex items-center">
      <input type="checkbox" name="remember" class="form-checkbok accent-blue-500 h-3.5 w-3.5">
      <span class="ml-2 text-sm text-blue-900">Remember me</span>
    </label>
    <a href="{{ route('password.request') }}" class="text-sm text-blue-900 hover:underline">Forgot password?</a>
  </div>

  {{-- LOGIN BUTTON --}}
  <button type="submit" id="btn-login" class="w-full relative flex items-center px-6 py-3 overflow-hidden font-medium transition-all bg-indigo-600 rounded-md group">
    <span class="absolute top-0 right-0 inline-block w-4 h-4 transition-all duration-500 ease-in-out bg-indigo-800 rounded group-hover:-mr-4 group-hover:-mt-4">
      <span class="absolute top-0 right-0 w-5 h-5 rotate-45 translate-x-1/2 -translate-y-1/2 bg-white"></span>
    </span>
    <span class="absolute bottom-0 rotate-180 left-0 inline-block w-4 h-4 transition-all duration-500 ease-in-out bg-indigo-800 rounded group-hover:-ml-4 group-hover:-mb-4">
      <span class="absolute top-0 right-0 w-5 h-5 rotate-45 translate-x-1/2 -translate-y-1/2 bg-white"></span>
    </span>
    <span class="absolute bottom-0 left-0 w-full h-full transition-all duration-500 ease-in-out delay-200 -translate-x-full bg-indigo-700 rounded-md group-hover:translate-x-0"></span>
    <span class="relative w-full text-center text-white font-bold">Login</span>
  </button>

  @if(session('error'))
    <p id="login-error" class="text-sm text-red-600 mt-3 text-center font-semibold">{{ session('error') }}</p>
  @endif
</form>



  </div>

  <!-- SVG WAVES -->
  <div class="fixed w-screen bottom-0">
    <svg class="back-animation relative w-full h-[20vh] min-h-[300px] max-h-[150px] -mb-[7px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
      <defs>
        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
      </defs>
      <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="#ED1C24" />
        <use xlink:href="#gentle-wave" x="48" y="3" fill="#002D72" />
        <use xlink:href="#gentle-wave" x="48" y="5" fill="#009444" />
        <use xlink:href="#gentle-wave" x="48" y="7" fill="#FFD200" />
      </g>
    </svg>
  </div>

  <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/mirage.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      setTimeout(function () {
        const el = document.getElementById('spinner');
        if (el) el.classList.add('hide');
      }, 200);
    });
  </script>

  <script>
  // Toggle password visibility
  document.getElementById('togglePassword').addEventListener('click', function () {
    const password = document.getElementById('password');
    if (password.type === 'password') {
      password.type = 'text';
      this.textContent = 'Hide';
    } else {
      password.type = 'password';
      this.textContent = 'Show';
    }
  });

  // Handle AJAX login
  document.getElementById('form-login').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const btnLogin = document.getElementById('btn-login');
    btnLogin.disabled = true;

    fetch("{{ route('login.submit') }}", {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json',
      },
      body: formData
    })
    .then(response => {
      if (!response.ok) return response.json().then(err => Promise.reject(err));
      return response.json();
    })
    .then(data => {
      if (data.success) {
        window.location.href = "{{ route('admin.dashboard.home') }}";
      }
    })
    .catch(error => {
      document.getElementById('email-error').textContent = error.errors?.email ?? '';
      document.getElementById('password-error').textContent = error.errors?.password ?? '';
      document.getElementById('email-error').classList.toggle('hidden', !error.errors?.email);
      document.getElementById('password-error').classList.toggle('hidden', !error.errors?.password);
      document.getElementById('login-error').textContent = error.message ?? 'Login failed.';
      document.getElementById('login-error').classList.remove('hidden');
    })
    .finally(() => {
      btnLogin.disabled = false;
    });
  });
</script>


</body>
</html>