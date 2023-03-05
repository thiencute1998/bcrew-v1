<header id="header" class="header has-sticky sticky-jump">
    <div class="header-wrapper">
        <div id="masthead" class="header-main ">
            <div class="header-inner flex-row container logo-left" role="navigation">

                <!-- Logo -->
                <div id="logo" class="flex-col logo">
                    <!-- Header logo -->
                    <a href="{{route('index')}}" title="{{$logoWeb ? $logoWeb->name : ""}}" rel="home">
                        <img width="375" height="158" src="{{"upload/admin/banner/logo/". ($logoWeb ? $logoWeb->file_name : "")}}" class="header_logo header-logo" alt="{{$logoWeb ? $logoWeb->name : ""}}"/>
                        <img  width="375" height="158" src="{{"upload/admin/banner/logo/". ($logoWeb ? $logoWeb->file_name : "")}}" class="header-logo-dark" alt="{{$logoWeb ? $logoWeb->name : ""}}"/></a>
                </div>

                <!-- Mobile Left Elements -->
                <div class="flex-col show-for-medium flex-left">
                    <ul class="mobile-nav nav nav-left ">
                    </ul>
                </div>

                <!-- Left Elements -->
                <div class="flex-col hide-for-medium flex-left
            flex-grow">
                    <ul class="header-nav header-nav-main nav nav-left  nav-uppercase" >
                    </ul>
                </div>

                <!-- Right Elements -->
                <div class="flex-col hide-for-medium flex-right">
                    <ul class="header-nav header-nav-main nav nav-right  nav-uppercase">
                        <li id="menu-item-427" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-99 current_page_item menu-item-427 active menu-item-design-default"><a href="{{route('index')}}" aria-current="page" class="nav-top-link">Home</a></li>
                        <li id="menu-item-293" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-293 menu-item-design-default has-dropdown"><a href="https://specialediting.org/services/" class="nav-top-link">SERVICES<i class="icon-angle-down" ></i></a>
                            <ul class="sub-menu nav-dropdown nav-dropdown-default">
                                @foreach($menuServices as $menu)
                                    <li id="menu-item-434" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-434"><a href="{{route($menu->link)}}">{{strtoupper($menu->name)}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li id="menu-item-291" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-291 menu-item-design-default"><a href="{{route('how_to_work')}}" class="nav-top-link">HOW TO WORKS</a></li>
                        <li id="menu-item-292" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-292 menu-item-design-default"><a href="{{route('contact_us')}}" class="nav-top-link">CONTACT US</a></li>
                    </ul>
                </div>

                <!-- Mobile Right Elements -->
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right ">
                        <li class="nav-icon has-icon">
                            <a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay" data-color="" class="is-small" aria-label="Menu" aria-controls="main-menu" aria-expanded="false">
                                <i class="icon-menu" ></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="container"><div class="top-divider full-width"></div></div>
        </div>
        <div class="header-bg-container fill"><div class="header-bg-image fill"></div><div class="header-bg-color fill"></div></div>		</div>
</header>
