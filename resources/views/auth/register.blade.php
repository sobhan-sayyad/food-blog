<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}">

        <title>Khodaniha Register</title>

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
                <a href="{{route('site.index')}}" class="logo"><span>Khordani<span>ha</span></span></a>
                <h5 class="text-muted m-t-0 font-600">!!! You Are What You Eat</h5>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">ایجاد حساب کاربری</h4>
                </div>
                <div class="p-20">
                @if (Session::has('message'))
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('message') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form class="form-horizontal m-t-20" action="{{ route('admin.createAccount') }}" method="POST">
                        @csrf

						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="email" required placeholder="ایمیل" name="email">
							</div>
						</div>

						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" required placeholder="نام" name="first_name">
							</div>
						</div>

                        <div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" required placeholder="نام خانوادگی" name="last_name">
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" type="password" required placeholder="گذرواژه" name="password">
							</div>
						</div>

                        <div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" type="password" required placeholder="تکرار گذرواژه" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<div class="checkbox checkbox-custom">
									<input id="checkbox-signup" type="checkbox" checked="checked" required name="checkbox">
									<label for="checkbox-signup"><a href="#">شرایط و قوانین </a>سایت را می‌پذیرم</label>
								</div>
							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<div class="col-xs-12">
								<button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
									ایجاد حساب
								</button>
							</div>
						</div>

					</form>

                </div>
            </div>
            <!-- end card-box -->

			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="m-l-5">حساب کاربری دارید؟<a href="{{ route('admin.login') }}" class="text-primary m-l-5"><b>وارد شوید</b></a></p>
				</div>
			</div>

        </div>
        <!-- end wrapper page -->




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