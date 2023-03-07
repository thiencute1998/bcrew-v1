<footer id="footer" class="footer-wrapper">

    <div class="row footer_block1" id="row-99265146">


        <div id="col-2132257071" class="col col1 medium-12 small-12 large-4">
            <div class="col-inner">


                <div id="text-1922354429" class="text text1">


                    <h2 class="widget-title">FOLLOW US</h2>
                </div>

                <div class="row" id="row-1040594214">


                    <div id="col-289615390" class="col medium-4 small-12 large-4">
                        <div class="col-inner">


                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_512592536">
                                <a class="" href="mailto:{{$config ? $config->email_admin : ""}}">
                                    <div class="img-inner dark">
                                        <img width="1" height="1"
                                             src="{{asset('assets/viewer/style/images/ic_mail.svg')}}"
                                             class="attachment-large size-large" alt="" decoding="async"
                                             loading="lazy"/>
                                    </div>
                                </a>

                            </div>


                        </div>
                    </div>


                    <div id="col-960676013" class="col medium-4 small-12 large-4">
                        <div class="col-inner">


                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1503759507">
                                <a class=""
                                   href="{{$config ? $config->instagram : ""}}">
                                    <div class="img-inner dark">
                                        <img width="1" height="1"
                                             src="{{asset('assets/viewer/style/images/ic_ista.svg')}}"
                                             class="attachment-large size-large" alt="" decoding="async"
                                             loading="lazy"/>
                                    </div>
                                </a>

                            </div>


                        </div>
                    </div>


                    <div id="col-13883005" class="col medium-4 small-12 large-4">
                        <div class="col-inner">


                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_916426427">
                                <a class=""
                                   href="{{$config ? $config->facebook : ""}}">
                                    <div class="img-inner dark">
                                        <img width="1" height="1"
                                             src="{{asset('assets/viewer/style/images/ic_face.svg')}}"
                                             class="attachment-large size-large" alt="" decoding="async"
                                             loading="lazy"/>
                                    </div>
                                </a>

                            </div>


                        </div>
                    </div>


                </div>

            </div>
        </div>


        <div id="col-1207962292" class="col col2 medium-12 small-12 large-4">
            <div class="col-inner">


                <h2 class="widget-title">CONTACT US</h2>
                <div id="text-1519532338" class="text text2">


                    <ul>
                        <li class="has-label" style="text-align: left;"><strong>Email</strong>
                            <div><a href="mailto:{{$config ? $config->email_admin : ""}}">{{$config ? $config->email_admin : ""}}</a></div>
                        </li>
                        <li class="has-label"><strong>Phone</strong>
                            <div>{{$config ? $config->hotline_1 : ""}}</div>
                        </li>
                    </ul>


                </div>


            </div>
        </div>


        <div id="col-1189175058" class="col col3 medium-12 small-12 large-4">
            <div class="col-inner">


                <iframe
                    src="https://www.facebook.com/plugins/page.php?href={{$config ? $config->facebook_page : ""}}%2F&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                    width="340" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                    allowfullscreen="true"
                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>


            </div>
        </div>


    </div>
    <div class="absolute-footer dark medium-text-center text-center">
        <div class="container clearfix">


            <div class="footer-primary pull-left">
                <div class="copyright-footer">
                    Copyright 2023 © <strong>{{$config->name}}</strong></div>
            </div>
        </div>
    </div>

    <a href="#top" class="back-to-top button icon invert plain fixed bottom z-1 is-outline hide-for-medium circle"
       id="top-link" aria-label="Go to top"><i class="icon-angle-up"></i></a>

</footer>
{{$config->code_google}}
