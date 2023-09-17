@extends('frontend.master.master')
@section('main')
    <!-- main -->

    <div class="colorlib-shop">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-10 col-md-offset-1">
                    <div class="process-wrap">
                        <div class="process text-center active">
                            <p><span>01</span></p>
                            <h3>Giỏ hàng</h3>
                        </div>
                        <div class="process text-center active">
                            <p><span>02</span></p>
                            <h3>Thanh toán</h3>
                        </div>
                        <div class="process text-center">
                            <p><span>03</span></p>
                            <h3>Hoàn tất thanh toán</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <form method="POST" action="/gio-hang/thanh-toan" class="colorlib-form">
                        {{ csrf_field() }}
                        <h2>Chi tiết thanh toán</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fname">Họ & Tên</label>
                                    <input type="text" id="fname" name="name" class="form-control"
                                        placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fname">Địa chỉ</label>
                                    <input type="text" id="address" class="form-control" name="address"
                                        placeholder="Nhập địa chỉ của bạn">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="email">Địa chỉ email</label>
                                    <input type="email" id="email" class="form-control" name="email"
                                        placeholder="Ex: youremail@domain.com">
                                </div>
                                <div class="col-md-6">
                                    <label for="Phone">Số điện thoại</label>
                                    <input type="text" id="zippostalcode" class="form-control" name="phone"
                                        placeholder="Ex: 0123456789">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><button type="submit" class="btn btn-primary">Thanh toán</button></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <div class="cart-detail">
                        <h2>Tổng Giỏ hàng</h2>
                        <ul>
                            <li>

                                <ul>
                                    @if ($cart && $cart->count() > 0)
                                        @foreach ($cart as $product)
                                            <li><span>{{ $product->quantity }} x {{ $product->name }}</span> <span>₫
                                                    {{ $product->price }}</span></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>

                            <li><span>Tổng tiền đơn hàng</span> <span>₫ {{ $totalPrice }}</span></li>
                        </ul>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>

    <!-- end main -->
@stop
