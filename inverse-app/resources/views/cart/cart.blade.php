@extends('layouts.app') <!-- Extend from your main layout file -->

@section('content')
<div class="container">
    <div class="row">
        <!-- Cart items -->
        <div class="col-md-8">
            <h2>ตะกร้าสินค้า</h2>
            <hr>
            <div class="cart-item">
                <div class="row">
                    <div class="col-md-2">
                        <img src="URL_TO_SHOE_IMAGE" class="img-fluid" alt="Product Image">
                    </div>
                    <div class="col-md-6">
                        <h5><a href="#">Chuck Taylor All Star Sketch</a></h5>
                        <p>สี: NAVY</p>
                        <p>ขนาด: M 10 - W 12</p>
                    </div>
                    <div class="col-md-2">
                        <span>2,430.00 THB</span>
                    </div>
                    <div class="col-md-2">
                        <form>
                            <select class="form-control" name="quantity" id="quantity">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </form>
                        <a href="#" class="btn btn-link">แก้ไข</a> | 
                        <a href="#" class="btn btn-link text-danger">ลบ</a>
                    </div>
                </div>
            </div>

            <hr>
        </div>

        <!-- Cart summary -->
        <div class="col-md-4">
            <h4>สรุปรายการ</h4>
            <hr>
            <p>ยอดรวมทั้งหมด: 2,430.00 THB</p>
            <p>ค่าจัดส่ง: ฟรี</p>
            <p><strong>ยอดรวมสุทธิ: 2,430.00 THB</strong></p>
            <hr>

            <!-- Payment and discount section -->
            <div class="discount-section">
                <a href="#" class="btn btn-outline-secondary btn-block">ใส่รหัสส่วนลด</a>
            </div>
            <div class="payment-section mt-3">
                <a href="#" class="btn btn-primary btn-block">ชำระเงิน</a>
            </div>
            <div class="payment-methods text-center mt-3">
                <img src="URL_TO_VISA_ICON" alt="Visa" width="50">
                <img src="URL_TO_BANK_ICON" alt="Bank Transfer" width="50">
                <img src="URL_TO_COD_ICON" alt="COD" width="50">
            </div>
        </div>
    </div>
</div>
@endsection
