{{-- Navbar --}}
<style>
    .scroll-hidden::-webkit-scrollbar {
        height: 0px;
        background: transparent;
        /* make scrollbar transparent */
    }
</style>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<!-- ZOOM DE LA IMG -->
<style>
    .zoom-on-hover {
        transition: transform 0.3s ease-in-out;
        backface-visibility: hidden;
    }

    .zoom-on-hover:hover {
        transform: scale(1.1);
    }

</style>


<!--<header x-data="{ isOpen: false }" class="bg-blue-900  shadow">-->
<header x-data="{ isOpen: false }"  class=" w-full h-full md:h-0  ">
    <nav class="container mx-auto px-6 py-3  top-0 left-0 right-0">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="flex justify-around items-center">
                <div class="flex items-center">
                    
                    <img class="zoom-on-hover size-28 " src="{{ asset('img/logoGamerFest.png') }}" alt="GamerFest">                
                </div>
                <!-- Mobile menu button -->
                <div class="flex md:hidden">
                    <button @click="isOpen = !isOpen" type="button"
                        class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600"
                        aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        
            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div class="md:flex items-center" :class="isOpen ? 'block' : 'hidden'">
                <div class="flex flex-col mt-2 md:flex-row md:mt-0 md:mx-1">
                    {{-- <a class="my-1 text-lg text-white leading-5 hover:text-purple-600 hover:underline md:mx-4 md:my-0 font-bold"
                        href="#">Inicio</a> --}}
                    <a class="my-1 text-lg text-white leading-5 hover:text-purple-600  hover:underline md:mx-4 md:my-0 font-bold"
                        href="#">Juegos</a>
                    <a class="my-1 text-lg text-white leading-5 hover:text-purple-600 hover:underline md:mx-4 md:my-0 font-bold"
                        href="#">Sobre Nosotros</a>
                </div>

                <!--
                <div class="flex items-center py-2 -mx-1 md:mx-0">
                    <a class="block w-1/2 px-3 py-2 mx-1 rounded-full text-center text-lg bg-purple-800 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-full transition-all duration-300 border-2 border-transparent hover:border-white focus:outline-none focus:ring focus:border-purple-300 font-medium text-white leading-5  md:mx-2 md:w-auto "
                        href="{{ route('login') }}">Ingresar</a>
                    <a class="block w-1/2 px-3 py-2 mx-1 rounded-full  text-center text-lg bg-purple-800 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-full transition-all duration-300 border-2 border-transparent hover:border-white focus:outline-none focus:ring focus:border-purple-300 font-medium text-white leading-5  md:mx-0 md:w-auto "
                        href="{{ route('register') }}">Registrarse</a>
                </div>
                -->

                <div class="flex space-x-4">
                    <button class="bg-gradient-to-r from-purple-400 to-blue-500 hover:from-pink-500 hover:to-purple-600 text-white font-bold py-3 px-6 rounded-full shadow-lg transform transition-all duration-500 ease-in-out hover:scale-110 hover:brightness-110 hover:animate-pulse active:animate-bounce">
                        Ingresar
                    </button>
                    
                    <button class="bg-gradient-to-r from-purple-400 to-blue-500 hover:from-pink-500 hover:to-purple-600 text-white font-bold py-3 px-6 rounded-full shadow-lg transform transition-all duration-500 ease-in-out hover:scale-110 hover:brightness-110 hover:animate-pulse active:animate-bounce">
                        Registrarse
                    </button>
                </div>
                <!-- Search input on mobile screen -->
                <div class="mt-3 md:hidden">
                    <input type="text"
                        class="w-full px-4 py-3 leading-tight text-sm text-gray-700 bg-gray-100 rounded-md placeholder-gray-500 focus:outline-none focus:bg-white focus:shadow-outline"
                        placeholder="Search" aria-label="Search">
                </div>
            </div>
        </div>
    </nav>
</header>
</nav>
{{-- End navbar --}}