@extends('viewer.layouts.master')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
    .contact-file-upload{
        font-size: 20px;
    }

</style>
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
                                                                                           aria-invalid="false"
                                                                                            required></span>
                                </label></p>
                            <p><label> Your email<br>
                                    <span class="wpcf7-form-control-wrap your-email"><input type="email"
                                                                                            name="email" value=""
                                                                                            size="40"
                                                                                            class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                                                            aria-required="true"
                                                                                            aria-invalid="false"
                                                                                            required></span>
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
                            <p><label>Upload File compressed (.rar, .zip...)</label></p>
                            <div class="contact-file-delete">
                            </div>
                            <div class="contact-file-upload mb-1">
                            </div>
                            <div class="mb-4">
                                <div id="upload-container">
                                    <button id="browseFile" type="button" class="btn btn-primary">Upload File</button>
                                </div>
                                <div class="progress mt-2 mb-2 d-none" style="height: 25px">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">0%</div>
                                </div>
                            </div>

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
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script src="{{ asset('assets/viewer/js/resumable.min.js') }}"></script>
    <script type="text/javascript">
        let browseFile = $('#browseFile');
        let resumable = new Resumable({
            chunkSize: 5 * 1024 * 1024, // 10MB
            target: '{{ route('contact_us_upload_file') }}',
            query:{_token:'{{ csrf_token() }}'} ,// CSRF token
            headers: {
                'Accept' : 'application/json'
            },
            testChunks: false,
            maxFileSize: 2048 * 1024 * 1024, // 1GB
            throttleProgressCallbacks: 1,
        });

        resumable.assignBrowse(browseFile[0]);

        resumable.on('fileAdded', function (file) { // trigger when file picked
            showProgress();
            resumable.upload() // to actually start uploading.
        });

        resumable.on('fileProgress', function (file) { // trigger when file progress update
            $('.progress').removeClass('d-none');
            updateProgress(Math.floor(file.progress() * 100));
        });

        resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
            response = JSON.parse(response)
            if (response.id) {
                $('.contact-file-upload').append(
                    '<div class="contact-file-item mr-3">' +
                    '<span>' + response.file + '</span>' +
                    '<input type="hidden" name="contact_id[]" value="' + response.id + '"/>' +
                    '<input type="hidden" name="contact_file[]" value="' + response.file + '"/>' +
                    '<input type="hidden" name="contact_file_name[]" value="' + response.file_name + '"/>' +
                    '<sup class="contact-file-remove" data-id="' + response.id +'"' +
                    ' data-file="' + response.file_name + '" style="cursor: pointer" title="Remove file">x</sup>' +
                    '</div>'
                );
            }
        });

        resumable.on('fileError', function (file, response) { // trigger when there is any error
        });


        let progress = $('.progress');
        function showProgress() {
            progress.find('.progress-bar').css('width', '0%');
            progress.find('.progress-bar').html('0%');
            progress.find('.progress-bar').removeClass('bg-success');
            progress.show();
        }

        function updateProgress(value) {
            progress.find('.progress-bar').css('width', `${value}%`)
            progress.find('.progress-bar').html(`${value}%`)
        }

        function hideProgress() {
            progress.hide();
        }

        $(document).on('click', '.contact-file-remove', function() {
            $('.contact-file-delete').append(
                '<div>' +
                '<input type="hidden" name="contact_id_remove[]" value="' + $(this).data('id') + '">' +
                '<input type="hidden" name="contact_file_remove[]" value="' + $(this).data('file') + '">' +
                '</div>'
            );
            $(this).closest('.contact-file-item').remove();
        })
    </script>
@endsection
