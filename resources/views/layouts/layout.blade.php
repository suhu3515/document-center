<!doctype html>
<html lang="en">
@include('layouts.head')

    <body data-topbar="dark">
        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('layouts.header')
            @include('layouts.sidenav')

            @yield('content')

            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    @include('layouts.script')

</body>

</html>
