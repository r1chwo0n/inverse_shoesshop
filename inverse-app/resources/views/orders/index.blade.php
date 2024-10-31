<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800">รายการคำสั่งซื้อของคุณ</h3>
            <div class="mt-4">
                @foreach($orders as $index => $order) <!-- เพิ่มการนับ index -->
                    <div class="mb-4 p-4 border rounded-lg">
                        <p><strong>Order :</strong> {{ $index + 1 }}</p> <!-- ลำดับออเดอร์เฉพาะลูกค้า -->
                       
                        <p><strong>รวมสุทธิ:</strong> {{ number_format($order->total, 2) }} THB</p>
                        <p><strong>รายละเอียดคำสั่งซื้อ:</strong></p>
                        <ul>
                            @foreach($order->orderDetails as $detail)
                                <li>{{ $detail->product->name }} x {{ $detail->quantity }} - {{ number_format($detail->unit_price * $detail->quantity, 2) }} THB</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
