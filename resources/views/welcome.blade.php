<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
 <link href="{{ asset( 'css/app.css' ) }}" rel="stylesheet"> 
    <script src="https://cdn.tailwindcss.com"></script>

</head>

@component('vistas.nav')@endcomponent
<body class="antialiased">
    
    <!-- BIENVENIDA -->
    <div class="text-center bg-gray-800 text-white p-8">
        <h1 class="text-4xl font-bold mb-4">Bienvenido al mejor evento de videojuegos del Ecuador</h1>
        <p class="text-lg mb-6">
            Sumérgete en la emoción digital: Bienvenido al epicentro gamer, el mejor evento de videojuegos del Ecuador!
        </p>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">VER MÁS</button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full ">INGRESAR</button>
    </div>

    <!-- JUEGOS -->
    <div class="flex flex-row pt-8">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="https://i.pinimg.com/550x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg"
                alt=Fornite">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">FORTNITE</div>
                <p class="text-gray-700 text-base ">
                    Fortnite es un juego de Battle Royale que combina construcción y disparos. Los
                    jugadores
                    luchan entre sí para ser el último superviviente en un mapa que disminuye constantemente. La
                    construcción de estructuras para protegerse y la colaboración en equipo son elementos clave.
                </p>
            </div>
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
            <p class="text-center">
                <b>VALORANT</b>
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
            <p class="text-center">
                <b>VALORANT</b>
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
            <p class="text-center">
                <b>VALORANT</b>
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
            <p class="text-center">
                <b>VALORANT</b>
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
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">INGRESAR</button>
    </div>

</body>
</html>