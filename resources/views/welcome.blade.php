<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .text-center {
            text-align: center;
        }

        .bg-gray-800 {
            --tw-bg-opacity: 1;
            background-color: rgb(31 41 55 / var(--tw-bg-opacity));
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }

        .text-white {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }

        .p-8 {
            padding: 2rem;
        }

        .pt-8 {
            padding-top: 2rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .text-4xl {
            font-size: 2.25rem;
        }

        .text-lg {
            font-size: 1.125rem;
        }

        .bg-blue-500 {
            --tw-bg-opacity: 1;
            background-color: rgb(59 130 246 / var(--tw-bg-opacity));
        }

        .hover\:bg-blue-700:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(48 99 204 / var(--tw-bg-opacity));
        }

        .bg-green-500 {
            --tw-bg-opacity: 1;
            background-color: rgb(16 185 129 / var(--tw-bg-opacity));
            border-radius: 0.375rem;
        }

        .hover\:bg-green-700:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(5 150 105 / var(--tw-bg-opacity));
        }

        .flex {
            display: flex;
            justify-content: center;
        }

        .flex-row {
            flex-direction: row;
        }

        .mt-8 {
            margin-top: 2rem;
        }

        .mr-4 {
            margin-right: 1rem;
        }

        .w-1-5 {
            width: 20%;
            max-width: 240px;
            height: auto;
        }

        .text-2xl {
            font-size: 1.5rem;
        }

        .mt-8 {
            margin-top: 2rem;
        }

        /* Animaciones */

        .overlay {
            position: relative;
            cursor: pointer;
        }

        .overlay img {
            width: 100%;
            height: auto;
        }

        .overlay .description {
            display: none;
            padding: 1rem;
            background-color: #333; 
            color: white;
        }

        .overlay:hover .description {
            display: block;
        }
    </style>
</head>

<body class="antialiased">

    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
        @endif
        @endauth
    </div>
    @endif

    <!-- BIENVENIDA -->
    <div class="text-center bg-gray-800 text-white p-8">
        <h1 class="text-4xl font-bold mb-4">Bienvenido al mejor evento de videojuegos del Ecuador</h1>
        <p class="text-lg mb-6">
            Sumérgete en la emoción digital: Bienvenido al epicentro gamer, el mejor evento de videojuegos del Ecuador!
        </p>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-4">VER MÁS</button>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4">INGRESAR</button>
    </div>

    <!-- JUEGOS -->
    <div class="flex flex-row pt-8">
        <div class="w-1-5 overlay mr-4">
            <img src="https://i.pinimg.com/550x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg" alt="Fortnite"
                class="w-1-5 mr-4">
            <p class="text-center">
                <b>FORTNITE</b>
            </p>
            <p class="description">
                Fortnite es un juego de Battle Royale que combina construcción y disparos. Los
                jugadores
                luchan entre sí para ser el último superviviente en un mapa que disminuye constantemente. La
                construcción de estructuras para protegerse y la colaboración en equipo son elementos clave.
            </p>
        </div>
        <div class="w-1-5 overlay mr-4">
            <img src="https://sm.ign.com/ign_es/screenshot/default/image003_ksqr.png" alt="Fifa 23" class="w-1-5 mr-4">
            <p class="text-center">
                <b>FIFA 23</b>
            </p>
            <p class="description">
                FIFA 23 es un juego de simulación de fútbol que recrea la experiencia del deporte en un
                entorno virtual. Los jugadores pueden controlar equipos y participar en partidos realistas. FIFA es
                conocido por sus gráficos impresionantes, jugabilidad auténtica y modos de juego variados, incluyendo
                carreras de jugadores y gestión de equipos.
            </p>
        </div>

        <div class="w-1-5 overlay mr-4">
            <img src="https://theme.zdassets.com/theme_assets/43400/87a1ef48e43b8cf114017e3ad51b801951b20fcf.jpg"
                alt="LOL" class="w-1-5 mr-4">
            <p class="text-center">
                <b>LEAGUE OF LEGENDS</b>
            </p>
            <p class="description">
                League of Legends es un MOBA en el que dos equipos compiten para destruir la base del otro.
                Los jugadores seleccionan campeones con habilidades únicas y trabajan en equipo para conquistar
                territorio y derrotar a los oponentes. Es conocido por su gran comunidad y escena competitiva.
            </p>
        </div>
        <div class="w-1-5 overlay mr-4">
            <img src="https://assetsio.reedpopcdn.com/co1mb7.jpg?width=1200&height=1200&fit=bounds&quality=70&format=jpg&auto=webp"
                alt="Clash Royal" class="w-1-5 mr-4">
            <p class="text-center">
                <b>CLASH ROYALE</b>
            </p>
            <p class="description">
                Clash Royale combina elementos de juegos de cartas coleccionables, defensa de torres y
                estrategia en tiempo real. Los jugadores construyen mazos de cartas, despliegan unidades y hechizos en
                un campo de juego, y luchan contra sus oponentes para destruir torres y el castillo del rey.
            </p>
        </div>
        <div class="w-1-5 overlay mr-4">
            <img src="https://cdn1.epicgames.com/offer/cbd5b3d310a54b12bf3fe8c41994174f/EGS_VALORANT_RiotGames_S2_1200x1600-9ebf575033287e2177106da5ff45c1d4"
                alt="Valorant" class="w-1-5">
                <p class= "text-center">
                <b >VALORANT</b> 
                </p>
            <p class="description">
                Valorant es un juego de disparos táctico donde dos equipos compiten para completar
                objetivos. Cada jugador elige un personaje con habilidades únicas, lo que agrega un elemento
                estratégico. El juego se destaca por su énfasis en la precisión y el trabajo en equipo.
            </p>
        </div>

        <div class="w-1-5 overlay mr-4">
            <img src="https://cdn1.epicgames.com/offer/cbd5b3d310a54b12bf3fe8c41994174f/EGS_VALORANT_RiotGames_S2_1200x1600-9ebf575033287e2177106da5ff45c1d4"
                alt="Valorant" class="w-1-5">
                <p class= "text-center">
                <b >VALORANT</b> 
                </p>
            <p class="description">
                Valorant es un juego de disparos táctico donde dos equipos compiten para completar
                objetivos. Cada jugador elige un personaje con habilidades únicas, lo que agrega un elemento
                estratégico. El juego se destaca por su énfasis en la precisión y el trabajo en equipo.
            </p>
        </div>
        <div class="w-1-5 overlay mr-4">
            <img src="https://cdn1.epicgames.com/offer/cbd5b3d310a54b12bf3fe8c41994174f/EGS_VALORANT_RiotGames_S2_1200x1600-9ebf575033287e2177106da5ff45c1d4"
                alt="Valorant" class="w-1-5">
                <p class= "text-center">
                <b >VALORANT</b> 
                </p>
            <p class="description">
                Valorant es un juego de disparos táctico donde dos equipos compiten para completar
                objetivos. Cada jugador elige un personaje con habilidades únicas, lo que agrega un elemento
                estratégico. El juego se destaca por su énfasis en la precisión y el trabajo en equipo.
            </p>
        </div>

        <div class="w-1-5 overlay mr-4">
            <img src="https://cdn1.epicgames.com/offer/cbd5b3d310a54b12bf3fe8c41994174f/EGS_VALORANT_RiotGames_S2_1200x1600-9ebf575033287e2177106da5ff45c1d4"
                alt="Valorant" class="w-1-5">
                <p class= "text-center">
                <b >VALORANT</b> 
                </p>
            <p class="description">
                Valorant es un juego de disparos táctico donde dos equipos compiten para completar
                objetivos. Cada jugador elige un personaje con habilidades únicas, lo que agrega un elemento
                estratégico. El juego se destaca por su énfasis en la precisión y el trabajo en equipo.
            </p>
        </div>
        
    </div>

    <!-- INSCRIPCIÓN -->
    <div class="text-center bg-gray-800 text-white p-8 mt-8">
        <h2 class="text-2xl font-bold mb-4">Inscríbete ahora</h2>
        <p class="text-lg mb-6">TIMER</p>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4">INGRESAR</button>
    </div>

</body>

</html>