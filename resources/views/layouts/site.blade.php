<!DOCTYPE html>
<html lang="en">
    @include('partials.site._head')
<body class="page-home dm-dark">

      <!-- Loader-->
      <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span></div>
      <!-- Loader end-->
  
  <div class="page-wrapper">
    @include('partials.site._nav')
    <main class="page-main">
        @yield('content')
    </main>
    @include('partials.site._footer')
  </div>
  @include('partials.site._scripts')
</body>

</html>