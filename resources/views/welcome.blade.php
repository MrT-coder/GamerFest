<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>



<body class="antialiased scroll-smooth">


    <section id="inicio">
        <div class="relative overflow-hidden bg-cover bg-center bg-no-repeat p-8 md:p-12 text-center bg-fixed"
            style="background-image: url('img/bg_op1.jpg'); height: 750px ">
            <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
                style="background-color: rgba(0, 0, 0, 0.6)">
                @component('vistas.nav')
                @endcomponent
                <div class="flex h-full items-center justify-center">
                    <div class="text-white">
                        <h2 class="mb-2 text-2xl md:mb-4 md:text-4xl lg:text-5xl font-semibold">Bienvenido al mejor
                            evento de videojuegos del Ecuador</h2>
                        <h4 class="mb-4 text-lg md:mb-6 md:text-xl lg:text-2xl font-semibold">Sumérgete en la emoción
                            digital de los videojuegos y la competencia en línea.
                            <br>
                            <span class="font-extrabold text-3xl sm:text-5xl md:text-6xl">INSCRÍBETE AHORA !!!</span>
                        </h4>
                        <a href="{{ route('login') }}"
                            class="bg-purple-800 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-full transition-all duration-300 border-2 border-transparent hover:border-white focus:outline-none focus:ring focus:border-purple-300">
                            INSCRIBIRSE
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section
        class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 content-center p-8 h-5/6 bg-black"
        id="juegos">
        @foreach ($juegos as $juego)
            <div>
                <div class="group 
  overflow-hidden
   relative shadow-lg max-w-xs">
                    <img class="block group-hover:opacity-40 transition-opacity duration-700"
                        src="https://i.pinimg.com/550x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg" />
                    <div
                        class="absolute bg-black flex items-center group-hover:-top-0 group-hover:opacity-100 duration-700 top-full right-0 w-full opacity-0 h-1/2 transition-all">
                        <div class=""
                            style="background-image: url(&quot;https://cdn.cloudflare.steamstatic.com/steam/apps/230410/ss_2d79448091149a8cc790b62e7422615a011d015a.600x338.jpg?t=1637183731&quot;);">

                            <div class="w-full aspect-w-16 aspect-h-9">
                                <iframe class="w-full h-full"
                                    src="https://www.youtube.com/embed/6Mtfo8asqjM?autoplay=1&loop=1&mute=1"
                                    frameborder="0" allow="autoplay; encrypted-media"></iframe>
                            </div>


                        </div>
                    </div>
                    <div
                        class="absolute  bg-gradient-to-br duration-700 bg-gradient-to-r from-indigo-900 via-violet-500 to-purple-900 text-white block left-0 right-0 top-full text-base h-1/2 w-full opacity-50 
    transition-all group-hover:top-1/2 group-hover:opacity-100">
                        <div class="py-4 text-xs px-7">
                            <div class="text-xl font-bold text-center uppercase">{{ $juego->nombre }}</div>
                            <div class="overflow-ellipsis overflow-hidden ">
                                <p class="text-center">{{ $juego->descripcion }}</p>
                            </div>
                            <div class="whitespace-nowrap overflow-hidden overflow-ellipsis relative z-20">
                                <span
                                    class="uppercase font-bold text-white whitespace-nowrap text-xs md:text-sm">Modalidad:</span>
                                <span class="whitespace-nowrap overflow-hidden overflow-ellipsis relative z-20 text-sm">
                                    {{ $juego->modalidad }}
                                </span>
                            </div>
                            <div class="font-bold whitespace-nowrap overflow-hidden overflow-ellipsis relative z-20">
                                <span class="uppercase text-white whitespace-nowrap text-xs md:text-sm">Costo:</span>
                                <span class="whitespace-nowrap  overflow-hidden overflow-ellipsis relative z-20">
                                    <span class="text-sm">
                                        {{ $juego->costo }} $ </span>
                                </span>
                            </div>
                        </div>
                        <div class="absolute left-0  pl-7 pt-1">
                            <a href="{{ route('login') }}"
                                class="bg-purple-800 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-full transition-all duration-300 border-2 border-transparent hover:border-white focus:outline-none focus:ring focus:border-purple-300 text-sm">
                                Inscríbete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </section>

    {{-- Contador --}}
    <section id="cuenta">
        <div class="w-50 h-50 bg-gradient-to-r from-blue-400 via-rose-900 to-indigo-500">
            <div class="w-50 h-50 bg-black bg-opacity-70">
                <div
                    class="w-full h-full flex flex-col items-start justify-between container mx-auto py-8 px-8 lg:px-4 xl:px-0">
                    <img src="{{ asset('img/logoGamerFest.png') }}" alt="" class="flex-initial">
                    <div class="flex-1 flex flex-col items-start justify-center">

                        <h1
                            class="text-6xl lg:text-7xl xl:text-8xl text-gray-200 tracking-wider font-bold font-serif mt-12 text-center md:text-left">
                            Pronto iniciara el <span class="text-yellow-300">GamerFest</span> </h1>
                        <div class="mt-12 flex flex-col items-center mt-8 ml-2">
                            <p class="text-gray-300 uppercase text-sm">Tiempo restante para la emoción </p>
                            <div class="flex items-center justify-center space-x-4 mt-4" x-data="timer(new Date().setDate(new Date().getDate() + 1))"
                                x-init="init();">
                                <div class="flex flex-col items-center px-4">
                                    <span id="days" class="text-4xl lg:text-5xl text-gray-200">00</span>
                                    <span class="text-gray-400 mt-2">Dias</span>
                                </div>
                                <span class="w-[1px] h-24 bg-gray-400"></span>
                                <div class="flex flex-col items-center px-4">
                                    <span id="hours" class="text-4xl lg:text-5xl text-gray-200">00</span>
                                    <span class="text-gray-400 mt-2">Horas</span>
                                </div>
                                <span class="w-[1px] h-24 bg-gray-400"></span>
                                <div class="flex flex-col items-center px-4">
                                    <span id="minutes" class="text-4xl lg:text-5xl text-gray-200">00</span>
                                    <span class="text-gray-400 mt-2">Minutos</span>
                                </div>
                                <span class="w-[1px] h-24 bg-gray-400"></span>
                                <div class="flex flex-col items-center px-4">
                                    <span id="seconds" class="text-4xl lg:text-5xl text-gray-200">00</span>
                                    <span class="text-gray-400 mt-2">Segundos</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        const $days = document.getElementById('days'),
                            $hours = document.getElementById('hours'),
                            $minutes = document.getElementById('minutes'),
                            $seconds = document.getElementById('seconds'),
                            $finalMessage = document.querySelector('.final-sms');

                        //Fecha a futuro
                        const countdownDate = new Date('01 30, 2024 00:00:00').getTime();

                        let interval = setInterval(function() {
                            //Obtener fecha actual y milisegundos
                            const now = new Date().getTime();

                            //Obtener las distancias entre ambas fechas
                            let distance = countdownDate - now;

                            //Calculos a dias-horas-minutos-segundos
                            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            let seconds = Math.floor((distance % (1000 * 60)) / (1000));

                            //Escribimos resultados
                            $days.innerHTML = days;
                            $hours.innerHTML = hours;
                            $minutes.innerHTML = minutes;
                            $seconds.innerHTML = ('0' + seconds).slice(-2);

                            //Cuando llegue a 0
                            if (distance < 0) {
                                clearInterval(interval);
                                $finalMessage.style.transform = 'translateY(0)';
                            }
                        }, 1000);
                    </script>


    </section>

    {{-- Footer --}}

    <!-- component -->
    <footer class="relative flex flex-col items-center bg-cyan-900 h-screen overflow-hidden md:py-40 text-white p-8"
        id="sobrenosotros">
        <div class="relative z-[1] container m-auto px-6 md:px-12 text-lg items-center">
            <div class="m-auto md:w-10/12 lg:w-8/12 xl:w-6/12">
                <div class="flex flex-wrap items-center justify-between md:flex-nowrap">
                    <div class="w-full space-x-12 flex justify-center text-gray-300 sm:w-7/12 md:justify-start">
                        <ul class="list-disc list-inside space-y-8">
                            <li><a href="#inicio" class="hover:text-sky-400 transition">Inicio</a></li>
                            <li><a href="#juegos" class="hover:text-sky-400 transition">Juegos</a></li>
                            <li><a href="#cuenta" class="hover:text-sky-400 transition">Cuenta Regresiva</a></li>
                        </ul>

                        <ul role="list" class="space-y-8">
                            <li>
                                <a href="#" class="flex items-center space-x-3 hover:text-sky-400 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                    </svg>
                                    <span>Github</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-10/12 m-auto  mt-16 space-y-6 text-center sm:text-left sm:w-5/12 sm:mt-auto">
                        <span class="block text-gray-300 font-bold">Un evento organizado por la Universidad de las Fuerzas
                            Armadas ESPE.</span>

                        <p>La universidad de las Fuerzas Armadas ESPE, presenta uno de los eventos mas grandes a nivel universitario, donde se reunen estudiantes de todas las Carreras y Universidades. Te invitamos a disfrutar de los días mas emocionantes y divertidos junto a nosotros!!!.</p>
                        <span class="block text-gray-300">Grupo 5 &copy; 2023</span>

                    </div>
                </div>
            </div>
        </div>
        <div aria-hidden="true" class="absolute h-screen inset-0 flex items-center">
            <div aria-hidden="true"
                class="bg-layers bg-scale w-56 h-56 m-auto blur-xl bg-gradient-to-r from-blue-900 via-rose-900 to-indigo-500 rounded-full md:w-[30rem] md:h-[30rem] md:blur-3xl">
            </div>
        </div>
        <div aria-hidden="true" class="absolute inset-0 w-screen h-screen bg-[#020314] opacity-80"></div>
    </footer>




</body>

</html>
