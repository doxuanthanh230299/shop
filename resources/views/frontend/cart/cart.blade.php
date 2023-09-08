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
                        <div class="process text-center">
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
            <div class="row row-pb-md">
                <div class="col-md-10 col-md-offset-1">
                    <div class="product-name">
                        <div class="one-forth text-center">
                            <span>Chi tiết sản phẩm</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Giá</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Số lượng</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Tổng</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Xóa</span>
                        </div>
                    </div>
                    <form action="" method="POST" id="cart-form">
                        @if ($cart and $cart->count() > 0)
                            @foreach ($cart as $product)
                                <div class="product-cart">
                                    <div class="one-forth">

                                        <div class="product-img">
                                            <img class="img-thumbnail cart-img"
                                                src="../uploads/{{ $product->attributes->image }}">
                                        </div>
                                        <div class="detail-buy">
                                            <h4>Mã : {{ $product->attributes->code }}</h4>
                                            <h5>{{ $product->name }}</h5>
                                        </div>
                                    </div>
                                    <div class="one-eight text-center">
                                        <div class="display-tc">
                                            <span class="price">{{ $product->price }}</span>
                                        </div>
                                    </div>
                                    <div class="one-eight text-center">
                                        <div class="display-tc">
                                            <input onclick="updateCart({{ $product->id }}, this.value)" type="number"
                                                id="quantity" name="quantity" class="form-control input-number text-center"
                                                value="{{ $product->quantity }}">
                                        </div>
                                    </div>
                                    <div class="one-eight text-center">
                                        <div class="display-tc">
                                            <span class="price">{{ $product->price * $product->quantity }}</span>
                                        </div>
                                    </div>
                                    <div class="one-eight text-center">
                                        <div class="display-tc">
                                            <a onclick="return deleteCart({{ $product->id }}) " href="#"
                                                class="closed"></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif



                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="total-wrap">
                        <div class="row">
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-3 col-md-push-1 text-center">
                                <div class="total">
                                    <div class="sub">
                                        <p><span>Tổng:</span> <span class="priceTotal">{{ $totalPrice }} đ</span></p>
                                    </div>
                                    <div class="grand-total">
                                        <p><span><strong>Tổng cộng:</strong></span> <span
                                                class="priceTotal">{{ $totalPrice }} đ</span></p>
                                        <a href="checkout.html" class="btn btn-primary">Thanh toán <i
                                                class="icon-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- end main -->
    <script>
        function updateCart(id, qty) {
            if (qty == 0 || qty < 0) {
                const isConfirm = confirm('Bạn có muốn xóa sản phẩm này');
                if (isConfirm) {
                    $.get('/gio-hang/xoa-hang/' + id, function(data, status) {
                        if (data == 'success') {
                            location.reload();
                        }
                    })
                }
            } else {
                $.get('/gio-hang/cap-nhat-gio-hang/' + id + '/' + qty, function(data, status) {
                    if (status == 'success') {
                        $('#cart-form').load(location.href + " #cart-form");
                        $('.top-menu').load(location.href + ".top-menu");
                        $('.priceTotal').html(data + 'đ');
                    }
                });
            }
        }

        function deleteCart(id) {
            const isConfirm = confirm('Bạn có muốn xóa sản phẩm này');
            if (isConfirm) {
                $.get('/gio-hang/xoa-hang/' + id, function(data, status) {
                    if (data == 'success') {
                        location.reload();
                    }
                })
                return false
            }
            return false
        }
    </script>
@stop
