@extends('frontend.master.master')
@section('main')
    <!-- main -->
    <div class="colorlib-shop">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-push-3">
                    <div class="row row-pb-lg">
                        @foreach ($products as $product)
                            <div class="col-md-4 text-center">
                                <div class="product-entry">
                                    <div class="product-img"
                                        style="background-image: url(../uploads/{{ $product['image'] }});">
                                        <div class="cart">
                                            <p>
                                                <span class="addtocart"><a href="/gio-hang/them-hang/{{$product['id']}}"><i
                                                            class="icon-shopping-cart"></i></a></span>
                                                <span><a href="detail.html"><i class="icon-eye"></i></a></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="desc">
                                        <h3><a href="/san-pham/{{ $product['slug'] }}.html">{{ $product['name'] }}</a></h3>
                                        <p class="price"><span>{{ formatCurrency($product['price']) }}</span></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <ul class="pagination">
                                <li class="disabled"><a href="#">&laquo;</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul> --}}
                            {{ $products->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-pull-9">
                    <div class="sidebar">
                        <div class="side">
                            <h2>Danh mục</h2>
                            <div class="fancy-collapse-panel">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">


                                        @foreach ($categories as $category)
                                            @if ($category['parent'] == 0)
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                            href="#menu{{ $category['id'] }}" aria-expanded="true"
                                                            aria-controls="collapseOne">Quần
                                                            {{ $category['name'] }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                @foreach ($categories as $child_item)
                                                    @if ($child_item['parent'] == $category['id'])
                                                        <div id="menu{{ $category['id'] }}" class="panel-collapse collapse"
                                                            role="tabpanel" aria-labelledby="headingOne">
                                                            <div class="panel-body">
                                                                <ul>
                                                                    <li><a
                                                                            href="/danh-muc/{{ $child_item['slug'] }}.html">{{ $child_item['name'] }}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="side">
                            <h2>Khoảng giá</h2>
                            <form method="get" class="colorlib-form-2" action="/san-pham/tim-kiem">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="guests">Từ:</label>
                                            <div class="form-field">
                                                <i class="icon icon-arrow-down3"></i>
                                                <select name="start" id="people" class="form-control">
                                                    <option value="100000">100.000 VNĐ</option>
                                                    <option value="200000">200.000 VNĐ</option>
                                                    <option value="300000">300.000 VNĐ</option>
                                                    <option value="500000">500.000 VNĐ</option>
                                                    <option value="1000000">1.000.000 VNĐ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="guests">Đến:</label>
                                            <div class="form-field">
                                                <i class="icon icon-arrow-down3"></i>
                                                <select name="end" id="people" class="form-control">
                                                    <option value="2000000">2.000.000 VNĐ</option>
                                                    <option value="4000000">4.000.000 VNĐ</option>
                                                    <option value="6000000">6.000.000 VNĐ</option>
                                                    <option value="8000000">8.000.000 VNĐ</option>
                                                    <option value="10000000">10.000.000 VNĐ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" style="width: 100%;border: none;height: 40px;">Tìm
                                    kiếm</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main -->
@stop
