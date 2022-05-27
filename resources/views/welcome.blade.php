<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Bizman') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body class="bg-white">
        <header class="shadow bg-main-gray fixed z-10 w-full">
            <nav x-data="{ isOpen: false }" @click.away="isOpen = false" class="container mx-auto lg:flex items-center justify-between py-3 px-6">
                <a href="/" class="float-left">
                    <x-landing-page-logo />
                </a>

                <div class="flex lg:hidden justify-end items-center">
                    <button
                        type="button"
                        class="text-blue-600 p-2"
                        aria-label="toggle menu"
                        @click="isOpen = !isOpen">
                        <svg viewBox="0 0 24 24" class="h-10 w-10 fill-current">
                            <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                        </svg>
                    </button>
                </div>

                <ul :class="isOpen ? 'show' : 'hidden'" @click="isOpen = false" class="lg:flex gap-12 text-lg">
                    <li class="hover:text-cyan-500 duration-500 p-7 pt-10 lg:p-0 lg:pt-0">
                        <a href="#home">Home</a>
                    </li>
                    <li class="hover:text-cyan-500 duration-500 p-7 lg:p-0">
                        <a href="#tools">Narzędzia</a>
                    </li>
                    <li class="hover:text-cyan-500 duration-500 p-7 lg:p-0">
                        <a href="#">Cennik</a>
                    </li>
                </ul>

                <div :class="isOpen ? 'show' : 'hidden'" class="lg:flex text-lg">
                    @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/clients') }}">
                                    <button class="bg-blue-600 text-white duration-500 px-4 py-2 m-3 hover:bg-blue-500 rounded">
                                        Dashboard
                                    </button>
                                </a>
                            @else
                                <a href="{{ route('login') }}">
                                    <button class="bg-main-gray duration-500 px-4 py-2 m-3 hover:bg-blue-500 hover:text-white rounded">
                                        Logowanie
                                    </button>
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">
                                        <button class="bg-blue-600 text-white duration-500 px-4 py-2 m-3 hover:bg-blue-500 rounded">
                                            Rejestracja
                                        </button>
                                    </a>
                                @endif
                            @endauth
                    @endif
                </div>
            </nav>
        </header>

        <section id="home" class="bg-main-gray">
            <div class="container flex flex-col-reverse lg:flex-row items-center gap-12 mx-auto pt-40 px-6">
                <div class="flex flex-1 flex-col items-center lg:items-start">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl text-center lg:text-left mb-6 font-extrabold">
                        Erat dolores sea dolores lorem nonumy no invidunt rebum diam.
                    </h2>
                    <p class="text-lg text-center lg:text-left mb-6">
                        Kasd at kasd et ipsum stet aliquyam no est. Kasd amet tempor consetetur sit elitr et consetetur at. Aliquyam nonumy ut lorem sed eirmod eirmod, labore sit elitr dolore duo et magna dolores eirmod. Sit est lorem ea duo labore. Sanctus sit sed erat stet et diam diam, consetetur diam.
                    </p>
                    <div class="flex justify-center flex-wrap gap-6 mb-6">
                        <button class="bg-blue-600 text-white duration-500 px-4 py-2 mx-4 hover:bg-blue-500 rounded text-lg">
                            Napisz do nas
                        </button>
                        <button class="bg-white duration-500 px-4 py-2 mx-4 hover:bg-blue-500 hover:text-white rounded text-lg border-2 border-gray-300">
                            Zamów demo
                        </button>
                    </div>
                </div>
                <div class="flex justify-center flex-1 mb-2 sm:mb-8 lg:mb-0">
                    <img src="{{ asset('images/landing-page-image.png') }}" alt="landing-page-image" class="w-full h-full"/>
                </div>
            </div>
        </section>

        <svg viewBox="0 0 1920 116" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1920 51.4091H1453.44C1111.12 51.4091 773.639 116 480 116C186.361 116 0 51.4091 0 51.4091V0H1920V51.4091Z" fill="#F7F8F9"/>
        </svg>

        <section id="tools">
            <div class="container mx-auto py-20 px-6 text-center">
                <div class="flex justify-center flex-col mb-6 pt-5">
                    <h2 class="text-2xl md:text-3xl lg:text-4xl text-center mb-6 font-extrabold">Et justo sea justo at stet sit ipsum, accusam lorem.</h2>
                    <p class="text-lg text-center mb-6">Sadipscing justo sanctus et tempor dolores no et est ipsum, dolores magna et stet ut sanctus. Sadipscing vero diam aliquyam stet sit, est voluptua dolore et ipsum stet eos. Labore consetetur sadipscing est stet sanctus at. Clita vero erat amet.</p>
                </div>
                <div class="lg:flex justify-around gap-10 items-center">
                    <div class="flex flex-col justify-center gap-10">
                        <div class="flex items-center flex-col">
                            <button class="bg-blue-600 p-5 rounded">
                                <svg width="24" height="21" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 18.63H5C4.20435 18.63 3.44129 18.3139 2.87868 17.7513C2.31607 17.1887 2 16.4257 2 15.63V7.63C2 7.36479 1.89464 7.11043 1.70711 6.9229C1.51957 6.73536 1.26522 6.63 1 6.63C0.734784 6.63 0.48043 6.73536 0.292893 6.9229C0.105357 7.11043 0 7.36479 0 7.63L0 15.63C0 16.9561 0.526784 18.2279 1.46447 19.1655C2.40215 20.1032 3.67392 20.63 5 20.63H17C17.2652 20.63 17.5196 20.5246 17.7071 20.3371C17.8946 20.1496 18 19.8952 18 19.63C18 19.3648 17.8946 19.1104 17.7071 18.9229C17.5196 18.7354 17.2652 18.63 17 18.63ZM21 0.630005H7C6.20435 0.630005 5.44129 0.946075 4.87868 1.50868C4.31607 2.07129 4 2.83436 4 3.63V13.63C4 14.4257 4.31607 15.1887 4.87868 15.7513C5.44129 16.3139 6.20435 16.63 7 16.63H21C21.7956 16.63 22.5587 16.3139 23.1213 15.7513C23.6839 15.1887 24 14.4257 24 13.63V3.63C24 2.83436 23.6839 2.07129 23.1213 1.50868C22.5587 0.946075 21.7956 0.630005 21 0.630005V0.630005ZM20.59 2.63L14.71 8.51C14.617 8.60373 14.5064 8.67813 14.3846 8.7289C14.2627 8.77966 14.132 8.8058 14 8.8058C13.868 8.8058 13.7373 8.77966 13.6154 8.7289C13.4936 8.67813 13.383 8.60373 13.29 8.51L7.41 2.63H20.59ZM22 13.63C22 13.8952 21.8946 14.1496 21.7071 14.3371C21.5196 14.5246 21.2652 14.63 21 14.63H7C6.73478 14.63 6.48043 14.5246 6.29289 14.3371C6.10536 14.1496 6 13.8952 6 13.63V4L11.88 9.88C12.4425 10.4418 13.205 10.7574 14 10.7574C14.795 10.7574 15.5575 10.4418 16.12 9.88L22 4V13.63Z" fill="white"/>
                                </svg>
                            </button>
                            <h3 class="text-xl md:text-2xl lg:text-3xl font-extrabold">Dolore at at voluptua ipsum.</h3>
                            <p class="text-lg">Takimata clita sea vero ut labore clita ipsum sed no..</p>
                        </div>
                        <div class="flex items-center flex-col">
                            <button class="bg-blue-600 p-5 rounded">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 17.9999H9.24C9.37161 18.0007 9.50207 17.9755 9.62391 17.9257C9.74574 17.8759 9.85656 17.8026 9.95 17.7099L16.87 10.7799L19.71 7.99994C19.8037 7.90698 19.8781 7.79637 19.9289 7.67452C19.9797 7.55266 20.0058 7.42195 20.0058 7.28994C20.0058 7.15793 19.9797 7.02722 19.9289 6.90536C19.8781 6.7835 19.8037 6.6729 19.71 6.57994L15.47 2.28994C15.377 2.19621 15.2664 2.12182 15.1446 2.07105C15.0227 2.02028 14.892 1.99414 14.76 1.99414C14.628 1.99414 14.4973 2.02028 14.3754 2.07105C14.2536 2.12182 14.143 2.19621 14.05 2.28994L11.23 5.11994L4.29 12.0499C4.19732 12.1434 4.12399 12.2542 4.07423 12.376C4.02446 12.4979 3.99924 12.6283 4 12.7599V16.9999C4 17.2652 4.10536 17.5195 4.29289 17.707C4.48043 17.8946 4.73478 17.9999 5 17.9999ZM14.76 4.40994L17.59 7.23994L16.17 8.65994L13.34 5.82994L14.76 4.40994ZM6 13.1699L11.93 7.23994L14.76 10.0699L8.83 15.9999H6V13.1699ZM21 19.9999H3C2.73478 19.9999 2.48043 20.1053 2.29289 20.2928C2.10536 20.4804 2 20.7347 2 20.9999C2 21.2652 2.10536 21.5195 2.29289 21.707C2.48043 21.8946 2.73478 21.9999 3 21.9999H21C21.2652 21.9999 21.5196 21.8946 21.7071 21.707C21.8946 21.5195 22 21.2652 22 20.9999C22 20.7347 21.8946 20.4804 21.7071 20.2928C21.5196 20.1053 21.2652 19.9999 21 19.9999Z" fill="white"/>
                                </svg>
                            </button>
                            <h3 class="text-xl md:text-2xl lg:text-3xl font-extrabold">Dolore at at voluptua ipsum.</h3>
                            <p class="text-lg">Takimata clita sea vero ut labore clita ipsum sed no..</p>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <img src="{{ asset('images/tools-image.png') }}" alt="tools-image" class="w-3/4 h-3/4 xl:w-full xl:h-full my-10 lg:my-0"/>
                    </div>

                    <div class="flex flex-col justify-center gap-10">
                        <div class="flex items-center flex-col">
                            <button class="bg-blue-600 p-5 py-6 rounded">
                                <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.71 1.29C20.617 1.19627 20.5064 1.12188 20.3846 1.07111C20.2627 1.02034 20.132 0.994202 20 0.994202C19.868 0.994202 19.7373 1.02034 19.6154 1.07111C19.4936 1.12188 19.383 1.19627 19.29 1.29L13 7.59L8.71 3.29C8.61704 3.19627 8.50644 3.12188 8.38458 3.07111C8.26272 3.02034 8.13201 2.9942 8 2.9942C7.86799 2.9942 7.73728 3.02034 7.61542 3.07111C7.49356 3.12188 7.38296 3.19627 7.29 3.29L1.29 9.29C1.19627 9.38296 1.12188 9.49356 1.07111 9.61542C1.02034 9.73728 0.994202 9.86799 0.994202 10C0.994202 10.132 1.02034 10.2627 1.07111 10.3846C1.12188 10.5064 1.19627 10.617 1.29 10.71C1.38296 10.8037 1.49356 10.8781 1.61542 10.9289C1.73728 10.9797 1.86799 11.0058 2 11.0058C2.13201 11.0058 2.26272 10.9797 2.38458 10.9289C2.50644 10.8781 2.61704 10.8037 2.71 10.71L8 5.41L12.29 9.71C12.383 9.80373 12.4936 9.87812 12.6154 9.92889C12.7373 9.97966 12.868 10.0058 13 10.0058C13.132 10.0058 13.2627 9.97966 13.3846 9.92889C13.5064 9.87812 13.617 9.80373 13.71 9.71L20.71 2.71C20.8037 2.61704 20.8781 2.50644 20.9289 2.38458C20.9797 2.26272 21.0058 2.13201 21.0058 2C21.0058 1.86799 20.9797 1.73728 20.9289 1.61542C20.8781 1.49356 20.8037 1.38296 20.71 1.29V1.29Z" fill="white"/>
                                </svg>
                            </button>
                            <h3 class="text-xl md:text-2xl lg:text-3xl font-extrabold">Dolore at at voluptua ipsum.</h3>
                            <p class="text-lg">Takimata clita sea vero ut labore clita ipsum sed no..</p>
                        </div>
                        <div class="flex items-center flex-col">
                            <button class="bg-blue-600 p-5 rounded">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 11H1C0.734784 11 0.48043 11.1054 0.292893 11.2929C0.105357 11.4804 0 11.7348 0 12V19C0 19.2652 0.105357 19.5196 0.292893 19.7071C0.48043 19.8946 0.734784 20 1 20H8C8.26522 20 8.51957 19.8946 8.70711 19.7071C8.89464 19.5196 9 19.2652 9 19V12C9 11.7348 8.89464 11.4804 8.70711 11.2929C8.51957 11.1054 8.26522 11 8 11ZM7 18H2V13H7V18ZM19 0H12C11.7348 0 11.4804 0.105357 11.2929 0.292893C11.1054 0.48043 11 0.734784 11 1V8C11 8.26522 11.1054 8.51957 11.2929 8.70711C11.4804 8.89464 11.7348 9 12 9H19C19.2652 9 19.5196 8.89464 19.7071 8.70711C19.8946 8.51957 20 8.26522 20 8V1C20 0.734784 19.8946 0.48043 19.7071 0.292893C19.5196 0.105357 19.2652 0 19 0V0ZM18 7H13V2H18V7ZM19 11H12C11.7348 11 11.4804 11.1054 11.2929 11.2929C11.1054 11.4804 11 11.7348 11 12V19C11 19.2652 11.1054 19.5196 11.2929 19.7071C11.4804 19.8946 11.7348 20 12 20H19C19.2652 20 19.5196 19.8946 19.7071 19.7071C19.8946 19.5196 20 19.2652 20 19V12C20 11.7348 19.8946 11.4804 19.7071 11.2929C19.5196 11.1054 19.2652 11 19 11ZM18 18H13V13H18V18ZM8 0H1C0.734784 0 0.48043 0.105357 0.292893 0.292893C0.105357 0.48043 0 0.734784 0 1V8C0 8.26522 0.105357 8.51957 0.292893 8.70711C0.48043 8.89464 0.734784 9 1 9H8C8.26522 9 8.51957 8.89464 8.70711 8.70711C8.89464 8.51957 9 8.26522 9 8V1C9 0.734784 8.89464 0.48043 8.70711 0.292893C8.51957 0.105357 8.26522 0 8 0V0ZM7 7H2V2H7V7Z" fill="white"/>
                                </svg>
                            </button>
                            <h3 class="text-xl md:text-2xl lg:text-3xl font-extrabold">Dolore at at voluptua ipsum.</h3>
                            <p class="text-lg">Takimata clita sea vero ut labore clita ipsum sed no..</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="container mx-auto mt-20 mb-10 px-6">
                <div class="flex flex-col sm:flex-row items-center justify-between border-b-2 p-2">
                    <svg width="193" height="55" viewBox="0 0 193 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M70.8713 26.4992C72.4128 26.8473 73.6311 27.6181 74.5262 28.8115C75.4461 29.9801 75.9061 31.3227 75.9061 32.8394C75.9061 35.0771 75.1353 36.8299 73.5938 38.098C72.0523 39.366 69.8892 40 67.1045 40H54.0885V13.707H66.6942C69.3794 13.707 71.4804 14.3038 72.9971 15.4972C74.5386 16.6906 75.3093 18.3689 75.3093 20.532C75.3093 22.0736 74.8991 23.3664 74.0786 24.4107C73.283 25.4301 72.2139 26.1263 70.8713 26.4992ZM61.3983 24.1496H65.0905C66.9304 24.1496 67.8504 23.3913 67.8504 21.8746C67.8504 20.3083 66.9304 19.5251 65.0905 19.5251H61.3983V24.1496ZM65.65 34.1074C67.4898 34.1074 68.4098 33.3366 68.4098 31.7951C68.4098 30.9995 68.1612 30.3903 67.6639 29.9677C67.1915 29.545 66.5077 29.3336 65.6127 29.3336H61.3983V34.1074H65.65Z" fill="#8896AB"/>
                        <path d="M82.056 17.1382C80.7631 17.1382 79.7188 16.7901 78.9232 16.0939C78.1524 15.3729 77.767 14.4778 77.767 13.4087C77.767 12.3147 78.1524 11.4072 78.9232 10.6862C79.7188 9.96512 80.7631 9.6046 82.056 9.6046C83.324 9.6046 84.3434 9.96512 85.1141 10.6862C85.9098 11.4072 86.3076 12.3147 86.3076 13.4087C86.3076 14.4778 85.9098 15.3729 85.1141 16.0939C84.3434 16.7901 83.324 17.1382 82.056 17.1382ZM85.6736 19.0775V40H78.3638V19.0775H85.6736Z" fill="#8896AB"/>
                        <path d="M96.0273 33.9209H104.941V40H87.9716V34.2193L96.2884 25.1566H88.0462V19.0775H104.642V24.8582L96.0273 33.9209Z" fill="#8896AB"/>
                        <path d="M134.584 18.891C137.22 18.891 139.283 19.6867 140.775 21.2779C142.292 22.8692 143.05 25.0447 143.05 27.8045V40H135.74V28.7742C135.74 27.6554 135.43 26.7852 134.808 26.1636C134.186 25.542 133.341 25.2312 132.272 25.2312C131.203 25.2312 130.357 25.542 129.736 26.1636C129.114 26.7852 128.803 27.6554 128.803 28.7742V40H121.494V28.7742C121.494 27.6554 121.183 26.7852 120.561 26.1636C119.965 25.542 119.132 25.2312 118.062 25.2312C116.969 25.2312 116.111 25.542 115.489 26.1636C114.868 26.7852 114.557 27.6554 114.557 28.7742V40H107.247V19.0775H114.557V21.8374C115.203 20.9423 116.036 20.2337 117.056 19.7115C118.1 19.1645 119.293 18.891 120.636 18.891C122.177 18.891 123.545 19.2267 124.738 19.898C125.957 20.5693 126.914 21.5141 127.61 22.7324C128.356 21.5887 129.338 20.6688 130.556 19.9726C131.775 19.2516 133.117 18.891 134.584 18.891Z" fill="#8896AB"/>
                        <path d="M145.116 29.5201C145.116 27.357 145.501 25.4674 146.272 23.8513C147.067 22.2352 148.137 20.992 149.479 20.1218C150.847 19.2516 152.363 18.8165 154.029 18.8165C155.471 18.8165 156.714 19.1024 157.759 19.6742C158.803 20.2461 159.611 21.0169 160.183 21.9865V19.0775H167.493V40H160.183V37.091C159.611 38.0607 158.79 38.8314 157.721 39.4033C156.677 39.9751 155.446 40.2611 154.029 40.2611C152.363 40.2611 150.847 39.826 149.479 38.9557C148.137 38.0855 147.067 36.8424 146.272 35.2262C145.501 33.5853 145.116 31.6832 145.116 29.5201ZM160.183 29.5201C160.183 28.1775 159.81 27.1208 159.064 26.35C158.343 25.5793 157.448 25.1939 156.379 25.1939C155.285 25.1939 154.377 25.5793 153.656 26.35C152.935 27.0959 152.575 28.1526 152.575 29.5201C152.575 30.8627 152.935 31.9319 153.656 32.7275C154.377 33.4982 155.285 33.8836 156.379 33.8836C157.448 33.8836 158.343 33.4982 159.064 32.7275C159.81 31.9567 160.183 30.8876 160.183 29.5201Z" fill="#8896AB"/>
                        <path d="M184.599 18.891C187.011 18.891 188.926 19.6991 190.343 21.3152C191.76 22.9065 192.469 25.0696 192.469 27.8045V40H185.159V28.7742C185.159 27.5808 184.848 26.6484 184.226 25.9771C183.605 25.2809 182.772 24.9328 181.728 24.9328C180.634 24.9328 179.776 25.2809 179.154 25.9771C178.533 26.6484 178.222 27.5808 178.222 28.7742V40H170.912V19.0775H178.222V22.0611C178.868 21.1163 179.739 20.358 180.833 19.7861C181.927 19.1894 183.182 18.891 184.599 18.891Z" fill="#8896AB"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V20.8414L11.8627 31.4183L27.3919 17.9757C28.8838 15.8047 30.2498 11.0147 23.7792 9.2223H9.4362V23.5507L4.36761 19.2261V4.22037H23.7792C29.1893 5.24507 38.2732 10.0768 31.3282 21.2061L11.8627 38.1918L0 27.7711V54.9691H24.588C33.8625 55.8027 51.6565 39.6507 35.4262 22.8734C41.3575 15.7873 37.637 -2.74846e-06 22.8086 0H0ZM13.8577 23.8633V13.4948L23.4557 13.3906C25.0518 14.1409 23.8691 15.4052 23.0783 15.9436L13.8577 23.8633ZM25.0194 50.6966C41.681 46.372 39.3085 31.6789 32.4605 26.0517L28.4704 29.4905C37.6556 36.8371 29.1713 46.2157 24.0488 45.7468H9.4362V41.6306L4.36761 37.4102V50.6966H25.0194ZM24.0488 41.4222C31.0586 38.6086 27.3919 33.0856 25.0194 32.3562L19.843 36.9934L14.6666 41.6306L24.0488 41.4222Z" fill="#8896AB"/>
                    </svg>
                    <ul class="flex gap-10 text-gray-400 mt-5 sm:mt-0">
                        <li class="flex gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="h-5 w-5 fill-gray-400"><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/></svg>
                            Github
                        </li>
                        <li class="flex gap-1 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 fill-gray-400"><path d="M339 314.9L175.4 32h161.2l163.6 282.9H339zm-137.5 23.6L120.9 480h310.5L512 338.5H201.5zM154.1 67.4L0 338.5 80.6 480 237 208.8 154.1 67.4z"/></svg>
                            Google Drive
                        </li>
                    </ul>
                </div>
                <span class="text-gray-400">&copy2022 Bizman</span>
            </div>
        </footer>

    </body>
</html>


