<!DOCTYPE html>
<html lang="en">
@include('admin.layout.header')

<body>

    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        <!-- Page Header Start-->
        @include('admin.layout.top-bar')
        <!-- Page Header Ends -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            <!-- Page Sidebar Start-->
            @include('admin.layout.sidebar')
            <!-- Page Sidebar Ends-->



            <div class="page-body">

                @yield('content')

            </div>

            <!-- footer start-->
            @include('admin.layout.footer')
            <!-- footer end-->
        </div>

    </div>

    @include('admin.layout.script')
</body>

<!-- Mirrored from themes.pixelstrap.com/multikart/back-end/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Mar 2022 06:27:29 GMT -->

</html>