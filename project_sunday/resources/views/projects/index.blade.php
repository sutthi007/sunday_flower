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
    <script src="/js/init-alpine.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>

</head>

<body class="font-prompt">
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->

        <!-- for owner -->
        @can('owner')
            <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
                <div class="py-4 text-gray-500 dark:text-gray-400">
                    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                        SUNDAY FLOWER
                    </a>
                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                                aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                                href="{{ route('projects.index') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                <span class="ml-4">หนัาหลัก</span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('FormOrder.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="ml-4">เพิ่มออเดอร์</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('Profile.index') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="ml-4">โปรไฟล์</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                @click="togglePagesMenu" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                    </svg>
                                    <span class="ml-4">เพิ่มเส้นทางขนส่ง</span>
                                </span>
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isPagesMenuOpen">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800  dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('transport.index') }}">จังหวัด</a>
                                    </li>
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('city.index') }}">
                                            อำเภอ
                                        </a>
                                    </li>
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('provinceTo.index') }}">
                                            จังหวัดส่งต่อ
                                        </a>
                                    </li>

                                </ul>
                            </template>
                        </li>
                        <li class="relative px-6 py-3">
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                @click="togglePagesMenuss" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                    <span class="ml-4">ข้อมูลลูกค้า</span>
                                </span>

                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isPagesMenuOpenss">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('customer.index') }}">เพิ่มข้อมูลลูกค้า</a>
                                    </li>
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('customer-systems.index') }}">
                                            ประวัติลูกค้า
                                        </a>
                                    </li>
                                    <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="/CustomerView-overdue">
                                        ลูกค้าค้างชำระ
                                    </a>
                                </li>
                                </ul>
                            </template>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('Employee.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span class="ml-4">ข้อมูลพนักงาน</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('service.index') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-align-center">
                                    <line x1="18" y1="10" x2="6" y2="10"></line>
                                    <line x1="21" y1="6" x2="3" y2="6"></line>
                                    <line x1="21" y1="14" x2="3" y2="14"></line>
                                    <line x1="18" y1="18" x2="6" y2="18"></line>
                                </svg>
                                <span class="ml-4">อัตราค่าบริการ</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="/expenses">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-4">รายการใช่จ่าย</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                @click="togglePagesMenus" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                    </svg>
                                    <span class="ml-4">สรุป</span>
                                </span>

                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isPagesMenuOpens">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('sumAccount') }}">สรุปรายงานบัญชี</a>
                                    </li>
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('sumTransport') }}">
                                            สรุปรายงานขนส่ง
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>
                </div>
            </aside>
        @endcan
        <!-- for admin  -->
        @can('admin')
            <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
                <div class="py-4 text-gray-500 dark:text-gray-400">
                    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                        SUNDAY FLOWER
                    </a>
                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                                aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                                href="{{ route('projects.index') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                <span class="ml-4">หนัาหลัก</span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('FormOrder.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="ml-4">เพิ่มออเดอร์</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('Profile.index') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="ml-4">โปรไฟล์</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                @click="togglePagesMenu" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                    </svg>
                                    <span class="ml-4">เพิ่มเส้นทางขนส่ง</span>
                                </span>
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isPagesMenuOpen">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800  dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('transport.index') }}">จังหวัด</a>
                                    </li>
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('city.index') }}">
                                            อำเภอ
                                        </a>
                                    </li>
                                    <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="{{ route('provinceTo.index') }}">
                                        จังหวัดส่งต่อ
                                    </a>
                                </li>
                                </ul>
                            </template>
                        </li>
                        <li class="relative px-6 py-3">
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                @click="togglePagesMenuss" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                    <span class="ml-4">ข้อมูลลูกค้า</span>
                                </span>

                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isPagesMenuOpenss">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('customer.index') }}">เพิ่มข้อมูลลูกค้า</a>
                                    </li>
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('customer-systems.index') }}">
                                            ประวัติลูกค้า
                                        </a>
                                    </li>
                                    <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="/CustomerView-overdue">
                                        ลูกค้าค้างชำระ
                                    </a>
                                </li>
                                </ul>
                            </template>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('Employee.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span class="ml-4">ข้อมูลพนักงาน</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('service.index') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-align-center">
                                    <line x1="18" y1="10" x2="6" y2="10"></line>
                                    <line x1="21" y1="6" x2="3" y2="6"></line>
                                    <line x1="21" y1="14" x2="3" y2="14"></line>
                                    <line x1="18" y1="18" x2="6" y2="18"></line>
                                </svg>
                                <span class="ml-4">อัตราค่าบริการ</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="/expenses">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-4">รายการใช่จ่าย</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                @click="togglePagesMenus" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                    </svg>
                                    <span class="ml-4">สรุป</span>
                                </span>

                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isPagesMenuOpens">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('sumAccount') }}">สรุปรายงานบัญชี</a>
                                    </li>
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('sumTransport') }}">
                                            สรุปรายงานขนส่ง
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>
                </div>
            </aside>
        @endcan
        <!-- for empolyee -->
        @can('employee')
            <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
                <div class="py-4 text-gray-500 dark:text-gray-400">
                    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                        SUNDAY FLOWER
                    </a>
                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                                aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                                href="{{ route('projects.index') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                <span class="ml-4">หนัาหลัก</span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('Profile.index') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="ml-4">โปรไฟล์</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('customer.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="ml-4">เพิ่มข้อมูลลูกค้า</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                @click="togglePagesMenus" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                    </svg>
                                    <span class="ml-4">สรุป</span>
                                </span>

                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isPagesMenuOpens">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('sumTransport') }}">
                                            สรุปรายงานขนส่ง
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>
                </div>
            </aside>
        @endcan
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        </div>
        <aside
            class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
            x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
            @keydown.escape="closeSideMenu">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                    SUNDAY FLOWER
                </a>
                @can('admin')
                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                                aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                                href="{{ route('projects.index') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                <span class="ml-4">หนัาหลัก</span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('FormOrder.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="ml-4">เพิ่มออเดอร์</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('Profile.index') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                    </path>
                                </svg>
                                <span class="ml-4">โปรไฟล์</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                @click="togglePagesMenu" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                    </svg>
                                    <span class="ml-4">เพิ่มเส้นทางขนส่ง</span>
                                </span>
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isPagesMenuOpen">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800  dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('transport.index') }}">จังหวัด</a>
                                    </li>
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('city.index') }}">
                                            อำเภอ
                                        </a>
                                    </li>
                                    <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="{{ route('provinceTo.index') }}">
                                        จังหวัดส่งต่อ
                                    </a>
                                </li>
                                </ul>
                            </template>
                        </li>
                        <li class="relative px-6 py-3">
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                @click="togglePagesMenuss" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                    <span class="ml-4">ข้อมูลลูกค้า</span>
                                </span>

                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isPagesMenuOpenss">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('customer.index') }}">เพิ่มข้อมูลลูกค้า</a>
                                    </li>
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('customer-systems.index') }}">
                                            ประวัติลูกค้า
                                        </a>
                                    </li>
                                    <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="/CustomerView-overdue">
                                        ลูกค้าค้างชำระ
                                    </a>
                                </li>
                                </ul>
                            </template>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('Employee.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span class="ml-4">ข้อมูลพนักงาน</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('service.index') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-align-center">
                                    <line x1="18" y1="10" x2="6" y2="10"></line>
                                    <line x1="21" y1="6" x2="3" y2="6"></line>
                                    <line x1="21" y1="14" x2="3" y2="14"></line>
                                    <line x1="18" y1="18" x2="6" y2="18"></line>
                                </svg>
                                <span class="ml-4">อัตราค่าบริการ</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="/expenses">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-4">รายการใช่จ่าย</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                @click="togglePagesMenus" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                    </svg>
                                    <span class="ml-4">สรุป</span>
                                </span>

                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isPagesMenuOpens">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('sumAccount') }}">สรุปรายงานบัญชี</a>
                                    </li>
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('sumTransport') }}">
                                            สรุปรายงานขนส่ง
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>
                @endcan
                {{-- owner --}}
                @can('owner')
                    <ul class="mt-6">
                        <li class="relative px-6 py-3">
                            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                                aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                                href="{{ route('projects.index') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                <span class="ml-4">หนัาหลัก</span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('FormOrder.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="ml-4">เพิ่มออเดอร์</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('Profile.index') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="ml-4">โปรไฟล์</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                @click="togglePagesMenu" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                    </svg>
                                    <span class="ml-4">เพิ่มเส้นทางขนส่ง</span>
                                </span>
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isPagesMenuOpen">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800  dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('transport.index') }}">จังหวัด</a>
                                    </li>
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('city.index') }}">
                                            อำเภอ
                                        </a>
                                    </li>
                                    <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="{{ route('provinceTo.index') }}">
                                        จังหวัดส่งต่อ
                                    </a>
                                </li>
                                </ul>
                            </template>
                        </li>
                        <li class="relative px-6 py-3">
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                @click="togglePagesMenuss" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                    <span class="ml-4">ข้อมูลลูกค้า</span>
                                </span>

                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isPagesMenuOpenss">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('customer.index') }}">เพิ่มข้อมูลลูกค้า</a>
                                    </li>
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('customer-systems.index') }}">
                                            ประวัติลูกค้า
                                        </a>
                                    </li>
                                    <li
                                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                    <a class="w-full" href="/CustomerView-overdue">
                                        ลูกค้าค้างชำระ
                                    </a>
                                </li>
                                </ul>
                            </template>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('Employee.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span class="ml-4">ข้อมูลพนักงาน</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('service.index') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-align-center">
                                    <line x1="18" y1="10" x2="6" y2="10"></line>
                                    <line x1="21" y1="6" x2="3" y2="6"></line>
                                    <line x1="21" y1="14" x2="3" y2="14"></line>
                                    <line x1="18" y1="18" x2="6" y2="18"></line>
                                </svg>
                                <span class="ml-4">อัตราค่าบริการ</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                href="{{ route('expenses.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-4">รายการใช่จ่าย</span>
                            </a>
                        </li>
                        <li class="relative px-6 py-3">
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                @click="togglePagesMenus" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                    </svg>
                                    <span class="ml-4">สรุป</span>
                                </span>

                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isPagesMenuOpens">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('sumAccount') }}">สรุปรายงานบัญชี</a>
                                    </li>
                                    <li
                                        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                        <a class="w-full" href="{{ route('sumTransport') }}">
                                            สรุปรายงานขนส่ง
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    @endcan
                    {{-- employee --}}
                    @can('employee')
                        <ul class="mt-6">
                            <li class="relative px-6 py-3">
                                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                                    aria-hidden="true"></span>
                                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                                    href="{{ route('projects.index') }}">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                        </path>
                                    </svg>
                                    <span class="ml-4">หน้าหลัก</span>
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li class="relative px-6 py-3">
                                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                    href="{{ route('Profile.index') }}">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    <span class="ml-4">โปรไฟล์</span>
                                </a>
                            </li>
                            <li class="relative px-6 py-3">
                                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                    href="{{ route('customer-systems.index') }}">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="ml-4">ข้อมูลลูกค้า</span>
                                </a>
                            </li>
                            <li class="relative px-6 py-3">
                                <button
                                    class="inline-flex items-center justify-between w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                                    @click="togglePagesMenus" aria-haspopup="true">
                                    <span class="inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                        </svg>
                                        <span class="ml-4">สรุป</span>
                                    </span>

                                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <template x-if="isPagesMenuOpens">
                                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                                        x-transition:enter-start="opacity-25 max-h-0"
                                        x-transition:enter-end="opacity-100 max-h-xl"
                                        x-transition:leave="transition-all ease-in-out duration-300"
                                        x-transition:leave-start="opacity-100 max-h-xl"
                                        x-transition:leave-end="opacity-0 max-h-0"
                                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner text-center bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                                        aria-label="submenu">
                                        <li
                                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                            <a class="w-full" href="{{ route('sumTransport') }}">
                                                สรุปรายงานขนส่ง
                                            </a>
                                        </li>
                                    </ul>
                                </template>
                            </li>
                        </ul>
                    @endcan
            </div>
        </aside>
        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                <div
                    class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
                    <!-- Mobile hamburger -->
                    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                        @click="toggleSideMenu" aria-label="Menu">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Search input -->
                    <div class="flex justify-center flex-1 lg:mr-32">
                        <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                            <div class="absolute inset-y-0 flex items-center pl-2">
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <form action="{{ route('search') }}" method="get">
                                @csrf
                                <input
                                    class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input h-9"
                                    type="text" placeholder="Search for name" aria-label="Search" name="search" />
                            </form>
                        </div>
                    </div>
                    <ul class="flex items-center flex-shrink-0 space-x-6">
                        <li class="flex mr-10">
                            <button
                                class="absolute top-6  w-10 h-5 md:w-12 md:h-6 rounded-2xl bg-white flex items-center transition duration-300 focus:outline-none shadow"
                                onclick="toggleTheme()">
                                <div id="switch-toggle"
                                    class="w-6 h-6 md:w-7 md:h-7 relative rounded-full transition duration-500 transform bg-yellow-500 -translate-x-2 p-1 text-white ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                            </button>
                        </li>
                        <!-- Profile menu -->
                        <li class="relative">
                            <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                                @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account"
                                aria-haspopup="true">
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="{{ asset('img/Profile/' . Auth::user()->Path_imageProfile) }}" alt=""
                                    aria-hidden="true" />
                            </button>
                            <template x-if="isProfileMenuOpen">
                                <ul x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu"
                                    class="absolute right-0 w-40 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                                    aria-label="submenu">
                                    <li class="flex">
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                            href="{{ route('Profile.show', Auth::user()->id) }}">
                                            @csrf
                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                </path>
                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span>เปลี่ยนรหัสผ่าน</span>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                                href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path
                                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                    </path>
                                                </svg>
                                                <span>ออกจากระบบ</span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>

                            </template>
                        </li>
                    </ul>
                </div>
            </header>
            @can('owner')
                <main class="h-full overflow-y-auto">
                    <div class="container px-6 mx-auto grid ">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            หน้าหลัก
                        </h2>
                        <!-- Cards -->
                        <div class="grid  gap-6 mb-8 md:grid-cols-1 lg:grid-cols-3 xl:grid-cols-3">
                            <!-- Card -->
                            <a href="{{ route('projects-order') }}">
                                <div
                                    class="flex justify-between p-4   rounded-lg shadow-xs bg-fuchsia-400  place-content-center ">
                                    <div class="place-content-center">
                                        <p class="mb-2 text-2xl text-white">ออเดอร​์</p>
                                        <path>
                                            <img src="/img/order.svg" alt="" />
                                        </path>
                                    </div>
                                    <div class="p-3 mr-4 rounded-full   ">
                                        <p class="text-50px text-white">{{ $status->where('status', 'order')->count() }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <!-- Card -->
                            <a href="{{ route('projects-transit') }}">
                                <div
                                    class="flex justify-between p-4 rounded-lg shadow-xs  4 bg-amber-400 place-content-center max-w-7xl">
                                    <div class="place-content-center">
                                        <p class=" text-2xl text-white">กำลังส่ง</p>
                                        <path>
                                            <img src="/img/delivery-truck.svg" alt="" />
                                        </path>
                                    </div>
                                    <div class="p-3 mr-4 rounded-full">
                                        <p class="text-50px text-white">{{ $orders->where('status', 'send')->count() }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <!-- Card -->
                            <a href="{{ route('projects-success') }}">
                                <div
                                    class="flex justify-between p-4  rounded-lg shadow-xs   bg-green-300 place-content-center ">
                                    <div class="place-content-center">
                                        <p class="mb-2 text-2xl text-white">สำเร็จ</p>
                                        <path>
                                            <img src="/img/clipboard.svg" alt="" />
                                        </path>
                                    </div>
                                    <div class="p-3 mr-4 rounded-full">
                                        <p class="text-50px text-white">
                                            {{ $orders->where('status', 'success')->count() }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        {{-- show date --}}
                        <div clas="w-full ">
                            <div
                                class="flex mb-4 xl:flex-row-reverse lg:flex-row-reverse  md:flex-row-reverse  ss:flex-col">
                                <div
                                    class="bg-white rounded-lg h-50px xl:w-300px lg:w-300px  md:w-full ss:w-full dark:bg-gray-800 mt-3">
                                    <div class="p-3">
                                        <form class="flex" action="{{ route('date') }}" method="get">
                                            @csrf
                                            <input class="dark:text-white dark:bg-gray-800" type="date" name="date"
                                                value="YYYY-MM-DD">

                                            <button
                                                class=" text-white xl:w-150px lg:w-full md:w-200px sm:w-200px ss:w-150px h-30px rounded-lg bg-pink">ค้นหา</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- New Table -->
                        <div class="w-full overflow-hidden rounded-lg shadow-xs">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-center text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">เลขที่</th>
                                            <th class="px-4 py-3">รายการ</th>
                                            <th class="px-4 py-3">ชื่อ-ผู้ส่ง</th>
                                            <th class="px-4 py-3">ชื่อ-ผู้รับ</th>
                                            <th class="px-4 py-3">จังหวัด-ที่ส่ง</th>
                                            <th class="px-4 py-3">จุดลง</th>
                                            <th class="px-4 py-3">วันที่</th>
                                            <th class="px-4 py-3">สถานะ</th>
                                            <th class="px-4 py-3"></th>
                                            <th class="px-4 py-3">รหัสติดตาม</th>
                                            <th class="px-4 py-3"></th>
                                        </tr>
                                    </thead>
                                    @php($i = 1)
                                    @php($s = 1)
                                    @inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')
                                    @foreach ($orders as $order)
                                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                            <tr class="text-gray-700 dark:text-gray-400 text-center">

                                                <td class="px-4 py-3 text-xs ">

                                                    {{ $i++ }}

                                                </td>

                                                <td class="px-4 py-3 text-xs ">
                                                    {{ $order->type }}{{ $order->list }}
                                                </td>
                                                <td class="px-4 py-3 text-xs">
                                                    <div class="w-100px">
                                                        {{ $order->customer->name }}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-xs">
                                                    <div class=" w-100px">
                                                        {{ $order->name }}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-xs ">
                                                    <div class="w-100px">
                                                        {{ $order->province->province }}
                                                    </div>
                                                </td>
                                                @if ($order->provinces_tos_id == null)
                                                    <td class="px-4 py-3 text-xs ">
                                                        {{ $order->city->city }}
                                                    </td>
                                                @else
                                                    <td class="px-4 py-3 text-xs ">
                                                        {{ $order->provinces_tos->provinces_to }}
                                                    </td>
                                                @endif
                                                <td class="px-4 py-3 text-xs ">
                                                    <div class="w-150px">
                                                        {{ $thaiDateHelper->simpleDateFormatcustomer($order->created_at) }}
                                                    </div>
                                                </td>
                                                @if ($order->status == 'order')
                                                    <td class="px-4 py-3 text-sm ">
                                                        <div
                                                            class="bg-fuchsia-400 w-100px h-26px text-center p-1 rounded-lg  text-white  m-auto">
                                                            ออเดอร์
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('projects.update', $order->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="send">
                                                            <button
                                                                onclick="javascript:return confirm('ยืนยันการอัปเดทสถานะ')"
                                                                class=" mr-2 w-100px h-26px bg-141 rounded-lg text-white">อัปเดทสถานะ</button>
                                                        </form>
                                                    </td>
                                                @elseif($order->status == 'send')
                                                    @php($s++)
                                                    <td class="px-4 py-3 text-sm ">
                                                        <div
                                                            class="bg-amber-400 w-100px h-26px text-center p-1 rounded-lg  text-white  m-auto">
                                                            กำลังจัดส่ง
                                                        </div>
                                                    </td>
                                                    <td>

                                                        <form action="{{ route('projects.update', $order->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="success">
                                                            <button
                                                                onclick="javascript:return confirm('ยืนยันการอัปเดทสถานะ')"
                                                                class=" mr-2 w-100px h-26px bg-141 rounded-lg text-white">อัปเดทสถานะ</button>
                                                        </form>

                                                    </td>
                                                @elseif($order->status == 'success')
                                                    <td class="px-4 py-3 text-sm ">
                                                        <div
                                                            class="bg-green-300 w-100px h-26px text-center p-1 rounded-lg  text-white  m-auto">
                                                            จัดสังสำเร็จ
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                @endif

                                                <td class="px-4 py-3 text-xs ">
                                                    {{ $order->tracking }}
                                                </td>
                                                <td class="flex px-4 py-3 text-sm ">
                                                    <a class="w-6 h-6 mr-2"
                                                        href="{{ route('FormOrder.edit', $order->id) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('projects.destroy', $order->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button id="" class="w-6 h-6"><svg
                                                                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                @if($message = Session::get('success'))
                                    <div id="namid" class="name text-rose-600" value="0">
                                    </div>
                                @endif
                            </div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </main>

            @endcan
            @can('admin')
                <main class="h-full overflow-y-auto">
                    <div class="container px-6 mx-auto grid ">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            หน้าหลัก
                        </h2>
                        <!-- Cards -->
                        <div class="grid  gap-6 mb-8 md:grid-cols-1 lg:grid-cols-3 xl:grid-cols-3">
                            <!-- Card -->
                            <a href="{{ route('projects-order') }}">
                                <div
                                    class="flex justify-between p-4   rounded-lg shadow-xs bg-fuchsia-400  place-content-center ">
                                    <div class="place-content-center">
                                        <p class="mb-2 text-2xl text-white">ออเดอร​์</p>
                                        <path>
                                            <img src="/img/order.svg" alt="" />
                                        </path>
                                    </div>
                                    <div class="p-3 mr-4 rounded-full   ">
                                        <p class="text-50px text-white">{{ $status->where('status', 'order')->count() }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <!-- Card -->
                            <a href="{{ route('projects-transit') }}">
                                <div
                                    class="flex justify-between p-4 rounded-lg shadow-xs  4 bg-amber-400 place-content-center max-w-7xl">
                                    <div class="place-content-center">
                                        <p class=" text-2xl text-white">กำลังส่ง</p>
                                        <path>
                                            <img src="/img/delivery-truck.svg" alt="" />
                                        </path>
                                    </div>
                                    <div class="p-3 mr-4 rounded-full">
                                        <p class="text-50px text-white">{{ $orders->where('status', 'send')->count() }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <!-- Card -->
                            <a href="{{ route('projects-success') }}">
                                <div
                                    class="flex justify-between p-4  rounded-lg shadow-xs   bg-green-300 place-content-center ">
                                    <div class="place-content-center">
                                        <p class="mb-2 text-2xl text-white">สำเร็จ</p>
                                        <path>
                                            <img src="/img/clipboard.svg" alt="" />
                                        </path>
                                    </div>
                                    <div class="p-3 mr-4 rounded-full">
                                        <p class="text-50px text-white">
                                            {{ $orders->where('status', 'success')->count() }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        {{-- show date --}}
                        <div clas="w-full ">
                            <div
                                class="flex mb-4 xl:flex-row-reverse lg:flex-row-reverse  md:flex-row-reverse  ss:flex-col">
                                <div
                                    class="bg-white rounded-lg h-50px xl:w-300px lg:w-300px  md:w-full ss:w-full dark:bg-gray-800 mt-3">
                                    <div class="p-3">
                                        <form class="flex" action="{{ route('date') }}" method="get">
                                            @csrf
                                            <input class="dark:text-white dark:bg-gray-800" type="date" name="date"
                                                value="YYYY-MM-DD">

                                            <button
                                                class=" dark:text-white xl:w-150px lg:w-150px md:w-full ss:w-150px h-30px rounded-lg bg-pink">ค้นหา</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- New Table -->
                        <div class="w-full overflow-hidden rounded-lg shadow-xs">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">เลขที่</th>
                                            <th class="px-4 py-3">รายการ</th>
                                            <th class="px-4 py-3">ชื่อ-ผู้ส่ง</th>
                                            <th class="px-4 py-3">ชื่อ-ผู้รับ</th>
                                            <th class="px-4 py-3">จังหวัด-ที่ส่ง</th>
                                            <th class="px-4 py-3">จุดลง</th>
                                            <th class="px-4 py-3">วันที่</th>
                                            <th class="px-4 py-3">สถานะ</th>
                                            <th class="px-4 py-3"></th>
                                            <th class="px-4 py-3">รหัสติดตาม</th>
                                            <th class="px-4 py-3"></th>
                                        </tr>
                                    </thead>
                                    @php($i = 1)
                                    @php($s = 1)
                                    @inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')
                                    @foreach ($orders as $order)
                                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">
                                                    <div class="flex items-center text-sm"> {{ $i++ }}</div>
                                                </td>
                                                <td class="px-4 py-3 text-xs">{{ $order->type }}{{ $order->list }}
                                                </td>
                                                <td class="px-4 py-3 text-xs">
                                                    <div class="w-100px">
                                                        {{ $order->customer->name }}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-xs">
                                                    <div class="w-100px">
                                                        {{ $order->name }}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-xs ">
                                                    {{ $order->province->province }}
                                                </td>
                                                @if ($order->provinces_tos_id == null)
                                                    <td class="px-4 py-3 text-xs">
                                                        {{ $order->city->city }}
                                                    </td>
                                                @else
                                                    <td class="px-4 py-3 text-xs">
                                                        {{ $order->provinces_tos->provinces_to }}
                                                    </td>
                                                @endif
                                                <td class="px-4 py-3 text-xs ">
                                                    <div class="w-100px">
                                                        {{ $thaiDateHelper->simpleDateFormatcustomer($order->created_at) }}
                                                    </div>
                                                </td>
                                                @if ($order->status == 'order')
                                                    <td class="px-4 py-3 text-sm ">
                                                        <div
                                                            class="bg-fuchsia-400 w-100px h-26px text-center p-1 rounded-lg  text-white  m-auto">
                                                            ออเดอร์
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('projects.update', $order->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="send">
                                                            <button
                                                                onclick="javascript:return confirm('ยืนยันการอัปเดทสถานะ')"
                                                                class=" mr-2 w-100px h-26px bg-141 rounded-lg text-white">อัปเดทสถานะ</button>
                                                        </form>
                                                    </td>
                                                @elseif($order->status == 'send')
                                                    @php($s++)
                                                    <td class="px-4 py-3 text-sm ">
                                                        <div
                                                            class="bg-amber-400 w-100px h-26px text-center p-1 rounded-lg  text-white  m-auto">
                                                            กำลังจัดส่ง
                                                        </div>
                                                    </td>
                                                    <td>

                                                        <form action="{{ route('projects.update', $order->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="success">
                                                            <button
                                                                onclick="javascript:return confirm('ยืนยันการอัปเดทสถานะ')"
                                                                class=" mr-2 w-100px h-26px bg-141 rounded-lg text-white">อัปเดทสถานะ</button>
                                                        </form>

                                                    </td>
                                                @elseif($order->status == 'success')
                                                    <td class="px-4 py-3 text-sm ">
                                                        <div
                                                            class="bg-green-300 w-100px h-26px text-center p-1 rounded-lg  text-white  m-auto">
                                                            จัดสังสำเร็จ
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                @endif

                                                <td class="px-4 py-3 text-sm ">
                                                    {{ $order->tracking }}
                                                </td>
                                                <td class="flex px-4 py-3 text-sm ">
                                                    <a class="w-6 h-6 mr-2"
                                                        href="{{ route('FormOrder.edit', $order->id) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('projects.destroy', $order->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button id="" class="w-6 h-6"><svg
                                                                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                @if($message = Session::get('success'))
                                    <div id="namid" class="name text-rose-600" value="0">
                                    </div>
                                @endif
                            </div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </main>
            @endcan
            @can('employee')
                <main class="h-full overflow-y-auto">
                    <div class="container px-6 mx-auto grid ">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            หน้าหลัก
                        </h2>
                        <!-- Cards -->
                        <div class="grid  gap-6 mb-8 md:grid-cols-1 lg:grid-cols-3 xl:grid-cols-3">
                            <!-- Card -->
                            <a href="{{ route('projects-order') }}">
                                <div
                                    class="flex justify-between p-4   rounded-lg shadow-xs bg-fuchsia-400  place-content-center ">
                                    <div class="place-content-center">
                                        <p class="mb-2 text-2xl text-white">ออเดอร​์</p>
                                        <path>
                                            <img src="/img/order.svg" alt="" />
                                        </path>
                                    </div>
                                    @php($i = 0)
                                    @foreach ($provinces->where('user_id', Auth::user()->id) as $province)
                                        @foreach ($orders->where('province_id', $province->id)->where('status', 'order') as $order)
                                            @php($i = $i + 1)
                                        @endforeach
                                    @endforeach
                                    <div class="p-3 mr-4 rounded-full   ">
                                        <p class="text-50px text-white">{{ $i }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <!-- Card -->
                            <a href="{{ route('projects-transit') }}">
                                <div
                                    class="flex justify-between p-4 rounded-lg shadow-xs  4 bg-amber-400 place-content-center max-w-7xl">
                                    <div class="place-content-center">
                                        <p class=" text-2xl text-white">กำลังส่ง</p>
                                        <path>
                                            <img src="/img/delivery-truck.svg" alt="" />
                                        </path>
                                    </div>
                                    @php($i = 0)
                                    @foreach ($provinces->where('user_id', Auth::user()->id) as $province)
                                        @foreach ($orders->where('province_id', $province->id)->where('status', 'send') as $order)
                                            @php($i = $i + 1)
                                        @endforeach
                                    @endforeach
                                    <div class="p-3 mr-4 rounded-full">
                                        <p class="text-50px text-white">{{ $i }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <!-- Card -->
                            <a href="{{ route('projects-success') }}">
                                <div
                                    class="flex justify-between p-4  rounded-lg shadow-xs   bg-green-300 place-content-center ">

                                    <div class="place-content-center">
                                        <p class="mb-2 text-2xl text-white">สำเร็จ</p>
                                        <path>
                                            <img src="/img/clipboard.svg" alt="" />
                                        </path>
                                    </div>
                                    @php($i = 0)
                                    @foreach ($provinces->where('user_id', Auth::user()->id) as $province)
                                        @foreach ($orders->where('province_id', $province->id)->where('status', 'success') as $order)
                                            @php($i = $i + 1)
                                        @endforeach
                                    @endforeach
                                    <div class="p-3 mr-4 rounded-full">
                                        <p class="text-50px text-white">
                                            {{ $i }} </p>
                                    </div>

                                </div>
                            </a>
                        </div>
                        {{-- show date --}}
                        <div clas="w-full ">
                            <div
                                class="flex mb-4 xl:flex-row-reverse lg:flex-row-reverse  md:flex-row-reverse  ss:flex-col">
                                <div
                                    class="bg-white rounded-lg h-50px xl:w-300px lg:w-300px  md:w-full ss:w-full dark:bg-gray-800 mt-3">
                                    <div class="p-3">
                                        <form class="flex" action="{{ route('date') }}" method="get">
                                            @csrf
                                            <input class="dark:text-white dark:bg-gray-800" type="date" name="date"
                                                value="YYYY-MM-DD">

                                            <button
                                                class=" dark:text-white xl:w-150px lg:w-150px md:w-full ss:w-150px h-30px rounded-lg bg-pink">ค้นหา</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- New Table -->
                        <div class="w-full overflow-hidden rounded-lg shadow-xs">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">เลขที่</th>
                                            <th class="px-4 py-3">รายการ</th>
                                            <th class="px-4 py-3">ชื่อ-ผู้ส่ง</th>
                                            <th class="px-4 py-3">ชื่อ-ผู้รับ</th>
                                            <th class="px-4 py-3">จังหวัด-ที่ส่ง</th>
                                            <th class="px-4 py-3">จุดลง</th>
                                            <th class="px-4 py-3">วันที่</th>
                                            <th class="px-4 py-3">สถานะ</th>
                                            <th class="px-4 py-3"></th>
                                            <th class="px-4 py-3">รหัสติดตาม</th>
                                            <th class="px-4 py-3"></th>
                                        </tr>
                                    </thead>
                                    @php($i = 1)
                                    @php($s = 1)
                                    @inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')
                                    @foreach ($provinces->where('user_id', Auth::user()->id) as $province)
                                        @foreach ($orders->where('province_id', $province->id) as $order)
                                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                    <td class="px-4 py-3 text-xs"> {{ $i++ }}</td>
                                                    <td class="px-4 py-3 text-xs">
                                                        {{ $order->type }}{{ $order->list }}
                                                    </td>
                                                    <td class="px-4 py-3 text-xs ">
                                                        <div class="w-100px">
                                                            {{ $order->customer->name }}
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 text-xs">
                                                        <div class="w-100px">
                                                            {{ $order->name }}
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 text-xs">
                                                        {{ $order->province->province }}
                                                    </td>
                                                    @if ($order->provinces_tos_id == null)
                                                        <td class="px-4 py-3 text-xs">
                                                            {{ $order->city->city }}
                                                        </td>
                                                    @else
                                                        <td class="px-4 py-3 text-xs">
                                                            {{ $order->provinces_tos->provinces_to }}
                                                        </td>
                                                    @endif
                                                    <td class="px-4 py-3 text-xs">
                                                        <div class="w-100px">
                                                            {{ $thaiDateHelper->simpleDateFormatcustomer($order->created_at) }}
                                                        </div>
                                                    </td>
                                                    @if ($order->status == 'order')
                                                        <td class="px-4 py-3 text-sm">
                                                            <div
                                                                class="bg-fuchsia-400 w-100px h-26px text-center p-1 rounded-lg  text-white  m-auto">
                                                                ออเดอร์
                                                            </div>
                                                        </td>
                                                        <td>

                                                        </td>
                                                    @elseif($order->status == 'send')
                                                        @php($s++)
                                                        <td class="px-4 py-3 text-sm ">
                                                            <div
                                                                class="bg-amber-400 w-100px h-26px text-center p-1 rounded-lg  text-white  m-auto">
                                                                กำลังจัดส่ง
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('projects.update', $order->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="success">
                                                                <button
                                                                    onclick="javascript:return confirm('ยืนยันการอัปเดทสถานะ')"
                                                                    class=" mr-2 w-100px h-26px bg-141 rounded-lg text-white">อัปเดทสถานะ</button>
                                                            </form>
                                                        </td>
                                                    @elseif($order->status == 'success')
                                                        <td class="px-4 py-3 text-sm ">
                                                            <div
                                                                class="bg-green-300 w-100px h-26px text-center p-1 rounded-lg  text-white  m-auto">
                                                                จัดสังสำเร็จ
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                    @endif

                                                    <td class="px-4 py-3 text-sm ">
                                                        {{ $order->tracking }}
                                                    </td>
                                                    <td class="flex px-4 py-3 text-sm ">

                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    @endforeach
                                </table>
                            </div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                    @if($message = Session::get('success'))
                        <div id="namid" class="name text-rose-600" value="0">
                        </div>
                    @endif
                </main>
            @endcan
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            var data=$('.name').val()
            if (data == 0) {
                    Swal.fire({
                        title: 'เปลี่ยนรหัสผ่านสำเร็จ',
                        type: 'success',
                        showCloseButton: true
                    })
            }
        })
    </script>
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
