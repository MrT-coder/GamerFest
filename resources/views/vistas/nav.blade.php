<header class="absolute text-gray-400 bg-transparent body-font w-full h-full md:h-0">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a>
            <img class="size-28" src="{{ asset('img/logoGamerFest.png') }}" alt="GamerFest">
        </a>
        <nav
            class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-700 flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-purple-600 hover:underline font-bold" href="#juegos">Juegos</a>
            <a class="mr-5 hover:text-purple-600 hover:underline font-bold" href="#sobrenosotros">Sobre Nosotros</a>
        </nav>
        <a href="{{ route('login') }}">
            <button
                class="block w-1/2 mx-1 text-center text-lg bg-purple-800 hover:bg-purple-600 my-2 py-2 px-4 rounded-full transition-all duration-300 border-2 border-transparent hover:border-white focus:outline-none focus:ring focus:border-purple-300 font-medium text-white leading-5 md:mx-2 md:w-auto ">Ingresar
            </button>
        </a>
        <a href="{{ route('register') }}">
            <button
                class="block w-1/2 mx-1 text-center text-lg bg-purple-800 hover:bg-purple-600 my-2 py-2 px-4 rounded-full transition-all duration-300 border-2 border-transparent hover:border-white focus:outline-none focus:ring focus:border-purple-300 font-medium text-white leading-5 md:mx-0 md:w-auto">Registrarse</button>
        </a>
    </div>

    <button class="text-white px-4 sm:px-8 py-2 sm:py-3 bg-sky-700 hover:bg-sky-800">...</button>


</header>
