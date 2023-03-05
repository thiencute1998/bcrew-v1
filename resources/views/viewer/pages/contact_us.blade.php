@extends('viewer.layouts.master')
@section('viewer-content')
    <style type="text/css">
        .ipixal_ctus_block1 .col1 {
            background: url({{asset("upload/admin/banner/contact/". ($bannerContact ? $bannerContact->file_name : ""))}});
        }
    </style>
    <div id="content" role="main" class="content-area">
        <div class="row ipixal_ctus_block1" id="row-1162628788">
            <div id="col-803581550" class="col col1 medium-6 small-12 large-6">
                <div class="col-inner">
                    <div id="text-2058545210" class="text text1">
                        {!! $bannerContact ? $bannerContact->content : "" !!}
                    </div>
                </div>
            </div>
            <div id="col-660915406" class="col col2 medium-6 small-12 large-6">
                <div class="col-inner">
                    <div id="text-2033279209" class="text text1">
                        <h2>CONTACT FORM</h2>
                    </div>
                    <div id="text-610695375" class="text text2">
                        @if (session('send-success'))
                            <h5 class="send-message mb-2 text-success" style="color: #28a745!important;">{{ session('send-success') }}</h5>
                            @endif
                        </p>
                    </div>

                    <div role="form" class="wpcf7" id="wpcf7-f6-p285-o1" lang="vi" dir="ltr">
                        <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p>
                            <ul></ul>
                        </div>
                        <form action="{{route('contact_us_send_mail')}}" method="post" class="wpcf7-form init" enctype="multipart/form-data"
                              >
                            @csrf
                            <div style="display: none;">
                                <input type="hidden" name="_wpcf7" value="6">
                                <input type="hidden" name="_wpcf7_version" value="5.5.6">
                                <input type="hidden" name="_wpcf7_locale" value="vi">
                                <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f6-p285-o1">
                                <input type="hidden" name="_wpcf7_container_post" value="285">
                                <input type="hidden" name="_wpcf7_posted_data_hash" value="">
                                <input type="hidden" name="_wpcf7_recaptcha_response"
                                       value="03AFY_a8V0lcls1uy3B_PbO1g4C5Wv5xlV2Xrb7C44yyLRcEcnasC51WMudINzHZARwG9fED0R2brP-TyXIPKKts6gyThqejNgBejg_GGgBfaYrthaAeIls34oBbvghSViXh8nYs0H0p6zxHw2WGihH3-hcgo_NDbgGKpb1TLyjyQsSjXW0xbErOv4JVhMutSizi84MCEKqc5CE1m-BPxFrUzr_G2H8WMTitezfBslyEOKFc8D7E8rUIfuPi2ugkxD0PFLqrzCCl9JOs580ASczYSJ7OIgfu61HBieEdMIJxdL5FJZwB9f5UD-eMU_ASspV4nD_83cudYT_EK0Sh0_f6KiyUeFmx5-aZwQ_SSOSwxASIIuC-2wqTkXo80vEIdURqIUNdO-HLoQNUJBiFPaE5T9c6BNHKC9uOKlev5PZqUPnVFG_WYXf488m5s1XgeuD8dSUTmGbxAWRqt2tqeH7Prsw8iDssDRj8VUh5IN0etW6MILx9hTmeCjlLP48dMX3yA9V1OOfk4ERQFM91mAzHBw9aBa4HggsQ">
                            </div>
                            <p><label> Your name<br>
                                    <span class="wpcf7-form-control-wrap your-name"><input type="text" name="name"
                                                                                           value="" size="40"
                                                                                           class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                           aria-required="true"
                                                                                           aria-invalid="false"></span>
                                </label></p>
                            <p><label> Your email<br>
                                    <span class="wpcf7-form-control-wrap your-email"><input type="email"
                                                                                            name="email" value=""
                                                                                            size="40"
                                                                                            class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                                                            aria-required="true"
                                                                                            aria-invalid="false"></span>
                                </label></p>
                            <p><label> Your message (optional)<br>
                                    <span class="wpcf7-form-control-wrap your-message"><textarea name="message"
                                                                                                 cols="40" rows="10"
                                                                                                 class="wpcf7-form-control wpcf7-textarea"
                                                                                                 aria-invalid="false"></textarea></span>
                                </label></p>
                            <p>
                                <label>Image (optional)<br>
                                    <span class="wpcf7-form-control-wrap your-email">
                                        <input type="file" name="file">
                                    </span>
                                </label>
                            </p>
                            <p><input type="submit" value="Submit"
                                      class="wpcf7-form-control has-spinner wpcf7-submit"><span
                                    class="wpcf7-spinner"></span></p>
                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
