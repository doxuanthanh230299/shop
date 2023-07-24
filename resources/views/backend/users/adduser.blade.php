@extends('backend.master.master')
@section('title', 'Thêm người dùng')
@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Thành viên</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Thêm thành viên</div>
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
                            <form method="POST" action="/admin/user/store">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2">

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control">
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>password</label>
                                        <input type="text" name="password" class="form-control">
                                        @if ($errors->has('password'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Full name</label>
                                        <input type="full" name="fullname" class="form-control">
                                        @if ($errors->has('fullname'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('fullname') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="address" name="address" class="form-control">
                                        @if ($errors->has('address'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="phone" name="phone" class="form-control">
                                        @if ($errors->has('phone'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" class="form-control">
                                            <option value="1">Admin</option>
                                            <option selected value="2">User</option>
                                        </select>
                                        @if ($errors->has('level'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('level') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">

                                        <button class="btn btn-success" type="submit">Thêm thành viên</button>
                                        <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>

        <!--/.row-->
    </div>

    <!--end main-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>




    </body>

    </html>
@stop
