<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shopping Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- ใช้ Flexbox ในการจัดรายการสินค้าและสรุปรายการ -->
            <div class="flex flex-col lg:flex-row lg:space-x-6">
                <!-- ส่วนรายการสินค้า (ทางซ้าย) -->
                <div class="w-full lg:w-2/3">
                    <div class="bg-white shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6">
                            <div class="flex justify-between items-center">
                                <!-- รูปภาพสินค้าและรายละเอียด -->
                                <div class="flex items-center space-x-4">
                                    <img src="{{ asset('images/shoe.png') }}" alt="Chuck Taylor All Star Sketch" class="w-24 h-24 object-cover">
                                    <div>
                                        <a href="#" class="text-lg font-semibold text-gray-900 hover:text-gray-700">Chuck Taylor All Star Sketch</a>
                                        <p class="text-sm text-gray-600"><strong>สี:</strong> NAVY</p>
                                        <p class="text-sm text-gray-600"><strong>ขนาด:</strong> M 10 - W 12</p>
                                    </div>
                                </div>

                                <!-- ราคา, ปุ่มเพิ่ม/ลดจำนวน, ปุ่มแก้ไข/ลบ -->
                                <div class="flex items-center space-x-2">
                                    <!-- ปุ่มเพิ่ม/ลดจำนวนสินค้า -->
                                    <button class="bg-gray-200 px-3 py-1 rounded-lg text-gray-800" onclick="decreaseQuantity()">-</button>
                                    <div class="flex items-center justify-center">
                                        <input 
                                            type="number" 
                                            id="quantity" 
                                            class="w-16 text-center border border-gray-300 rounded-lg h-10" 
                                            value="1" 
                                            min="1" 
                                            max="10" 
                                            readonly>
                                    </div>
                                    <button class="bg-gray-200 px-3 py-1 rounded-lg text-gray-800" onclick="increaseQuantity()">+</button>

                                    <!-- ปุ่มแก้ไขและลบ -->
                                    <a href="#" class="text-blue-500 hover:underline">แก้ไข</a>
                                    <a href="#" class="text-red-500 hover:underline">ลบ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ส่วนสรุปรายการ (ทางขวา) -->
                <div class="w-full lg:w-1/3">
                    <div class="bg-white shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800">สรุปรายการ</h3>
                        <div class="flex justify-between mt-4">
                            <p class="text-gray-600">ยอดรวมทั้งหมด:</p>
                            <p class="text-gray-900 font-semibold">2,430.00 THB</p>
                        </div>
                        <div class="flex justify-between mt-2">
                            <p class="text-gray-600">ค่าจัดส่ง:</p>
                            <p class="text-gray-900 font-semibold">ฟรี</p>
                        </div>
                        <hr class="my-4">
                        <div class="flex justify-between">
                            <p class="text-gray-800 font-semibold">ยอดรวมสุทธิ:</p>
                            <p class="text-lg font-bold text-gray-900">2,430.00 THB</p>
                        </div>

                        <!-- ฟิลด์รหัสส่วนลด -->
                        <div class="mt-4">
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2" placeholder="ใส่รหัสส่วนลด">
                        </div>

                        <!-- ปุ่มชำระเงิน -->
                        <button class="w-full mt-4 bg-black text-white py-2 rounded-lg hover:bg-gray-800">ชำระเงิน</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ฟังก์ชัน JavaScript สำหรับเพิ่ม/ลดจำนวน -->
    <script>
        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            const maxStock = parseInt(quantityInput.max);
            let currentValue = parseInt(quantityInput.value);

            if (currentValue < maxStock) {
                quantityInput.value = currentValue + 1;
            }
        }

        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);

            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }
    </script>
</x-app-layout>
