<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GamerFest</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="antialiased">
    <section id="inicio">
        <div class="relative p-8 overflow-hidden text-center bg-fixed bg-center bg-no-repeat bg-cover md:p-12"
            style="background-image: url('img/bg_op1.jpg'); height: 750px ">
            <div class="absolute top-0 bottom-0 left-0 right-0 w-full h-full overflow-hidden bg-fixed"
                style="background-color: rgba(0, 0, 0, 0.6)">
                @component('vistas.nav')
                @endcomponent
                <section class="text-gray-40 body-font">
                    <div class="flex flex-col items-center px-10 py-5 text-center md:py-40 md:px-0">
                        <h1 class="mb-4 text-4xl font-medium text-white title-font">
                            Bienvenido al mejor evento de videojuegos del Ecuador
                        </h1>
                        <p class="mb-8 text-xl leading-relaxed text-white">
                            Sumérgete en la emoción digital de los videojuegos y la competencia en línea.
                        </p>
                        <div class="flex flex-col justify-center md:flex-row">
                            <a href="{{ route('login') }}">
                                <button
                                    class="px-6 py-2 m-1 text-lg text-white bg-purple-800 border-0 rounded hover:bg-purple-600 focus:outline-none">
                                    ¡Inscíbete ahora!
                                </button>
                            </a>
                            <a href="#juegos" class="self-center">
                                <button
                                    class="flex px-6 py-2 m-1 text-lg text-gray-400 bg-gray-800 border-0 rounded focus:outline-none hover:bg-gray-700 hover:text-white">
                                    Ver más
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <section class="text-gray-400 body-font" id="juegos">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col flex-wrap items-center w-full mb-20 text-center">
                <h1 class="mb-2 text-3xl font-medium text-white sm:text-3xl title-font">
                    Lista de Juegos
                </h1>
                <p class="w-full text-lg leading-relaxed lg:w-1/2 text-opacity-80">
                    A continuación encontrarás la lista de juegos a los que puedes inscribirte. ¡No te quedes sin jugar!
                </p>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($juegos as $juego)
                    <div class="h-full p-4">
                        <div class="relative h-full">
                            <div class="relative p-6 border border-gray-700 rounded-lg"
                                style="background-image: url('{{ asset('storage/' . str_replace('public/', '', $juego->ruta_foto_portada)) }}'); background-size: cover; background-position: center;">
                                <div class="absolute inset-0 bg-black rounded-lg opacity-75"></div>
                                <div class="relative" style="padding-bottom: 133.33%;">
                                    <img class="absolute inset-0 object-cover w-full h-full rounded-lg filter brightness-100"
                                        src="{{ asset('storage/' . str_replace('public/', '', $juego->ruta_foto_principal)) }}"
                                        alt="Foto Juego">
                                </div>
                                <h2 class="relative z-10 my-2 text-lg font-medium text-white title-font">
                                    {{ $juego->nombre }}
                                </h2>
                                <p class="relative z-10 text-base leading-relaxed">
                                    {{ $juego->descripcion }}
                                </p>
                                <div class="relative z-10 flex flex-col justify-between mt-4">
                                    <span class="text-sm font-medium text-white">
                                        <b>Modalidad:</b> {{ $juego->modalidad }}
                                    </span>
                                    <span class="text-sm font-medium text-white">
                                        <b>Costo:</b> ${{ $juego->costo }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('login') }}" class="flex justify-center">
                <button
                    class="px-6 py-2 m-1 text-lg text-white bg-purple-800 border-0 rounded hover:bg-purple-600 focus:outline-none">
                    ¡Inscíbete ahora!
                </button>
            </a>
    </section>

    <section id="contador">
        <div class="bg-gradient-to-r from-blue-400 via-rose-900 to-indigo-500">
            <div class="bg-black bg-opacity-70">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('img/logoGamerFest.png') }}" alt="Logo GamerFest" class="max-h-32">
                        <div class="flex flex-col">
                            <h1 class="mt-5 text-3xl font-bold text-center text-white md:text-7xl">
                                Pronto iniciará el<br><span class="text-yellow-300">GamerFest</span>
                            </h1>
                            <div class="flex flex-col items-center mt-12 ml-2">
                                <p class="text-sm text-gray-300 uppercase">
                                    Tiempo restante para la emoción
                                </p>
                                <div class="flex flex-col items-center justify-center mt-4 md:flex-row"
                                    x-data="timer(new Date().setDate(new Date().getDate() + 1))" x-init="init();">
                                    <div class="flex flex-col items-center px-4">
                                        <span id="days" class="text-4xl text-gray-200 lg:text-5xl">
                                            00
                                        </span>
                                        <span class="mt-2 text-gray-400">
                                            Dias
                                        </span>
                                    </div>
                                    <span class="h-[1px] w-[100px] my-1 md:w-[1px] md:h-24 bg-gray-400"></span>
                                    <div class="flex flex-col items-center px-4">
                                        <span id="hours" class="text-4xl text-gray-200 lg:text-5xl">
                                            00
                                        </span>
                                        <span class="mt-2 text-gray-400">
                                            Horas
                                        </span>
                                    </div>
                                    <span class="h-[1px] w-[100px] my-1 md:w-[1px] md:h-24 bg-gray-400"></span>
                                    <div class="flex flex-col items-center px-4">
                                        <span id="minutes" class="text-4xl text-gray-200 lg:text-5xl">
                                            00
                                        </span>
                                        <span class="mt-2 text-gray-400">
                                            Minutos
                                        </span>
                                    </div>
                                    <span class="h-[1px] w-[100px] my-1 md:w-[1px] md:h-24 bg-gray-400"></span>
                                    <div class="flex flex-col items-center px-4">
                                        <span id="seconds" class="text-4xl text-gray-200 lg:text-5xl">
                                            00
                                        </span>
                                        <span class="mt-2 text-gray-400">
                                            Segundos
                                        </span>
                                    </div>
                                </div>
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
                    const countdownDate = new Date('03 30, 2024 00:00:00').getTime();

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
    <footer class="relative flex flex-col items-center h-screen p-8 overflow-hidden text-white bg-cyan-900 md:py-40"
        id="sobrenosotros">
        <div class="relative z-[1] container m-auto px-6 md:px-12 text-lg items-center">
            <div class="m-auto md:w-10/12 lg:w-8/12 xl:w-6/12">
                <div class="flex flex-wrap items-center justify-between md:flex-nowrap">
                    <div class="flex justify-center w-full space-x-12 text-gray-300 sm:w-7/12 md:justify-start">
                        <ul class="space-y-8 list-disc list-inside">
                            <li><a href="#inicio" class="transition hover:text-sky-400">Inicio</a></li>
                            <li><a href="#juegos" class="transition hover:text-sky-400">Juegos</a></li>
                            <li><a href="#cuenta" class="transition hover:text-sky-400">Cuenta Regresiva</a></li>
                        </ul>

                        <ul role="list" class="space-y-8">
                            <li>
                                <a href="https://github.com/MrT-coder/GamerFest"
                                    class="flex items-center space-x-3 transition hover:text-sky-400">
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
                    <div class="w-10/12 m-auto mt-16 space-y-6 text-center sm:text-left sm:w-5/12 sm:mt-auto">
                        <span class="block font-bold text-gray-300">Un evento organizado por la Universidad de las
                            Fuerzas
                            Armadas ESPE.</span>

                        <p>La universidad de las Fuerzas Armadas ESPE, presenta uno de los eventos mas grandes a nivel
                            universitario, donde se reunen estudiantes de todas las Carreras y Universidades. Te
                            invitamos a disfrutar de los días mas emocionantes y divertidos junto a nosotros!!!.</p>
                        <span class="block text-gray-300">Grupo 5 &copy; 2023</span>

                    </div>
                </div>
            </div>
        </div>
        <div aria-hidden="true" class="absolute inset-0 w-screen h-screen opacity-80"></div>
    </footer>

</body>

</html>
