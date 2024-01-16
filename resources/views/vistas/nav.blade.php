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
<header x-data="{ isOpen: false }" class="bg-gradient-to-r from-purple-700 to-blue-500 shadow">
    <nav class="container mx-auto px-6 py-3">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <!--<a class="text-gray-800 text-xl font-bold md:text-2xl hover:text-gray-700" href="#">@GamerFest</a>-->
                    <img class="zoom-on-hover w-25 h-20 " src="{{ asset('img/logoGamerFest.png') }}" alt="GamerFest">
                   
                
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
                    <a class="my-1 text-lg text-white leading-5 hover:text-yellow-600 hover:underline md:mx-4 md:my-0 font-bold"
                        href="#">Inicio</a>
                    <a class="my-1 text-lg text-white leading-5 hover:text-yellow-600 hover:underline md:mx-4 md:my-0 font-bold"
                        href="#">Juegos</a>
                    <a class="my-1 text-lg text-white leading-5 hover:text-yellow-600 hover:underline md:mx-4 md:my-0 font-bold"
                        href="#">Inscripciones</a>
                    <a class="my-1 text-lg text-white leading-5 hover:text-yellow-600 hover:underline md:mx-4 md:my-0 font-bold"
                        href="#">Sobre Nosotros</a>
                </div>

                <div class="flex items-center py-2 -mx-1 md:mx-0">
                    <a class="block w-1/2 px-3 py-2 mx-1 rounded-full text-center text-lg bg-gray-500 font-medium text-white leading-5 hover:bg-yellow-600 md:mx-2 md:w-auto "
                        href="{{ route('login') }}">Ingresar</a>
                    <a class="block w-1/2 px-3 py-2 mx-1 rounded-full  text-center text-lg bg-gray-500 font-medium text-white leading-5 hover:bg-yellow-600 md:mx-0 md:w-auto "
                        href="{{ route('register') }}">Registrarse</a>
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