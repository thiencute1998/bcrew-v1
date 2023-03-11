<!DOCTYPE html>
<html lang="vi" xmlns="http://www.w3.org/1999/xhtml" prefix="og: https://ogp.me/ns#" class="loading-site no-js">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{$config->name}}</title>
    <meta name="description" content="{{$config->description}}"/>
    <meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
    <link rel="canonical" href="https://photomix.vn/" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{$config->name}}" />
    <meta property="og:description" content="{{$config->description}}" />
    <meta property="og:url" content="https://photomix.vn/" />
    <meta property="og:site_name" content="{{$config->name}}" />
{{--    <meta property="og:image" content="https://photomix.vn/anhquangcao.jpg" />--}}
{{--    <meta property="og:image:secure_url" content="https://photomix.vn/anhquangcao.jpg" />--}}
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="260" />
    <meta property="og:image:alt" content="Home" />
    <meta property="og:image:type" content="image/jpeg" />

    <link rel='stylesheet' id='classic-theme-styles-css' href='{{asset('assets/viewer/style/index.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' id='classic-theme-styles-css' href='{{asset('assets/viewer/style/classic-themes.min.css?ver=1')}}' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-7-css' href='{{asset('assets/viewer/style/styles.css?ver=5.5.6')}}' type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-main-css' href='{{asset('assets/viewer/style/flatsome.css?ver=3.15.4')}}' type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-main-inline-css' href='{{asset('assets/viewer/style/flatsome-shop.css?ver=3.15.4')}}' type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-shop-css' href='{{asset('assets/viewer/style/style.css?ver=3.0')}}' type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-style-css' href='//fonts.googleapis.com/css?family=Roboto%3Aregular%2C700%2Cregular%2C700%2Cregular&#038;display=swap&#038;ver=3.9' type='text/css' media='all' />
    <script type="text/javascript">
        window._nslDOMReady = function (callback) {
            if ( document.readyState === "complete" || document.readyState === "interactive" ) {
                callback();
            } else {
                document.addEventListener( "DOMContentLoaded", callback );
            }
        };
    </script>

    <script type='text/javascript' src='{{asset('assets/viewer/js/jquery.min.js?ver=3.6.1')}}' id='jquery-core-js'></script>
    <script type='text/javascript' src='{{asset('assets/viewer/js/jquery-migrate.min.js?ver=3.3.2')}}' id='jquery-core-js'></script>

</head>

<body class="home page-template page-template-page-blank page-template-page-blank-php page page-id-99 theme-flatsome woocommerce-no-js lightbox nav-dropdown-has-arrow nav-dropdown-has-shadow nav-dropdown-has-border">


<a class="skip-link screen-reader-text" href="#main">Skip to content</a>

<div id="wrapper">
    @include('viewer.layouts.header')


    <main id="main" class="">




           @yield('viewer-content')





    </main>

    @include('viewer.layouts.footer')

</div>

<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">


    <div class="sidebar-menu no-scrollbar ">


        <ul class="nav nav-sidebar nav-vertical nav-uppercase" data-tab="1">
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-99 current_page_item menu-item-427"><a href="{{route('index')}}" aria-current="page">Home</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-293"><a href="{{route('photo_editing')}}">SERVICES</a>
                <ul class="sub-menu nav-sidebar-ul children">
                    @foreach($menuServices as $menu)
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-434"><a href="{{route($menu->link)}}">{{strtoupper($menu->name)}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-291"><a href="{{route('how_to_work')}}">HOW TO WORKS</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-292"><a href="{{route('contact_us')}}">CONTACT US</a></li>
        </ul>


    </div>


</div>

<link rel='stylesheet' id='classic-theme-styles-css' href='{{asset('assets/viewer/style/footer.css')}}' type='text/css' media='all' />
<script type='text/javascript' src='{{asset('assets/viewer/js/regenerator-runtime.min.js?ver=0.13.9')}}' id='jquery-core-js'></script>
<script type='text/javascript' src='{{asset('assets/viewer/js/wp-polyfill.min.js?ver=3.15.0')}}' id='jquery-core-js'></script>

<script type='text/javascript' id='contact-form-7-js-extra'>
    /* <![CDATA[ */
    var wpcf7 = {"api":{"root":"https:\/\/specialediting.org\/wp-json\/","namespace":"contact-form-7\/v1"}};
    /* ]]> */
</script>
{{--<script type='text/javascript' src='{{asset('assets/viewer/js/index.js?ver=5.5.6')}}' ></script>--}}
<script type='text/javascript' src='{{asset('assets/viewer/js/jquery.blockUI.min.js?ver=2.7.0-wc.6.4.1')}}' ></script>

<script type='text/javascript' id='wc-add-to-cart-js-extra'>
    /* <![CDATA[ */
    var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","i18n_view_cart":"Xem gi\u1ecf h\u00e0ng","cart_url":"https:\/\/specialediting.org\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
    /* ]]> */
</script>
<script type='text/javascript' src='{{asset('assets/viewer/js/add-to-cart.min.js?ver=6.4.1')}}' id='wc-add-to-cart-js'></script>
<script type='text/javascript' src='{{asset('assets/viewer/js/js.cookie.min.js?ver=2.1.4-wc.6.4.1')}}' id='js-cookie-js'></script>
<script type='text/javascript' id='woocommerce-js-extra'>
    /* <![CDATA[ */
    var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%"};
    /* ]]> */
</script>
<script type='text/javascript' src='{{asset('assets/viewer/js/woocommerce.min.js')}}' id='woocommerce-js'></script>
<script type='text/javascript' id='wc-cart-fragments-js-extra'>
    /* <![CDATA[ */
    var wc_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_b52988832a8ba1963d39feb4091f8172","fragment_name":"wc_fragments_b52988832a8ba1963d39feb4091f8172","request_timeout":"5000"};
    /* ]]> */
</script>
<script type='text/javascript' src='{{asset('assets/viewer/js/cart-fragments.min.js?ver=6.4.1')}}' id='wc-cart-fragments-js'></script>
<script type='text/javascript' src='{{asset('assets/viewer/js/flatsome-live-search.js?ver=3.15.4')}}' id='flatsome-live-search-js'></script>

<script type='text/javascript' src='{{asset('assets/viewer/js/hoverIntent.min.js')}}' id='hoverIntent-js'></script>
<script type='text/javascript' id='flatsome-js-extra'>
    /* <![CDATA[ */
    var flatsomeVars = {"theme":{"version":"3.15.4"},"ajaxurl":"https:\/\/specialediting.org\/wp-admin\/admin-ajax.php","rtl":"","sticky_height":"70","assets_url":"https:\/\/specialediting.org\/wp-content\/themes\/flatsome\/assets\/js\/","lightbox":{"close_markup":"<button title=\"%title%\" type=\"button\" class=\"mfp-close\"><svg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" width=\"28\" height=\"28\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-x\"><line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"><\/line><line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"><\/line><\/svg><\/button>","close_btn_inside":false},"user":{"can_edit_pages":false},"i18n":{"mainMenu":"Main Menu"},"options":{"cookie_notice_version":"1","swatches_layout":false,"swatches_box_select_event":false,"swatches_box_behavior_selected":false,"swatches_box_update_urls":"1","swatches_box_reset":false,"swatches_box_reset_extent":false,"swatches_box_reset_time":300,"search_result_latency":"0"},"is_mini_cart_reveal":"1"};
    /* ]]> */
</script>
<script type='text/javascript' src='{{asset('assets/viewer/js/flatsome.js')}}' id='flatsome-js'></script>
<script type='text/javascript' src='{{asset('assets/viewer/js/woocommerce.js')}}' id='flatsome-theme-woocommerce-js'></script>
<!--[if IE]>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/intersection-observer-polyfill@0.1.0/dist/IntersectionObserver.js?ver=0.1.0' id='intersection-observer-polyfill-js'></script>
<![endif]-->

</body>
</html>
