@extends('backend.master.master')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Icons</li>
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
                            <form action="/admin/category/update/{{ $category['id'] }}" method="post">
                                <div class="col-md-5">

                                    <div class="form-group">
                                        <label for="">Danh mục cha:</label>
                                        <select class="form-control" name="parent">
                                            {{ showCategories($categories, 0, '', $category['parent']) }}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tên Danh mục</label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Tên danh mục mới" value="{{ $category['name'] }}">

                                        @if ($errors->has('name'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                            {{-- <div class="alert bg-danger" role="alert">
                                            <svg class="glyph stroked cancel">
                                                <use xlink:href="#stroked-cancel"></use>
                                            </svg>Tên danh mục đã tồn tại!<a href="#" class="pull-right"><span
                                                    class="glyphicon glyphicon-remove"></span></a>
                                        </div> --}}
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sửa danh mục</button>
                                </div>
                                {{ csrf_field() }}
                            </form>
                            <div class="col-md-7">
                                <h3><strong>Phân cấp Menu</strong></h3>
                                <div class="vertical-menu">
                                    <div class="item-menu active">Danh mục </div>
                                    {{ listCategories($categories, 0, '') }}

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



    <script>
        $('#calendar').datepicker({});

        ! function($) {
            $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function() {
            if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function() {
            if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>
    </body>

    </html>
@stop
