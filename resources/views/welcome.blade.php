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
    

    <scriptv src="resources\js\inicio.js"></script>
</head>



<body class="antialiased scroll-smooth">


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
                <a href="https://github.com/MrT-coder/GamerFest" class="text-white hover:text-white mx-2">
                    <i class="fab fa-github"></i>
                </a>
            </div>
        </div>
    </footer>



    {{-- <section class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 content-center pt-8 m-4 text-white">

        @foreach ($juegos as $juego)
            <!-- <div class="hover:scale-110 mb-8 bg-gray-800 rounded-lg overflow-hidden transition duration-300 ease-in-out transform hover:opacity-75">
                <img src="https://i.pinimg.com/550x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg" alt="{{ $juego->nombre }}" class="w-full h-64 object-cover">
                <div class="p-4">
                    <p class="text-center mt-4 text-xl font-bold">{{ $juego->nombre }}</p>
                    <div class="opacity-0 hover:opacity-100 transition duration-300 ease-in-out">
                        <p class="text-center text-sm">{{ $juego->descripcion }}</p>
                        <p class="text-center mt-2 font-bold">Precio: {{$juego->costo}}$</p>
                    </div>
                </div>
            </div>  -->

            <div class="group before:hover:scale-95 before:hover:h-72 before:hover:w-80 before:hover:h-44 before:hover:rounded-b-2xl before:transition-all before:duration-500 before:content-[''] before:w-80 before:h-24 before:rounded-t-2xl before:bg-gradient-to-bl from-sky-200 via-black-200 to-purple-700 before:absolute before:top-0 w-80 h-72 relative bg-slate-50 flex flex-col items-center justify-center gap-2 text-center rounded-2xl overflow-hidden">
                <div class="w-28 h-28 bg-blue-700 mt-8 rounded-full border-4 border-slate-50 z-10 group-hover:scale-150 group-hover:-translate-x-24  group-hover:-translate-y-20 transition-all duration-500">
                    <img src="https://sm.ign.com/ign_es/screenshot/default/image003_ksqr.png" alt="Fortnite Image" class="w-full h-full object-cover rounded-full" />                     
                </div>
                
                <div class="z-10  group-hover:-translate-y-10 transition-all duration-500">
                    <span class="text-2xl font-semibold">{{ $juego->nombre }}</span>
                    <p>{{ $juego->descripcion }} </p>
                </div>
                <a class="bg-blue-700 px-4 py-1 text-slate-50 rounded-md z-10 hover:scale-125 transition-all duration-500 hover:bg-blue-500" href="#">Precio: {{$juego->costo}}$</a>
                </div>
            </div>

            <div class="group before:hover:scale-95 before:hover:h-72 before:hover:w-80 before:hover:h-44 before:hover:rounded-b-2xl before:transition-all before:duration-500 before:content-[''] before:w-80 before:h-24 before:rounded-t-2xl before:bg-gradient-to-bl from-sky-200 via-black-200 to-purple-700 before:absolute before:top-0 w-80 h-72 relative bg-slate-50 flex flex-col items-center justify-center gap-2 text-center rounded-2xl overflow-hidden">
                <div class="w-28 h-28 bg-blue-700 mt-8 rounded-full border-4 border-slate-50 z-10 group-hover:scale-150 group-hover:-translate-x-24  group-hover:-translate-y-20 transition-all duration-500">
                    <img src="https://i.pinimg.com/550x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg" alt="Fortnite Image" class="w-full h-full object-cover rounded-full" />                     
                </div>
                
                <div class="z-10  group-hover:-translate-y-10 transition-all duration-500">
                    <span class="text-2xl font-semibold">{{ $juego->nombre }}</span>
                    <p>{{ $juego->descripcion }} </p>
                </div>
                <a class="bg-blue-700 px-4 py-1 text-slate-50 rounded-md z-10 hover:scale-125 transition-all duration-500 hover:bg-blue-500" href="#">Precio: {{$juego->costo}}$</a>
                </div>
            </div>
        @endforeach

    </section>
        <div class="transform hover:scale-110 mr-4">
        <div class="group before:hover:scale-95 before:hover:h-72 before:hover:w-80 before:hover:h-44 before:hover:rounded-b-2xl before:transition-all before:duration-500 before:content-[''] before:w-80 before:h-24 before:rounded-t-2xl before:bg-gradient-to-bl from-sky-200 via-orange-200 to-orange-700 before:absolute before:top-0 w-80 h-72 relative bg-slate-50 flex flex-col items-center justify-center gap-2 text-center rounded-2xl overflow-hidden">
        <div class="w-28 h-28 bg-blue-700 mt-8 rounded-full border-4 border-slate-50 z-10 group-hover:scale-150 group-hover:-translate-x-24  group-hover:-translate-y-20 transition-all duration-500">
        <img src="https://i.pinimg.com/550x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg" alt="Fortnite Image" class="w-full h-full object-cover rounded-full" />
        </div>
        <div class="z-10  group-hover:-translate-y-10 transition-all duration-500">
        <span class="text-2xl font-semibold">FORNITE</span>
        <p>Fortnite es un juego de Battle Royale que combina construcción y disparos. </p>
        </div>
        <a class="bg-blue-700 px-4 py-1 text-slate-50 rounded-md z-10 hover:scale-125 transition-all duration-500 hover:bg-blue-500" href="#">Inscibete</a>
        </div>
        
    </div>

    
      

       <!--
         <div class="hover:scale-110 mr-4 ">
            <img src="https://i.pinimg.com/550x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg" alt="Fifa 23" class="w-56 h-64 ">
            <p class="text-center">
                <b>FORTNITE</b>
            </p>
            <p class="opacity-0 hover:opacity-100 text-center text-sm">
            Fortnite es un juego de Battle Royale que combina construcción y disparos. 
            </p>
        </div>
        -->
        <div class="hover:scale-110  mr-4">
            <img src="https://sm.ign.com/ign_es/screenshot/default/image003_ksqr.png" alt="Fifa 23"  class="w-56 h-64">
            <p class="text-center">
                <b>FIFA 23</b>
            </p>
            <p class="opacity-0 hover:opacity-100 text-center text-sm">
                FIFA 23 es un juego de simulación de fútbol que recrea la experiencia del deporte en un
                entorno virtual. 
            </p>
        </div>

        <div class="hover:scale-110 mr-4">
            <img src="https://theme.zdassets.com/theme_assets/43400/87a1ef48e43b8cf114017e3ad51b801951b20fcf.jpg"
                alt="LOL"  class="w-56 h-64">
            <p class="text-center">
                <b>LEAGUE OF LEGENDS</b>
            </p>
            <p class="opacity-0 hover:opacity-100 text-center text-sm">
                League of Legends es un MOBA en el que dos equipos compiten para destruir la base del otro.

            </p>
        </div>

        <div class="hover:scale-110  mr-4">
            <img src="https://assetsio.reedpopcdn.com/co1mb7.jpg?width=1200&height=1200&fit=bounds&quality=70&format=jpg&auto=webp"
                alt="Clash Royal"  class="w-56 h-64">
            <p class="text-center">
                <b>CLASH ROYALE</b>
            </p>
            <p class="opacity-0 hover:opacity-100 text-center text-sm">
                Clash Royale combina elementos de juegos de cartas coleccionables, defensa de torres y
                estrategia en tiempo real. 
            </p>
        </div>
        <div class="hover:scale-110 mr-4">
            <img src="https://cdn1.epicgames.com/offer/cbd5b3d310a54b12bf3fe8c41994174f/EGS_VALORANT_RiotGames_S2_1200x1600-9ebf575033287e2177106da5ff45c1d4"
                alt="Valorant"  class="w-56 h-64">
            <p class="text-center">
                <b>VALORANT</b>
            </p>
            <p class="opacity-0 hover:opacity-100 text-center text-sm">
                Valorant es un juego de disparos táctico donde dos equipos compiten para completar
                objetivos. 
            </p>
        </div>

        <div class="hover:scale-110 mr-4">
            <img src="https://cdn1.epicgames.com/offer/cbd5b3d310a54b12bf3fe8c41994174f/EGS_VALORANT_RiotGames_S2_1200x1600-9ebf575033287e2177106da5ff45c1d4"
                alt="Valorant"  class="w-56 h-64">
            <p class="text-center">
                <b>VALORANT</b>
            </p>
            <p class="opacity-0 hover:opacity-100 text-center text-sm">
                Valorant es un juego de disparos táctico donde dos equipos compiten para completar
                objetivos. 
            </p>
        </div>
        <div class="hover:scale-110  mr-4">
            <img src="https://cdn1.epicgames.com/offer/cbd5b3d310a54b12bf3fe8c41994174f/EGS_VALORANT_RiotGames_S2_1200x1600-9ebf575033287e2177106da5ff45c1d4"
                alt="Valorant"  class="w-56 h-64">
            <p class="text-center">
                <b>VALORANT</b>
            </p>
            <p class="opacity-0 hover:opacity-100 text-center text-sm">
                Valorant es un juego de disparos táctico donde dos equipos compiten para completar
                objetivos.
            </p>
        </div>

        <div class="hover:scale-110  mr-4">
            <img src="https://cdn1.epicgames.com/offer/cbd5b3d310a54b12bf3fe8c41994174f/EGS_VALORANT_RiotGames_S2_1200x1600-9ebf575033287e2177106da5ff45c1d4"
                alt="Valorant"  class="w-56 h-64">
            <p class="text-center">
                <b>VALORANT</b>
            </p>
            <p class="opacity-0 hover:opacity-100 text-center text-sm">
                Valorant es un juego de disparos táctico donde dos equipos compiten para completar
                objetivos.
            </p>
        </div>

    </div>

    <hr>
    <!-- INSCRIPCIÓN -->
    {{-- <div class="text-center bg-gray-800 text-white p-8 mt-8">
        <h2 class="text-2xl font-bold mb-4">Inscríbete ahora</h2>
        <p class="text-lg mb-6">Quedan 5 días, 8 horas y 11 segundos.</p>
        <button class="border-solid border-4 border-gray-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">INGRESAR</button>
    </div> --}}


    <body>
    <div class="w-50 h-50" style="background-image: url('https://vojislavd.com/ta-template-demo/assets/img/coming-soon.jpg');">
        <div class="w-50 h-50 bg-black bg-opacity-70">
            <div class="w-full h-full flex flex-col items-start justify-between container mx-auto py-8 px-8 lg:px-4 xl:px-0">
                <div class="flex-1 flex flex-col items-start justify-center">
                    <h1 class="text-6xl lg:text-7xl xl:text-8xl text-gray-200 tracking-wider font-bold font-serif mt-12 text-center md:text-left">Pronto iniciara el <span class="text-yellow-300">GamerFest</span> </h1>
                    <div class="mt-12 flex flex-col items-center mt-8 ml-2">
                        <p class="text-gray-300 uppercase text-sm">Tiempo restante para el inicio </p>
                        <div class="flex items-center justify-center space-x-4 mt-4" x-data="timer(new Date().setDate(new Date().getDate() + 1))" x-init="init();">
                            <div class="flex flex-col items-center px-4">
                                <span x-text="time().days" class="text-4xl lg:text-5xl text-gray-200">00</span>
                                <span class="text-gray-400 mt-2">Dias</span>
                            </div>
                            <span class="w-[1px] h-24 bg-gray-400"></span>
                            <div class="flex flex-col items-center px-4">
                                <span x-text="time().hours" class="text-4xl lg:text-5xl text-gray-200">23</span>
                                <span class="text-gray-400 mt-2">Horas</span>
                            </div>
                            <span class="w-[1px] h-24 bg-gray-400"></span>
                            <div class="flex flex-col items-center px-4">
                                <span x-text="time().minutes" class="text-4xl lg:text-5xl text-gray-200">59</span>
                                <span class="text-gray-400 mt-2">Minutos</span>
                            </div>
                            <span class="w-[1px] h-24 bg-gray-400"></span>
                            <div class="flex flex-col items-center px-4">
                                <span x-text="time().seconds" class="text-4xl lg:text-5xl text-gray-200">28</span>
                                <span class="text-gray-400 mt-2">Segundos</span>
                            </div>
                        </div>                      
                    </div>       
                </div>
                <div class="w-full flex items-center justify-center md:justify-end">
                    <ul class="flex items-center space-x-4">
                        <li>
                            <a href="#" title="Facebook">
                                <svg class="w-8 h-8 hover:scale-110 transition duration-300" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 506.86 506.86"><defs><style>.cls-1{fill:#e2e8f0;}</style></defs><path class="cls-1" d="M506.86,253.43C506.86,113.46,393.39,0,253.43,0S0,113.46,0,253.43C0,379.92,92.68,484.77,213.83,503.78V326.69H149.48V253.43h64.35V197.6c0-63.52,37.84-98.6,95.72-98.6,27.73,0,56.73,5,56.73,5v62.36H334.33c-31.49,0-41.3,19.54-41.3,39.58v47.54h70.28l-11.23,73.26H293V503.78C414.18,484.77,506.86,379.92,506.86,253.43Z"></path><path class="cls-2" d="M352.08,326.69l11.23-73.26H293V205.89c0-20,9.81-39.58,41.3-39.58h31.95V104s-29-5-56.73-5c-57.88,0-95.72,35.08-95.72,98.6v55.83H149.48v73.26h64.35V503.78a256.11,256.11,0,0,0,79.2,0V326.69Z"></path></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="Twitter">
                                <svg class="w-8 h-8 hover:scale-110 transition duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 333333 333333" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"><path d="M166667 0c92048 0 166667 74619 166667 166667s-74619 166667-166667 166667S0 258715 0 166667 74619 0 166667 0zm90493 110539c-6654 2976-13822 4953-21307 5835 7669-4593 13533-11870 16333-20535-7168 4239-15133 7348-23574 9011-6787-7211-16426-11694-27105-11694-20504 0-37104 16610-37104 37101 0 2893 320 5722 949 8450-30852-1564-58204-16333-76513-38806-3285 5666-5022 12109-5022 18661v4c0 12866 6532 24246 16500 30882-6083-180-11804-1876-16828-4626v464c0 17993 12789 33007 29783 36400-3113 845-6400 1313-9786 1313-2398 0-4709-247-7007-665 4746 14736 18448 25478 34673 25791-12722 9967-28700 15902-46120 15902-3006 0-5935-184-8860-534 16466 10565 35972 16684 56928 16684 68271 0 105636-56577 105636-105632 0-1630-36-3209-104-4806 7251-5187 13538-11733 18514-19185l17-17-3 2z" fill="#e2e8f0"></path></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="LinkedIn">
                                <svg class="w-8 h-8 hover:scale-110 transition duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 333333 333333" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"><path d="M166667 0c92048 0 166667 74619 166667 166667s-74619 166667-166667 166667S0 258715 0 166667 74619 0 166667 0zm-18220 138885h28897v14814l418 1c4024-7220 13865-14814 28538-14814 30514-1 36157 18989 36157 43691v50320l-30136 1v-44607c0-10634-221-24322-15670-24322-15691 0-18096 11575-18096 23548v45382h-30109v-94013zm-20892-26114c0 8650-7020 15670-15670 15670s-15672-7020-15672-15670 7022-15670 15672-15670 15670 7020 15670 15670zm-31342 26114h31342v94013H96213v-94013z" fill="#e2e8f0"></path></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
    <script>
        function timer(expiry) {
            return {
                expiry: expiry,
                remaining:null,
                init() {
                this.setRemaining()
                setInterval(() => {
                    this.setRemaining();
                }, 1000);
                },
                setRemaining() {
                const diff = this.expiry - new Date().getTime();
                this.remaining =  parseInt(diff / 1000);
                },
                days() {
                return {
                    value:this.remaining / 86400,
                    remaining:this.remaining % 86400
                };
                },
                hours() {
                return {
                    value:this.days().remaining / 3600,
                    remaining:this.days().remaining % 3600
                };
                },
                minutes() {
                    return {
                    value:this.hours().remaining / 60,
                    remaining:this.hours().remaining % 60
                };
                },
                seconds() {
                    return {
                    value:this.minutes().remaining,
                };
                },
                format(value) {
                return ("0" + parseInt(value)).slice(-2)
                },
                time(){
                    return {
                    days:this.format(this.days().value),
                    hours:this.format(this.hours().value),
                    minutes:this.format(this.minutes().value),
                    seconds:this.format(this.seconds().value),
                }
                },
            }
        }
    </script>
</body>
</body>

</html>
