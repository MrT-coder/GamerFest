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
</head>



<body class="antialiased ">


    <section>
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
        class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 content-center p-8 h-5/6 bg-black">
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
    <section>

    </section>

{{-- Footer --}}
<footer class="bg-gray-800 text-white p-4">
    <div class="container mx-auto text-center">
        <p class="text-sm">© 2023 Grupo 5. Todos los derechos reservados.</p>
        <div class="mt-2">
            <a href="https://github.com/MrT-coder/GamerFest"  class="text-white hover:text-white mx-2">
                    <i class="fab fa-github"></i>
            </a>
        </div>
    </div>
</footer>



    {{-- <section class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 content-center pt-8 m-4 text-white">

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

    </section> --}}





</body>

</html>
