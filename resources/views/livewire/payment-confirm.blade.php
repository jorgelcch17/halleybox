<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-4">
    
    <p class="text-center text-xl mb-6">Enviar datos de pago: <strong>orden-{{ $order->id }}</strong></p>
    <p class="mb-6 text-red-500 text-center"><strong>Nota:</strong> Completa la información exactamente con lo que
        dice tu recibo.</p>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <form class="bg-white p-2 space-y-2" wire:submit.prevent="store" enctype="multipart/form-data">
            @csrf
            <div class="">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Subir
                    foto del comprobante:</label>
                <input wire:model="file"
                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="file_input_help" id="file_input" name="file" type="file" accept="image/*"
                    value="{{ old('file') }}">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG
                    (PESO MAX. 5Mb).</p>
                <x-jet-input-error for="file"></x-jet-input-error>
            </div>
            <div class="flex justify-between gap-2">
                <div class="flex-1">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        for="date">Fecha:</label>
                    <input wire:model="date"
                        class="block py-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" name="date" id="date" type="date"
                        value="{{ old('date') }}">
                    <x-jet-input-error for="date"></x-jet-input-error>
                </div>
                <div class="flex-1">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        for="time">Hora:</label>
                    <input wire:model="time"
                        class="block py-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" name="time" id="time" type="time"
                        value="{{ old('time') }}">
                    <x-jet-input-error for="time"></x-jet-input-error>
                </div>
            </div>
            <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Eliga la forma de pago que
                utilizó:</p>
            <div class="flex justify-center gap-2 flex-wrap">
                <div class="flex items-center px-4 rounded border border-gray-200 dark:border-gray-700">
                    <input wire:model="payment_method"id="bordered-checkbox-1" type="radio" value="1"
                        name="payment_method"
                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-checkbox-1"
                        class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Tigo
                        Money</label>
                </div>
                <div class="flex items-center px-4 rounded border border-gray-200 dark:border-gray-700">
                    <input wire:model="payment_method" id="bordered-checkbox-2" type="radio" value="2"
                        name="payment_method"
                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-checkbox-2"
                        class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">QR
                        Simple</label>
                </div>
                <div class="flex items-center px-4 rounded border border-gray-200 dark:border-gray-700">
                    <input wire:model="payment_method" id="bordered-checkbox-3" type="radio" value="3"
                        name="payment_method"
                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-checkbox-3"
                        class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Deposito/Transferencia</label>
                </div>
                <x-jet-input-error for="payment_method"></x-jet-input-error>
            </div>
            <div class="">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    for="transaction_number">Número de documento/ID de transacción:</label>
                <input wire:model="transaction_number"
                    class="block py-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="transaction_number" name="transaction_number" type="number"
                    value="{{ old('transaction_number') }}">
                <x-jet-input-error for="transaction_number"></x-jet-input-error>
            </div>
            <div class="">

                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Comentario:
                    (opcional)</label>
                <textarea wire:model="comment" id="message" rows="4" name="comment"
                    class="block p-2.5 w-full resize-none text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Tu mensaje..." value="{{ old('comment') }}"></textarea>

                {{-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    for="comment">Comentario:</label>
                <textarea class="w-full shadow" name="comment" id="comment" rows="4"></textarea> --}}
                {{-- <input
                    class="block py-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                     id="transaction_number" name="comment" type="text"> --}}
            </div>
            <x-jet-button class="w-full text-center">
                Enviar
            </x-jet-button>
        </form>
        <div>
            <p class="text-center">AYUDA</p>
        </div>
    </div>
</div>
