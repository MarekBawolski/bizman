<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

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
        
    </head>
    <body class="bg-gray-100">
        <nav class="px-20 p-5 bg-gray-100 shadow md:flex md:items-center md:justify-between">

            <div>
                <svg width="193" height="55" viewBox="0 0 193 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M70.8713 26.4992C72.4128 26.8473 73.6311 27.6181 74.5262 28.8115C75.4461 29.9801 75.9061 31.3227 75.9061 32.8394C75.9061 35.0771 75.1353 36.8299 73.5938 38.098C72.0523 39.366 69.8892 40 67.1045 40H54.0885V13.707H66.6942C69.3794 13.707 71.4804 14.3038 72.9971 15.4972C74.5386 16.6906 75.3093 18.3689 75.3093 20.532C75.3093 22.0736 74.8991 23.3664 74.0786 24.4107C73.283 25.4301 72.2139 26.1263 70.8713 26.4992ZM61.3983 24.1496H65.0905C66.9304 24.1496 67.8504 23.3913 67.8504 21.8746C67.8504 20.3083 66.9304 19.5251 65.0905 19.5251H61.3983V24.1496ZM65.65 34.1074C67.4898 34.1074 68.4098 33.3366 68.4098 31.7951C68.4098 30.9995 68.1612 30.3903 67.6639 29.9677C67.1915 29.545 66.5077 29.3336 65.6127 29.3336H61.3983V34.1074H65.65Z" fill="#2A3342"/>
                <path d="M82.056 17.1382C80.7631 17.1382 79.7188 16.7901 78.9232 16.0939C78.1524 15.3729 77.767 14.4778 77.767 13.4087C77.767 12.3147 78.1524 11.4072 78.9232 10.6862C79.7188 9.96512 80.7631 9.6046 82.056 9.6046C83.324 9.6046 84.3434 9.96512 85.1141 10.6862C85.9098 11.4072 86.3076 12.3147 86.3076 13.4087C86.3076 14.4778 85.9098 15.3729 85.1141 16.0939C84.3434 16.7901 83.324 17.1382 82.056 17.1382ZM85.6736 19.0775V40H78.3638V19.0775H85.6736Z" fill="#2A3342"/>
                <path d="M96.0273 33.9209H104.941V40H87.9716V34.2193L96.2884 25.1566H88.0462V19.0775H104.642V24.8582L96.0273 33.9209Z" fill="#2A3342"/>
                <path d="M134.584 18.891C137.22 18.891 139.283 19.6867 140.775 21.2779C142.292 22.8692 143.05 25.0447 143.05 27.8045V40H135.74V28.7742C135.74 27.6554 135.43 26.7852 134.808 26.1636C134.186 25.542 133.341 25.2312 132.272 25.2312C131.203 25.2312 130.357 25.542 129.736 26.1636C129.114 26.7852 128.803 27.6554 128.803 28.7742V40H121.494V28.7742C121.494 27.6554 121.183 26.7852 120.561 26.1636C119.965 25.542 119.132 25.2312 118.062 25.2312C116.969 25.2312 116.111 25.542 115.489 26.1636C114.868 26.7852 114.557 27.6554 114.557 28.7742V40H107.247V19.0775H114.557V21.8374C115.203 20.9423 116.036 20.2337 117.056 19.7115C118.1 19.1645 119.293 18.891 120.636 18.891C122.177 18.891 123.545 19.2267 124.738 19.898C125.957 20.5693 126.914 21.5141 127.61 22.7324C128.356 21.5887 129.338 20.6688 130.556 19.9726C131.775 19.2516 133.117 18.891 134.584 18.891Z" fill="#2A3342"/>
                <path d="M145.116 29.5201C145.116 27.357 145.501 25.4674 146.272 23.8513C147.067 22.2352 148.137 20.992 149.479 20.1218C150.847 19.2516 152.363 18.8165 154.029 18.8165C155.471 18.8165 156.714 19.1024 157.759 19.6742C158.803 20.2461 159.611 21.0169 160.183 21.9865V19.0775H167.493V40H160.183V37.091C159.611 38.0607 158.79 38.8314 157.721 39.4033C156.677 39.9751 155.446 40.2611 154.029 40.2611C152.363 40.2611 150.847 39.826 149.479 38.9557C148.137 38.0855 147.067 36.8424 146.272 35.2262C145.501 33.5853 145.116 31.6832 145.116 29.5201ZM160.183 29.5201C160.183 28.1775 159.81 27.1208 159.064 26.35C158.343 25.5793 157.448 25.1939 156.379 25.1939C155.285 25.1939 154.377 25.5793 153.656 26.35C152.935 27.0959 152.575 28.1526 152.575 29.5201C152.575 30.8627 152.935 31.9319 153.656 32.7275C154.377 33.4982 155.285 33.8836 156.379 33.8836C157.448 33.8836 158.343 33.4982 159.064 32.7275C159.81 31.9567 160.183 30.8876 160.183 29.5201Z" fill="#2A3342"/>
                <path d="M184.599 18.891C187.011 18.891 188.926 19.6991 190.343 21.3152C191.76 22.9065 192.469 25.0696 192.469 27.8045V40H185.159V28.7742C185.159 27.5808 184.848 26.6484 184.226 25.9771C183.605 25.2809 182.772 24.9328 181.728 24.9328C180.634 24.9328 179.776 25.2809 179.154 25.9771C178.533 26.6484 178.222 27.5808 178.222 28.7742V40H170.912V19.0775H178.222V22.0611C178.868 21.1163 179.739 20.358 180.833 19.7861C181.927 19.1894 183.182 18.891 184.599 18.891Z" fill="#2A3342"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V20.8414L11.8627 31.4183L27.3919 17.9757C28.8838 15.8047 30.2498 11.0147 23.7792 9.2223H9.4362V23.5507L4.36761 19.2261V4.22037H23.7792C29.1893 5.24507 38.2732 10.0768 31.3282 21.2061L11.8627 38.1918L0 27.7711V54.9691H24.588C33.8625 55.8027 51.6565 39.6507 35.4262 22.8734C41.3575 15.7873 37.637 -2.74846e-06 22.8086 0H0ZM13.8577 23.8633V13.4948L23.4557 13.3906C25.0518 14.1409 23.8691 15.4052 23.0783 15.9436L13.8577 23.8633ZM25.0194 50.6966C41.681 46.372 39.3085 31.6789 32.4605 26.0517L28.4704 29.4905C37.6556 36.8371 29.1713 46.2157 24.0488 45.7468H9.4362V41.6306L4.36761 37.4102V50.6966H25.0194ZM24.0488 41.4222C31.0586 38.6086 27.3919 33.0856 25.0194 32.3562L19.843 36.9934L14.6666 41.6306L24.0488 41.4222Z" fill="#3B82F6"/>
                </svg>
            </div>
            
            <ul class="md:flex md:items-center mx-auto">
                <li class="mx-6 my-6 md:my-0">
                    <a href="#" class="text-lg hover:text-cyan-500 duration-500">Home</a>
                </li>
                <li class="mx-6 my-6 md:my-0">
                    <a href="#" class="text-lg hover:text-cyan-500 duration-500">Narzędzia</a>
                </li>
                <li class="mx-6 my-6 md:my-0">
                    <a href="#" class="text-lg hover:text-cyan-500 duration-500">Cennik</a>
                </li>
            </ul>    
            
            @if (Route::has('login'))
                    @auth                            
                        <a href="{{ url('/dashboard') }}">
                            <button class="bg-blue-600 text-white duration-500 px-4 py-2 mx-4 hover:bg-blue-500 rounded text-lg">
                                Dashboard
                            </button>                           
                        </a>
                    @else                          
                        <a href="{{ route('login') }}">
                            <button class="bg-gray-100 duration-500 px-4 py-2 mx-4 hover:bg-blue-500 hover:text-white rounded text-lg">
                                Logowanie
                            </button>
                        </a>
                        @if (Route::has('register'))                               
                            <a href="{{ route('register') }}">
                                <button class="bg-blue-600 text-white duration-500 px-4 py-2 mx-4 hover:bg-blue-500 rounded text-lg">
                                    Rejestracja
                                </button>
                            </a>
                        @endif
                    @endauth
            @endif 
        </nav>

        <section id="home" class="md:px-40 relative">
            <div class="container flex flex-col-reverse lg:flex-row items-center gap-12 mt-14 lg:mt-28">
                <div class="flex flex-1 flex-col items-center lg:items-start">
                    <h2 class="text-3xl md:text-4 lg:text-5xl text-center lg:text-left mb-6 font-extrabold">
                        Erat dolores sea dolores lorem nonumy no invidunt rebum diam.
                    </h2>
                    <p class="text-lg text-center lg:text-left mb-6">
                        Kasd at kasd et ipsum stet aliquyam no est. Kasd amet tempor consetetur sit elitr et consetetur at. Aliquyam nonumy ut lorem sed eirmod eirmod, labore sit elitr dolore duo et magna dolores eirmod. Sit est lorem ea duo labore. Sanctus sit sed erat stet et diam diam, consetetur diam.
                    </p>
                    <div class="flex justify-center flex-wrap gap-6">
                            <button class="bg-blue-600 text-white duration-500 px-4 py-2 mx-4 hover:bg-blue-500 rounded text-lg">
                                Napisz do nas
                            </button>
                            <button class="bg-white duration-500 px-4 py-2 mx-4 hover:bg-blue-500 hover:text-white rounded text-lg border-2 border-gray-300">
                                Zamów demo
                            </button>
                    </div>
                </div>
                <div class="flex justify-center flex-1 mb-10 md:mb-16 lg:mb-0 z-10">
                    <img src="https://i.ibb.co/MMMB24P/Image-Container.png" alt="Image-Container" class="w-5/6 h-5/6 sm:h-3/4 sm:h-3/4 md:w-full md:h-full">
                </div>
            </div>
        </section>

    </body>
</html>