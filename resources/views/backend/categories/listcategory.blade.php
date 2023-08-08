@extends('backend.master.master')
@section('title', 'Danh sách sản phẩm')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Danh mục</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lý danh mục</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                <form method="POST" action="/admin/category/store">
                                    <div class="form-group">
                                        <label for="">Danh mục cha:</label>
                                        <select class="form-control" name="parent" id="">
                                            <option value="0">----ROOT----</option>
                                            {{ showCategories($categories, 0, '', '') }}
                                        </select>
                                        @if ($errors->has('parent'))
                                            <div class="alert bg-danger" role="alert">
                                                <svg class="glyph stroked cancel">
                                                    <use xlink:href="#stroked-cancel"></use>
                                                </svg>{{ $errors->first('parent') }}<a href="#"
                                                    class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tên Danh mục</label>
                                        <input type="text" class="form-control" name="name" id=""
                                            placeholder="Tên danh mục mới">

                                        @if ($errors->has('name'))
                                            <div class="alert bg-danger" role="alert">
                                                <svg class="glyph stroked cancel">
                                                    <use xlink:href="#stroked-cancel"></use>
                                                </svg>{{ $errors->first('name') }}<a href="#" class="pull-right"><span
                                                        class="glyphicon glyphicon-remove"></span></a>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                                    {{ csrf_field() }}
                                </form>
                            </div>
                            <div class="col-md-7">
                                @if (session('alert'))
                                    <div class="alert bg-success" role="alert">
                                        <svg class="glyph stroked checkmark">
                                            <use xlink:href="#stroked-checkmark"></use>
                                        </svg> {{ session('alert') }}<a href="#" class="pull-right"><span
                                                class="glyphicon glyphicon-remove"></span></a>
                                    </div>
                                @endif
                                <h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
                                <div class="vertical-menu">
                                    <div class="item-menu active">Danh mục </div>
                                    {{ listCategories($categories, 0, ' ') }}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->


        </div>
        <!--/.row-->
    </div>
    <!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>




    </body>

    </html>
@endsection
