<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

@component('vistas.nav')@endcomponent

<body class="antialiased bg-black">

    <!-- BIENVENIDA -->
    <section class="flex items-center justify-center h-screen text-white bg-black">
        <div class="p-8 text-center sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3">
            <h1 class="text-4xl sm:text-5xl font-bold mb-4">Bienvenido al mejor evento de videojuegos del Ecuador</h1>
            <p class="text-lg sm:text-2xl m-3">
                Sumérgete en la emoción digital de los videojuegos y la competencia en línea.
                <br>
                <span class="font-extrabold text-3xl sm:text-5xl">INSCRÍBETE AHORA !!!</span>
            </p>
            <div class="flex justify-center mt-4 space-x-4">
                <button class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full w-full sm:w-1/2">VER MÁS</button>
                <button class="hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full w-full sm:w-1/2 border-solid border-4 border-gray-600">INGRESAR</button>
            </div>
        </div>
    </section>

    <!-- JUEGOS -->
    <section class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 content-center pt-8 m-4 text-white">

        @foreach ($juegos as $juego)
            <div class="hover:scale-110 mb-8 bg-gray-800 rounded-lg overflow-hidden transition duration-300 ease-in-out transform hover:opacity-75">
                <img src="https://i.pinimg.com/550x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg" alt="{{ $juego->nombre }}" class="w-full h-64 object-cover">
                <div class="p-4">
                    <p class="text-center mt-4 text-xl font-bold">{{ $juego->nombre }}</p>
                    <div class="opacity-0 hover:opacity-100 transition duration-300 ease-in-out">
                        <p class="text-center text-sm">{{ $juego->descripcion }}</p>
                        <p class="text-center mt-2 font-bold">Precio: {{$juego->costo}}$</p>
                    </div>
                </div>
            </div>
        @endforeach

    </section>

</body>

</html>
