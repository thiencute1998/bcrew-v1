@extends('viewer.layouts.master')
@section('viewer-content')

    <link rel="stylesheet" id="gallery-css" href="{{asset('assets/viewer/style/carousel/gallery9dff.css')}}" type="text/css" media="all">
    <link rel="stylesheet" id="carousel-css" href="{{asset('assets/viewer/style/carousel/owl.carousel.min9dff.css')}}" type="text/css" media="all">
    <link rel="stylesheet" id="animate-css" href="{{asset('assets/viewer/style/carousel/animate9dff.css')}}" type="text/css" media="all">
    <link rel="stylesheet" id="twentytwenty-css" href="{{asset('assets/viewer/style/carousel/twentytwenty9dff.css')}}" type="text/css" media="all">
    <link rel="stylesheet" id="aos-css" href="{{asset('assets/viewer/style/carousel/aos9dff.css')}}" type="text/css" media="all">
    <link rel="stylesheet" id="dvb-style-css" href="{{asset('assets/viewer/style/carousel/style9dff.css')}}" type="text/css" media="all">
    <!-- #masthead -->
    <!-- #masthead -->
    <style>
        .service-tabs ul.nav > li > a {
            padding: 10px 9px !important;
            position: relative;
            text-decoration: none;
            white-space: nowrap;
            display: block;
            text-transform: uppercase;
            font-weight: 400;
        }
        .service-tabs .nav-tabs > li.active > a, .service-tabs .nav-tabs > li.active > a:focus, .service-tabs .nav-tabs > li.active > a:hover{
            color: #fff !important;
        }
    </style>

    <div id="content" class="site-content">
        <div class="container container-service">
            <div class="service-tabs">
                <div class="service-gallery">
                    <div class="sync1 owl-service owl-carousel">
                        @foreach($productDetail->productVideos as $video)
                            <div class="item-video">
                                <a class="owl-video" href="{{$video->link}}"></a>
                            </div>
                        @endforeach
                    </div>
                    <div class="sync2 owl-carousel owl-theme">
                        @foreach($productDetail->productVideos as $video)
                            <div class="item">
                                <img src="{{asset('upload/admin/services/video_slideshow/'. $video->file_name)}}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='{{asset('assets/viewer/js/carousel/jquery4a5f.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets/viewer/js/carousel/bootstrap.min9dff.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets/viewer/js/carousel/owl.carousel.min9dff.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets/viewer/js/carousel/jquery.event.move9dff.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets/viewer/js/carousel/jquery.twentytwenty9dff.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets/viewer/js/carousel/aos9dff.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets/viewer/js/carousel/dvb-custom9dff.js')}}'></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            var $tab_active = '';
            $tab_active1 = window.location.search;
            if ($tab_active1.length){
                var cat_url = $tab_active1.slice(8);
                jQuery('html, body').animate({
                    scrollTop: jQuery('#'+cat_url+'').offset().top - 150
                }, 'slow');

                $(window).load(function(){
                    $(".nav-tabs a[href^='#tab_']").click(function(){
                        setTimeout(function() {
                            $(window).trigger("resize.twentytwenty");
                        }, 300);

                    });
                });
            }
        });
    </script>
@endsection
