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
                        @if ($errors->any())
                            <div>
                                    @foreach ($errors->all() as $error)
                                    <h5 class="send-message mb-2 text-danger" style="color: #F40C0C!important;">
                                        {{ $error }}
                                    </h5>
                                    @endforeach
                            </div>
                        @endif
                    </div>

                    <div role="form" class="wpcf7" id="wpcf7-f6-p285-o1" lang="vi" dir="ltr">
                        <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p>
                            <ul></ul>
                        </div>
                        <form action="{{route('contact_us_send_mail')}}" method="post" class="wpcf7-form init" enctype="multipart/form-data"
                              >
                            @csrf
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
                            <p>
                                <label> Your message (optional)<br>
                                    <span class="wpcf7-form-control-wrap your-message"><textarea name="message"
                                                                                                 cols="40" rows="10"
                                                                                                 class="wpcf7-form-control wpcf7-textarea"
                                                                                                 aria-invalid="false"></textarea></span>
                                </label></p>
                            <p>
                                <p>
                                <label >Link file (optional)</label>
                                <span class="wpcf7-form-control-wrap your-name"><input type="text" name="link"
                                                                                       value="" size="40"
                                                                                       class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                       ></span>
                            </p>
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
