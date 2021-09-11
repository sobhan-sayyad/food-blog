<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}">

        <title>Khodaniha Login</title>

        <!-- App css -->
        <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/css/style.css')}}" rel="stylesheet" type="text/css" />

        <script src="{{asset('admin/js/modernizr.min.js')}}"></script>

    </head>

    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="{{ route('site.index') }}" class="logo"><span>Khordani<span>ha</span></span></a>
                <h5 class="text-muted m-t-0 font-600">!!! You Are What You Eat</h5>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">ورود به حساب کاربری</h4>
                </div>
                <div class="p-20">
                    @if (Session::has('message'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('message') }}
                    </div>
                @endif
                    <form class="form-horizontal m-t-20" action="{{ route('admin.loginAccount') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" required placeholder="ایمیل" name="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required placeholder="گذرواژه" name="password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-custom">
                                    <input id="checkbox-signup" type="checkbox" name="remember">
                                    <label for="checkbox-signup">
                                        مرا به خاطر بسپار
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">ورود</button>
                            </div>
                        </div>

                        <div class="form-group m-t-30 m-b-0">
                            <div class="col-sm-12">
                                <a href="#forgotPassword" class="text-muted"  data-toggle="modal"><i class="fa fa-lock m-r-5"></i> رمز خود را فراموش کردید؟</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- end card-box-->

            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="text-muted">کاربر جدید هستید؟ <a href="{{ route('admin.signup') }}" class="text-primary m-l-5"><b>ایجاد حساب</b></a></p>
                </div>
            </div>
            
        </div>
        <!-- end wrapper page -->

            {{-- modal forgot password --}}

    <div id="forgotPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">بازیابی گذر واژه</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{ route('admin.userPasswordRecovery') }}" method="POST">
                    <div class="modal-body col-12">
                        @csrf
                        <input type="email" class="form-control" placeholder="ایمیل خود را وارد کنید" name='email' required>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-rounded w-md waves-effect waves-light m-b-5"
                                data-dismiss="modal">بستن</button>
                            <button type="submit"
                                class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">بازیابی</button>
                        </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


        <!-- jQuery  -->
        <script src="{{asset('admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('admin/js/popper.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('admin/js/detect.js')}}"></script>
        <script src="{{asset('admin/js/fastclick.js')}}"></script>
        <script src="{{asset('admin/js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('admin/js/waves.js')}}"></script>
        <script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('admin/js/jquery.scrollTo.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('admin/js/jquery.core.js')}}"></script>
        <script src="{{asset('admin/js/jquery.app.js')}}"></script>
	
	</body>
</html>