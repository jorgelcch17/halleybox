<div class="container mx-auto">
    <h2 class="text-2xl font-semibold pl-12 my-10">Datos de pagos de ordenes</h2>
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Orden
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Metodo de pago
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Fecha
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Hora
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Número de transacción
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Foto
                    </th>
                    <th scope="col" class="py-3 px-6">
                        comentario
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a class="hover:text-orange-500" href="{{ route('admin.orders.show', $payment->order) }}">Orden-{{ $payment->order_id }}</a>
                    </th>
                    <td class="py-4 px-6">
                        @switch($payment->payment_method)
                            @case(1)
                                Tigo money
                                @break
                            @case(2)
                                QR Simple
                                @break
                            @case(3)
                                Deposito/Transferencia
                                @break
                        @endswitch
                    </td>
                    <td class="py-4 px-6">
                        {{ $payment->payment_date }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $payment->payment_time }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $payment->transaction_number }}
                    </td>
                    <td class="py-4 px-6">
                        <a class="text-blue-500" href="{{ Storage::url($payment->payment_photo) }}" target="_blank">Ver foto</a>
                    </td>
                    <td class="py-4 px-6 break-all">
                        {{ $payment->comment }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
