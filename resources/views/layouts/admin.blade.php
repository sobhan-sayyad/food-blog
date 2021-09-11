<!DOCTYPE html>
<html>
    @include('partials.admin._head')
    <body class="fixed-left">
        <div id="wrapper">
        @include('partials.admin._nav')
            <div class="content-page">
               
                <div class="content">
                    <div class="container-fluid">
                         @yield('content')
                    </div>
                </div> 
                @include('partials.admin._footer')
            </div>
        </div>
        @include('partials.admin._scripts')
    </body>
</html>