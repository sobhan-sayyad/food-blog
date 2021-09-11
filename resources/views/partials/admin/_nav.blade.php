 <!-- Top Bar Start -->
 <div class="topbar">

<!-- LOGO -->
<div class="topbar-left">
    <a href="{{route('site.index')}}" class="logo"><span>Khordani<span>ha</span></span><i class="mdi mdi-layers"></i></a>
</div>

<!-- Button mobile view to collapse sidebar menu -->
<div class="navbar navbar-default" role="navigation">
    <div class="container-fluid">

        <!-- Page title -->
        <ul class="nav navbar-nav list-inline navbar-left">
            <li class="list-inline-item">
                <button class="button-menu-mobile open-left">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="list-inline-item">
                <h4 class="page-title">پنل کاربری</h4>
            </li>
        </ul>

        <nav class="navbar-custom">

            <ul class="list-unstyled topbar-right-menu float-right mb-0">
                <li class="hide-phone">
                    <form class="app-search">
                        <input type="text" placeholder="جستجو..."
                               class="form-control">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </li>

            </ul>
        </nav>
    </div><!-- end container -->
</div><!-- end navbar -->
</div>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
<div class="sidebar-inner slimscrollleft">

    <!-- User -->
    <div class="user-box">
        <div class="user-img">
            <img src="{{asset('admin/images/users/avatar-11.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail img-responsive">
            <div class="user-status offline"><i class="mdi mdi-adjust"></i></div>
        </div>
        <h5><a href="#">{{$logedUser->first_name}} {{$logedUser->last_name}}</a> </h5>
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="#" >
                    <i class="mdi mdi-settings"></i>
                </a>
            </li>

            <li class="list-inline-item">
                <a href="#" class="text-custom" data-toggle="modal" data-target="#logout">
                    <i class="mdi mdi-power"></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- End User -->

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <ul>

            <li>
                <a href="{{route('admin.dashboard')}}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> میز کار </span> </a>
            </li>

            <li>
                <a href="{{route('admin.categories')}}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> دستبندی‌ها </span> </a>
            </li>

            <li>
                <a href="{{route('admin.posts')}}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> پست‌ها </span> </a>
            </li>
            <li>
                <a href="{{route('admin.users')}}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> کاربران </span> </a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -->
    <div class="clearfix"></div>

</div>

</div>
<!-- Left Sidebar End -->

{{-- modal logout --}}
<div id="logout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">خروج از اکانت</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>از اکانت خارج شوید؟</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-rounded w-md waves-effect waves-light m-b-5"
                    data-dismiss="modal">انصراف</button>
                <a href="{{route('admin.logoutAccount')}}"
                    class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5">تایید</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->