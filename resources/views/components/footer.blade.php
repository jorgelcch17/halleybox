<div class="bg-neutral-800 py-8">
    <div class="container h-full">
        <div class="flex items-center justify-between mb-2">
            <a href="/" class="flex items-center">
                {{-- <x-jet-application-mark class="block h-9 w-auto" /> --}}
                <img src="https://img.icons8.com/material-outlined/24/ffffff/asteroid.png" />
                <span class="font-bold text-white ml-2">HALLEY<span class="text-sky-500">BOX</span></span>
            </a>
            <div>
                <div class="text-white space-x-4 flex items-center mb-2">
                    <a href="#"><i class="fa-brands fa-facebook fa-xl hover:text-blue-500"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter fa-xl hover:text-sky-500"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram fa-xl hover:text-red-400"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin fa-xl hover:text-cyan-500"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube fa-xl hover:text-red-600"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <p class="text-white text-center mt-2">
            <a class="hover:text-sky-500" href="#">Contáctenos </a>|
            <a class="hover:text-sky-500" href="{{ route('terminosycondiciones') }}">Términos y condiciones </a>|
            <a class="hover:text-sky-500" href="{{ route('politicasdeprivacidad') }}">Políticas de privacidad</a> |
            <a class="hover:text-sky-500" href="{{ route('preguntasfrecuentes') }}">Preguntas frecuentes</a>
        </p>
    </div>
</div>
