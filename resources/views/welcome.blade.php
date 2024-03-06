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

    <section class="text-gray-400 body-font bg-game" id="juegos">
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

    <section class="text-gray-400 bg-gray-900 body-font">
        <div class="container px-5 py-20 mx-auto">
            <div class="w-full mx-auto text-center xl:w-1/2 lg:w-3/4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="inline-block w-8 h-8 mb-8 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>
                <h2 class="text-lg font-medium tracking-wider text-white title-font">Un evento desarrollado por la
                    Universidad de las Fuerzas Armadas ESPE</h2>
                <span class="inline-block w-10 h-1 mt-8 mb-6 bg-indigo-500 rounded"></span>
                <p class="text-lg leading-relaxed">La Universidad de las Fuerzas Armadas ESPE se enorgullece en
                    presentar uno de los eventos más destacados a nivel universitario, convocando a estudiantes de
                    diversas carreras y universidades. Extendemos una cordial invitación para que te sumerjas en
                    jornadas llenas de emoción y diversión. Únete a nosotros y experimenta momentos inolvidables
                    mientras compartes con la vibrante comunidad estudiantil. ¡Te esperamos para celebrar juntos esta
                    experiencia única!</p>
            </div>
        </div>
    </section>

    <footer class="text-gray-400 bg-gray-900 body-font">
        <div
            class="container flex flex-col flex-wrap px-5 py-24 mx-auto md:items-center lg:items-start md:flex-row md:flex-nowrap">
            <div class="flex-shrink-0 w-64 mx-auto mt-10 text-center md:mx-0 md:mt-0">
                <a class="flex items-center justify-center font-medium text-white title-font md:justify-start">
                    <img src="{{ asset('img/logoGamerFest.png') }}" alt="Logo GamerFest" class="mx-auto max-h-28">
                </a>
                <p class="mt-2 text-sm text-gray-500">El mejor evento de videojuegos del Ecuador</p>
            </div>
            <div class="flex flex-wrap flex-grow order-first -mb-10 text-center md:pr-20 md:text-left">
                <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                    <h2 class="mb-3 text-sm font-medium tracking-widest text-white title-font">PÁGINA PRINCIPAL</h2>
                    <nav class="mb-10 list-none">
                        <li>
                            <a class="text-gray-400 hover:text-white" href="#inicio">Inicio</a>
                        </li>
                        <li>
                            <a class="text-gray-400 hover:text-white" href="#juegos">Juegos</a>
                        </li>
                    </nav>
                </div>
            </div>
        </div>
        <div class="bg-gray-800 bg-opacity-75">
            <div class="container flex flex-col flex-wrap px-5 py-4 mx-auto sm:flex-row">
                <p class="text-sm text-center text-gray-400 sm:text-left">© 2023 GamerFest —
                    <span class="ml-1 text-gray-500">Grupo 5</span>
                </p>
                <span class="inline-flex justify-center mt-2 sm:ml-auto sm:mt-0 sm:justify-start">
                    <a class="flex ml-3 text-gray-400" href="https://github.com/MrT-coder/GamerFest">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5" viewBox="0 0 16 16">
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                        </svg>
                        <span class="ml-2">GitHub</span>
                    </a>
                </span>
            </div>
        </div>
    </footer>

</body>

</html>