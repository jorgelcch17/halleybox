<x-guest-layout>
    @if (session('info'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold mr-4">que paso!</strong>
            <span class="block sm:inline">{{session('info')}}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    @endif

    <x-jet-authentication-card>
        <x-slot name="logo">
               <div class="flex flex-col items-center">
                    <img class="" src="https://img.icons8.com/material-outlined/48/000000/asteroid.png"/>
                    <span class="font-bold text-gray-800 ml-2">HALLEY<span class="text-sky-500">BOX</span></span>
                    {{-- <x-jet-authentication-card-logo /> --}}
               </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            {{-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}
            <div class="flex flex-col items-center justify-end mt-6">
                <x-jet-button class="w-full py-3 inline-flex justify-center">
                    {{ __('Log in') }}
                </x-jet-button>
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 mt-4" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
                
                
            </div>
        </form>
        <p class="text-center mt-3 mb-2">- o -</p>
        <div class="flex flex-col pt-2">
             {{-- <a class="bg-neutral-200 rounded-sm text-center p-2 mb-2" href="">Inicia sesión con google</a>
             <a class="bg-blue-700 text-center rounded-sm p-2 text-white" href="">Inicia sesión con Facebook</a> --}}
             <a href="{{url('login/facebook')}}" class="justify-center text-white bg-[#0099ff] hover:bg-[#0099ff]/90 focus:ring-4 focus:outline-none focus:ring-[#0099ff]/50 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex items-center dark:focus:ring-[#0099ff]/55 mb-2">
                 <img class="mr-2" src="https://img.icons8.com/color/26/000000/facebook-new.png"/>
                 Inicia sesión con Facebook
             </a>

             <a href="{{url('login/google')}}" class="text-gray-700  bg-[#d2d5db] hover:bg-[#d2d5db]/90 focus:ring-4 focus:outline-none focus:ring-[#d2d5db]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-center dark:focus:ring-[#d2d5db]/55 mb-2">
                 <img class="mr-2" src="https://img.icons8.com/color/24/000000/google-logo.png"/>
                 Inicia sesión con Google
             </a>
        </div>
        <p class="text-center mt-4 text-sm">¿No tienes cuenta? <a class="text-blue-500 hover:underline" href="register">Regístrate</a></p>
    </x-jet-authentication-card>
</x-guest-layout>
