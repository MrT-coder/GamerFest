<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset( 'css/app.css' ) }}" rel="stylesheet">

</head>


@component('vistas.nav')@endcomponent

<body class="antialiased bg-gradient-to-r from-indigo-700 via-yellow-900 to-indigo-700">


    <!-- BIENVENIDA -->
    <div class="flex items-center justify-center h-full  text-white">
        <div class="p-56 text-center w-9/12">
            <h1 class="text-5xl font-bold mb-4">Bienvenido al mejor evento de videojuegos del Ecuador</h1>
            <p class="text-2xl m-3 ">
                Sumérgete en la emoción digital de los videojuegos y la competencia en línea. 
                <br>
                <span class = "font-extrabold text-5xl">INSCRÍBETE AHORA !!!</span>
            </p>
            <button class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full w-1/5">VER
                MÁS</button>
            <button
                class=" hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full ml-2 w-1/5 border-solid border-4 border-gray-600">INGRESAR</button>
        </div>
    </div>

<hr>
    <!-- JUEGOS -->
    <div  class="grid gap-4 grid-cols-7 content-center pt-8 h-screen m-4 text-white   ">

        @foreach ($juegos as $juego)
            <div class="hover:scale-110 mr-4 ">
                <img src="https://i.pinimg.com/550x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg" alt="" class="w-50 h-60 ">
                <p class="text-center">
                    <b>{{ $juego->nombre }}</b>
                </p>
                <p class="opacity-0 hover:opacity-100 text-center text-sm">
                    {{ $juego->descripcion }}
                <br>
                    <span class="font-extrabold"> Precio: {{$juego->costo}}$</span>
                </p>

            </div>
    @endforeach

    </div>


    <!-- INSCRIPCIÓN -->
    {{-- <div class="text-center bg-gray-800 text-white p-8 mt-8">
        <h2 class="text-2xl font-bold mb-4">Inscríbete ahora</h2>
        <p class="text-lg mb-6">Quedan 5 días, 8 horas y 11 segundos.</p>
        <button class="border-solid border-4 border-gray-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">INGRESAR</button>
    </div> --}}

</body>

</html>