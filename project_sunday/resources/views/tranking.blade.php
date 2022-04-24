<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>กรอกข้อมูลลูกค้า</title>
  {{-- CSS --}}
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  {{-- Js --}}
  <!-- <script src="./js/charts-lines.js" defer></script>
  <script src="/js/charts-pie.js" defer></script> -->
  <script src="/js/init-alpine.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="icon" type="/img/svg" href="/img/icon.svg">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
 
</head>

<body class="font-prompt">
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                <div class="">
                    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                        SUNDAY FLOWER
                    </a>
                </div>
            </header>
            <!-- Form Order -->
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid ">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 ">
                       
                    </h2>
                    <div class="bg-white dark:bg-gray-800 shadow rounded-md">
                        <div class="w-full m-auto  mt-4">
                                <form  " action="" method="post">
                                    <div class="w-300px m-auto ">
                                        <div class="p-2">
                                            <label
                                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
                                                for="grid-first-name">
                                                tanking
                                            </label>
                                            <input
                                            class="appearance-none block w-full  text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-900"
                                            id="grid-first-name" type="text" placeholder="">
                                         
                                        </div>
                                      
                                    </div>
                                    <div class="w-full h-30px  rounded mb-6  text-center p-1 ">
                                        <button class="w-200px h-30px bg-pink rounded mb-6 text-white">ค้นหา</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 shadow rounded-md">
                        <div class="w-full m-auto  mt-4 mb-5">
                                <form  " action="" method="post">
                                    <div class="w-300px m-auto">
                                        <div class="flex w-auto m-auot"> 
                                            <h3 class="mr-5">สถานะ :</h3><p>กำลังจัดส่ง</p>
                                        </div>
                                        <div class="flex w-auto m-auot"> 
                                            <h3 class="mr-5">ชื่อ :</h3><p>กำลังจัดส่ง</p>
                                        </div>
                                        <div class="flex w-auto m-auot"> 
                                            <h3 class="mr-5">ประเภท :</h3><p>กำลังจัดส่ง</p>
                                        </div>
                                        <div class="flex w-auto m-auot"> 
                                            <h3 class="mr-5">เวลารับรายการ :</h3><p>กำลังจัดส่ง</p>
                                        </div>
                                        <div class="flex w-auto m-auot mt-6"> 
                                            <h3 class="mr-5">ชื่อพนักงานจัดส่ง :</h3><p>กำลังจัดส่ง</p>
                                        </div>
                                        <div class="flex w-auto m-auot"> 
                                            <h3 class="mr-5">เบอร์โทรติดต่อผู้จัดส่ง :</h3><p>กำลังจัดส่ง</p>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        const switchToggle = document.querySelector('#switch-toggle');
        const html = document.querySelector('html');
        let isDarkmode = false
        const localDarkmode = JSON.parse(localStorage.getItem('isDarkmode'))
        const darkIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
</svg>`
        const lightIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
</svg>`
        // Jika ada isDarkmode di localstorage 
        if (localDarkmode) {
            isDarkmode = localDarkmode
            html.classList.add('dark')
        } else {
            html.classList.remove('dark')
        }

        function toggleTheme() {
            isDarkmode = !isDarkmode
            localStorage.setItem('isDarkmode', isDarkmode)
            switchTheme()
        }

        function switchTheme() {
            if (isDarkmode) {
                html.classList.add('dark')
                switchToggle.classList.remove('bg-yellow-500', '-translate-x-2')
                switchToggle.classList.add('bg-gray-700', 'translate-x-full')
                setTimeout(() => {
                    switchToggle.innerHTML = darkIcon
                }, 250);
            } else {
                html.classList.remove('dark')
                switchToggle.classList.add('bg-yellow-500', '-translate-x-2')
                switchToggle.classList.remove('bg-gray-700', 'translate-x-full')
                setTimeout(() => {
                    switchToggle.innerHTML = lightIcon
                }, 250);
            }
        }
        switchTheme()
    </script>
</body>

</html>
