<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="admin"><img src="assets/images/icon/logo.png" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="admin" aria-expanded="true"><i class="ti-dashboard"></i><span>Introduce</span></a>
                    </li>
                    <li>
                        <a href="admin/services" aria-expanded="true"><i class="ti-dashboard"></i><span>Services</span></a>
                        <ul class="collapse">
                            <li class="active"><a href="{{ route('photo-editing') }}">Photo Editing</a></li>
                            <li><a href="{{ route('virtual-staging') }}">Virtual staging</a></li>
                            <li><a href="{{ route('floor-plan') }}">Floor plan</a></li>
                            <li><a href="{{ route('video-slideshow') }}">Video slideshow</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="admin/banners" aria-expanded="true"><i class="ti-dashboard"></i><span>Banners</span></a>
                        <ul class="collapse">
                            <li class="active"><a href="logo">Logo</a></li>
                            <li><a href="slide">Slides</a></li>
                            <li><a href="contact">Contact</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="admin/how-to-works" aria-expanded="true"><i class="ti-dashboard"></i><span>How to works</span></a>
                    </li>
                    <li>
                        <a href="admin/banners" aria-expanded="true"><i class="ti-dashboard"></i><span>Admin</span></a>
                        <ul class="collapse">
                            <li class="active"><a href="{{route('configs')}}">Config</a></li>
                            <li><a href="{{route('users')}}">Users</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
