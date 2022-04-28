<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>หนัาหลัก</title>
    <link rel="icon" type="/img/svg" href="/img/icon.svg">
    {{-- CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- Js --}}
    <script src="/js/popup-ouput.js"></script>
    <script src="/js/init-alpine.js"></script>

    <link rel="icon" type="/img/svg" href="/img/icon.svg" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
  </head>
  <body class="font-prompt">
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800" >
        <div class="flex flex-col overflow-y-auto md:flex-row  ">
          <div class="h-32 md:h-auto md:w-1/2 bg-pink  " >
            <div class=" text-center p-10 mt-6" >
              <img class="m-auto w-200px  md:block hidden"  src="/img/logo.png" alt="">
              <h1 class="w-300px mt-6  text-3xl text-white m-auto md:block hidden">CHIAN MAI SUNDAY FLOWER</h1>
            </div>
          </div>
          <div class="flex items-center justify-center p-1 sm:p-12 md:w-1/2">
            <form action="{{ route('login') }}" method="POST">
              @csrf

              <div class="w-300px">
                <h1
                  class="mb-4 text-4xl font-semibold text-gray-700 dark:text-gray-200"
                >
                  เข้าสู่ระบบ
                </h1>
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">เลขผู้ใช้</span>
                  <input
                    class="block w-full mt-1 p-2 text-sm border-2 rounded-lg h-9 border-pink focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Jane Doe"
                    name="IDuser"
                    required autofocus
                  />
                </label>
                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">รหัสผ่าน</span>
                  <input
                    class="block w-full mt-1 p-2 text-sm border-2 rounded-lg border-pink h-9 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="***************"
                    type="password"
                    name="password"
                    required autocomplete="current-password"
                  />
                </label>
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <!-- You should use a button here, as the anchor is only used for the example  -->
                <button
                  class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-pink border border-transparent rounded-lg active:bg-fuchsia-500 hover:bg-fuchsia-500 focus:outline-none focus:shadow-outline-purple"
                >
                เข้าสู่ระบบ
                </button>
                <hr class="my-8" />
                <p class="mt-4 mb-4">
                  <a
                    class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                    href="{{ route('password.request') }}"
                  >
                    ลืมรหัสผ่าน?
                  </a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
