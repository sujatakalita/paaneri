<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper">
            <a href="{{ url('admin/dashboard') }}">
                <img class="blur-up lazyloaded" src="{{asset('public/user/assets/images/icon/paaneri.png')}}" alt="" style="max-width: 64%;">
            </a>
        </div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up" src="{{asset('public/assets/images/dashboard/man.jpg')}}" alt="#">
            </div>
            <h6 class="mt-3 f-14">{{auth()->user()->email??''}}</h6>
            <p>{{auth()->user()->name??''}}</p>
        </div>
        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="{{ url('admin/dashboard') }}"><i data-feather="home"></i><span>Dashboard</span></a></li>
            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="box"></i>
                    <span>Master</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="fa fa-circle"></i>
                            <span>Hero Banner</span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{  route('admin.home-page-banner') }}">
                                    <i class="fa fa-circle"></i>View All
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="#">
                    <i data-feather="cast"></i>
                    <span>Mega Menu</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="#"><i class="fa fa-circle"></i>
                            <span>Categories</span> <i class="fa fa-angle-right pull-right"></i>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('admin.megamenu')}}"><i class="fa fa-circle"></i>Mega Menu</a></li>
                            <li><a href="{{route('admin.category')}}"><i class="fa fa-circle"></i>Category</a></li>
                            <li><a href="{{route('admin.subcategory')}}"><i class="fa fa-circle"></i>Sub Category</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="#">
                    <i data-feather="command"></i>
                    <span>Products</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="#"><i class="fa fa-circle"></i>
                            <span>Physical</span> <i class="fa fa-angle-right pull-right"></i>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('admin.product.index')}}"><i class="fa fa-circle"></i>Product List</a></li>
                            <li><a href="{{route('admin.addproduct')}}"><i class="fa fa-circle"></i>Add Product</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="list"></i>
                    <span>Reviews</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.review')  }}">
                            <i class="fa fa-circle"></i>View All
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>