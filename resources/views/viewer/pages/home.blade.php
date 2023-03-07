@extends('viewer.layouts.master')
@section('viewer-content')
    <!-- Slide -->
    <div id="content" role="main" class="content-area">
        <div class="slider-wrapper relative" id="slider-1895904380">
            <div class="slider slider-nav-circle slider-nav-large slider-nav-light slider-style-normal"
                 data-flickity-options='{
            "cellAlign": "center",
            "imagesLoaded": true,
            "lazyLoad": 1,
            "freeScroll": false,
            "wrapAround": true,
            "autoPlay": 6000,
            "pauseAutoPlayOnHover" : true,
            "prevNextButtons": true,
            "contain" : true,
            "adaptiveHeight" : true,
            "dragThreshold" : 10,
            "percentPosition": true,
            "pageDots": true,
            "rightToLeft": false,
            "draggable": true,
            "selectedAttraction": 0.1,
            "parallax" : 0,
            "friction": 0.6        }'
            >

                @foreach($slides as $key=> $slide)
                    <div class="row row-full-width slider_home_1" id="{{$slide->file_name}}">


                        <div id="col-1072392032" class="col small-12 large-12">
                            <div class="col-inner">

                                <div class="banner has-hover is-full-height banner-item" id="banner-{{$key}}">
                                    <div class="banner-inner fill">
                                        <div class="banner-bg fill">
                                            <div class="bg fill bg-fill "></div>
                                            <div class="overlay"></div>
                                        </div>

                                        <div class="banner-layers container">
                                            <div class="fill banner-link"></div>

                                            <div id="text-box-2033693785"
                                                 class="text-box banner-layer x50 md-x0 lg-x0 y25 md-y25 lg-y25 res-text">
                                                <div data-animate="fadeInLeft">
                                                    <div class="text-box-content text ">

                                                        <div class="text-inner text-left">


                                                            <div id="text-554125060" class="text text-slider-home">


                                                                <h2><strong>{{$slide->content}}</strong></h2>


                                                                <style>
                                                                    #text-554125060 {
                                                                        font-size: 1.05rem;
                                                                        line-height: 1.95;
                                                                        text-align: left;
                                                                        color: rgb(68, 96, 132);
                                                                    }

                                                                    #text-554125060 > * {
                                                                        color: rgb(68, 96, 132);
                                                                    }
                                                                </style>
                                                            </div>

                                                            <a class="button primary is-outline free-trial"
                                                               style="border-radius:30px;">
                                                                <span>FREE TRIAL</span>
                                                                <i class="icon-angle-right"></i></a>


                                                        </div>
                                                    </div>
                                                </div>
                                                <style>
                                                    #text-box-2033693785 {
                                                        width: 85%;
                                                    }

                                                    #text-box-2033693785 .text-box-content {
                                                        font-size: 100%;
                                                    }

                                                    @media (min-width: 550px) {
                                                        #text-box-2033693785 {
                                                            width: 70%;
                                                        }
                                                    }
                                                </style>
                                            </div>


                                        </div>
                                    </div>


                                    <style>
                                        #banner-{{$key}}  {
                                            padding-top: 100%;
                                        }

                                        #banner-{{$key}} .bg.bg-loaded {
                                            background-image: url({{asset('upload/admin/banner/slide/' . $slide->file_name)}});
                                        }

                                        #banner-{{$key}} .overlay {
                                            background-color: rgba(0, 0, 0, 0.03);
                                        }

                                        #banner-{{$key}} .bg {
                                            background-position: 72% 6%;
                                        }

                                        #banner-{{$key}} .ux-shape-divider--top svg {
                                            height: 150px;
                                            --divider-top-width: 100%;
                                        }

                                        #banner-{{$key}} .ux-shape-divider--bottom svg {
                                            height: 150px;
                                            --divider-width: 100%;
                                        }
                                    </style>
                                </div>


                            </div>
                        </div>


                    </div>
                @endforeach


            </div>

            <div class="loading-spin dark large centered"></div>

        </div>
        <!-- End Slide -->

        <div class="row" id="row-1317027835">


            <div id="col-1111841262" class="col medium-6 small-6 large-3" data-animate="fadeInUp">
                <div class="col-inner">


                    <div class="icon-box featured-box home_icon1 icon-box-center text-center">
                        <div class="icon-box-img" style="width: 60px">
                            <div class="icon">
                                <div class="icon-inner">
                                    <img width="105" height="105"
                                         src="{{asset('assets/viewer/style/images/WORLD.png')}}"
                                         class="attachment-medium size-medium" alt="" decoding="async" loading="lazy"
                                         srcset="{{asset('assets/viewer/style/images/WORLD.png')}} 105w, {{asset('assets/viewer/style/images/WORLD-100x100.png')}} 100w"
                                         sizes="(max-width: 105px) 100vw, 105px"/></div>
                            </div>
                        </div>
                        <div class="icon-box-text last-reset">


                            <h3 class="about-name">WORLD CLASS EDITING</h3>

                        </div>
                    </div>


                </div>
            </div>


            <div id="col-1805728721" class="col medium-6 small-6 large-3" data-animate="fadeInUp">
                <div class="col-inner">


                    <div class="icon-box featured-box home_icon1 icon-box-center text-center">
                        <div class="icon-box-img" style="width: 60px">
                            <div class="icon">
                                <div class="icon-inner">
                                    <img width="105" height="105"
                                         src="{{asset('assets/viewer/style/images/pngegg.png')}}"
                                         class="attachment-medium size-medium" alt="" decoding="async" loading="lazy"
                                         srcset="{{asset('assets/viewer/style/images/pngegg.png')}} 105w, {{asset('assets/viewer/style/images/pngegg-100x100.png')}} 100w"
                                         sizes="(max-width: 105px) 100vw, 105px"/></div>
                            </div>
                        </div>
                        <div class="icon-box-text last-reset">


                            <h3 class="about-name">12-24 HOURS</h3>

                        </div>
                    </div>


                </div>
            </div>


            <div id="col-811057138" class="col medium-6 small-6 large-3" data-animate="fadeInUp">
                <div class="col-inner">


                    <div class="icon-box featured-box home_icon1 icon-box-center text-center">
                        <div class="icon-box-img" style="width: 60px">
                            <div class="icon">
                                <div class="icon-inner">
                                    <img width="105" height="105"
                                         src="{{asset('assets/viewer/style/images/quality.png')}}"
                                         class="attachment-medium size-medium" alt="" decoding="async" loading="lazy"
                                         srcset="{{asset('assets/viewer/style/images/quality.png')}} 105w, {{asset('assets/viewer/style/images/quality-100x100.png')}} 100w"
                                         sizes="(max-width: 105px) 100vw, 105px"/></div>
                            </div>
                        </div>
                        <div class="icon-box-text last-reset">


                            <h3 class="about-name">BEST QUALITY</h3>

                        </div>
                    </div>


                </div>
            </div>


            <div id="col-2052099696" class="col medium-6 small-6 large-3" data-animate="fadeInUp">
                <div class="col-inner">


                    <div class="icon-box featured-box home_icon1 icon-box-center text-center">
                        <div class="icon-box-img" style="width: 60px">
                            <div class="icon">
                                <div class="icon-inner">
                                    <img width="105" height="105"
                                         src="{{asset('assets/viewer/style/images/currency.png')}}"
                                         class="attachment-medium size-medium" alt="" decoding="async" loading="lazy"
                                         srcset="{{asset('assets/viewer/style/images/currency.png')}} 105w, {{asset('assets/viewer/style/images/currency.png')}} 100w"
                                         sizes="(max-width: 105px) 100vw, 105px"/></div>
                            </div>
                        </div>
                        <div class="icon-box-text last-reset">


                            <h3 class="about-name">REASONABLE PRICE</h3>

                        </div>
                    </div>


                </div>
            </div>

        </div>
        <section class="section home_service" id="section_1432597823">
            <div class="bg section-bg fill bg-fill  bg-loaded">


            </div>


            <div class="section-content relative">


                <div id="text-3255906232" class="text tieude_home fadeInUp">


                    <h2 class="block-title" style="text-align: center;"><strong>SERVICES</strong></h2>
                    <div class="desc">
                        <p style="text-align: center;">CLICK AN IMAGE TO SEE THE DIFFERENCE BETWEEN PACKAGES.</p>
                    </div>
                </div>

                <div class="row" id="row-325036830">

                    @foreach($services as $service)
                        <div id="col-1882446736" class="col medium-6 small-12 large-6" data-animate="fadeInLeft">
                            <div class="col-inner">


                                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1682479832">
                                    <a class="" href="{{route($service->link)}}">
                                        <div class="img-inner dark">
                                            <img width="480" height="320"
                                                 src="{{asset("upload/admin/services/introduce/" . $service->file_name)}}"
                                                 class="attachment-large size-large" alt="" decoding="async"
                                                 loading="lazy"/>
                                        </div>
                                    </a>
                                </div>


                                <h3 class="service-name" style="text-align: center;"><a
                                        title="{{strtoupper($service->name)}}"
                                        href="{{route($service->link)}}">{{strtoupper($service->name)}}</a></h3>
                                <div class="desc-service">
                                    <p style="text-align: center;">{{$service->content}}</p>
                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>

            </div>

        </section>

        <section class="section" id="section_1912172091">
            <div class="bg section-bg fill bg-fill  bg-loaded">


            </div>


            <div class="section-content relative">


                <div id="text-1522898948" class="text tieude_home">


                    <h2 class="block-title aos-init aos-animate" style="text-align: center;" data-aos="fade-down"
                        data-aos-easing="linear" data-aos-duration="1500"><strong>ONLY 4 EASY STEPS</strong></h2>
                </div>

                <div class="row only4_home" id="row-127727543">


                    <div id="col-837397933" class="col medium-6 small-6 large-3">
                        <div class="col-inner">


                            <div class="icon-box featured-box icon-box-center text-center">
                                <div class="icon-box-img" style="width: 105px">
                                    <div class="icon">
                                        <div class="icon-inner">
                                            <img width="105" height="105"
                                                 src="{{asset('assets/viewer/style/images/up.png')}}"
                                                 class="attachment-medium size-medium" alt="" decoding="async"
                                                 loading="lazy"
                                                 srcset="{{asset('assets/viewer/style/images/up.png')}} 105w, {{asset('assets/viewer/style/images/up-100x100.png')}} 100w"
                                                 sizes="(max-width: 105px) 100vw, 105px"/></div>
                                    </div>
                                </div>
                                <div class="icon-box-text last-reset">


                                    <div class="box-step">
                                        <div class="title-step">
                                            <h3 class="step-name">UPLOAD IMAGES</h3>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>


                    <div id="col-1877531076" class="col next_icon_home medium-6 small-6 large-3">
                        <div class="col-inner">


                            <div class="icon-box featured-box icon-box-center text-center">
                                <div class="icon-box-img" style="width: 105px">
                                    <div class="icon">
                                        <div class="icon-inner">
                                            <img width="105" height="105"
                                                 src="{{asset('assets/viewer/style/images/INSTRUCTIONS.png')}}"
                                                 class="attachment-medium size-medium" alt="" decoding="async"
                                                 loading="lazy"
                                                 srcset="{{asset('assets/viewer/style/images/INSTRUCTIONS.png')}} 105w, {{asset('assets/viewer/style/images/INSTRUCTIONS-100x100.png')}} 100w"
                                                 sizes="(max-width: 105px) 100vw, 105px"/></div>
                                    </div>
                                </div>
                                <div class="icon-box-text last-reset">


                                    <div class="box-step">
                                        <div class="title-step">
                                            <h3 class="step-name">INSTRUCTIONS</h3>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>


                    <div id="col-1714526472" class="col next_icon_home medium-6 small-6 large-3">
                        <div class="col-inner">


                            <div class="icon-box featured-box icon-box-center text-center">
                                <div class="icon-box-img" style="width: 105px">
                                    <div class="icon">
                                        <div class="icon-inner">
                                            <img width="105" height="105"
                                                 src="{{asset('assets/viewer/style/images/time.png')}}"
                                                 class="attachment-medium size-medium" alt="" decoding="async"
                                                 loading="lazy"
                                                 srcset="{{asset('assets/viewer/style/images/time.png')}} 105w, {{asset('assets/viewer/style/images/time-100x100.png')}} 100w"
                                                 sizes="(max-width: 105px) 100vw, 105px"/></div>
                                    </div>
                                </div>
                                <div class="icon-box-text last-reset">


                                    <div class="box-step">
                                        <div class="title-step">
                                            <h3 class="step-name">WAITING 12-24H</h3>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>


                    <div id="col-657276127" class="col next_icon_home medium-6 small-6 large-3">
                        <div class="col-inner">


                            <div class="icon-box featured-box icon-box-center text-center">
                                <div class="icon-box-img" style="width: 105px">
                                    <div class="icon">
                                        <div class="icon-inner">
                                            <img width="105" height="105"
                                                 src="{{asset('assets/viewer/style/images/down.png')}}"
                                                 class="attachment-medium size-medium" alt="" decoding="async"
                                                 loading="lazy"
                                                 srcset="{{asset('assets/viewer/style/images/down.png')}} 105w, {{asset('assets/viewer/style/images/down-100x100.png')}} 100w"
                                                 sizes="(max-width: 105px) 100vw, 105px"/></div>
                                    </div>
                                </div>
                                <div class="icon-box-text last-reset">


                                    <div class="box-step">
                                        <div class="title-step">
                                            <h3 class="step-name">DOWNLOAD FINALS</h3>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>
@endsection
