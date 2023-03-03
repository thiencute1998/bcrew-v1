@extends('admin.layouts.master')
@section('admin-css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dropzone.min.css') }}"/>
    <style type="text/css">
        .remove-image{
            cursor: pointer;
            color: darkred;
        }
    </style>
@endsection
@section('main-content-inner')
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <form id="demoform" name="demoform" action="{{ route('products-update', ['id'=> $product->id]) }}" method="POST" enctype="multipart/form-data" class="dropzone border-0">
                                    @csrf
                                    <h5 class="product-message mb-2"></h5>
                                    <h4 class="header-title product-add-title">Edit product</h4>
                                    <input type="hidden" id="product-id">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Name</label>
                                        <input class="form-control" name="name" type="text" value="{{ $product->name }}" id="example-text-input" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-search-input" class="col-form-label">Quantity</label>
                                        <input class="form-control" name="quantity" type="number" value="{{ $product->quantity }}" id="example-search-input">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Image</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Images</label>
                                        <ul>
                                            @foreach($product->productImages as $image)
                                                <li class="product-image-item mb-1">
                                                    <a class="product-image" href="{{ asset('upload/admin/product/product_images/' . $image->file_name) }}"
                                                        download="{{ $image->file}}"
                                                        data-name="{{ $image->file_name }}"
                                                       target="_blank"
                                                    >{{$image->file}}
                                                    </a>
                                                    <i class="ti-trash remove-image ml-1" title="Remove image"></i>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div id="dropzoneDragArea"  class="dropzone">
                                            <div class="dropzone-previews"></div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dropzone.min.js') }}"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        // Dropzone.options.demoform = false;
        let token = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
            var myDropzone = new Dropzone("div#dropzoneDragArea", {
                url: "{{ route('products-upload') }}",
                previewsContainer: 'div.dropzone-previews',
                addRemoveLinks: true,
                autoProcessQueue: false,
                params: {
                    _token: token
                },
                // The setting up of the dropzone
                init: function() {
                    var myDropzone = this;
                    //form submission code goes here
                    $("form[name='demoform']").submit(function(event) {
                        //Make sure that the form isn't actully being sent.
                        event.preventDefault();
                        URL = $("#demoform").attr('action');
                        // formData = $('#demoform').serialize();
                        var formData = new FormData(this);
                        let filess = $(".product-image");
                        for (let i = 0; i< filess.length ; i++){
                            formData.append('file_name[]', $(filess[i]).attr('data-name'))
                            formData.append('file_origin[]', $(filess[i]).attr('download'))
                        }
                        $.ajax({
                            type: 'POST',
                            url: URL,
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(result){
                                if (result.code) {
                                    $('#product-id').val(result.id);
                                    $('.product-message').html("<span>Edit success !!!</span>");
                                    $('.product-message').addClass("text-success");
                                    $('.product-message').removeClass("text-danger");
                                    $('.product-message').show().delay(3000).fadeOut();
                                }
                                //process the queue
                                myDropzone.processQueue();
                            },
                            error: function(error){
                                let errorName = "<div>Error happened, Please try again !!!<div>";
                                if (error.status === 422) {
                                    let errors = error.responseJSON.errors;
                                    $.each(errors, (key, value)=> {
                                        errorName += "<div>" + value + "<div>"
                                    })
                                }
                                $('.product-message').html(errorName);
                                $('.product-message').addClass("text-danger");
                                $('.product-message').removeClass("text-success");
                            }
                        });
                    });
                    //Gets triggered when we submit the image.
                    this.on('sending', function(file, xhr, formData){
                        //fetch the user id from hidden input field and send that userid with our image
                        // let userid = document.getElementById('userid').value;
                        formData.append('product_id', $('#product-id').val());
                    });

                    this.on("success", function (file, response) {
                        //reset the form
                        // $('#demoform')[0].reset();
                        //reset dropzone
                        // $('.dropzone-previews').empty();
                    });
                    this.on("queuecomplete", function () {
                        $('.product-message').html("<span>Edit success !!!</span>");
                        $('.product-message').addClass("text-success");
                        $('.product-message').removeClass("text-danger");
                        $('.product-message').show().delay(3000).fadeOut();
                    });

                    // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                    // of the sending event because uploadMultiple is set to true.
                    this.on("sendingmultiple", function() {
                        // Gets triggered when the form is actually being sent.
                        // Hide the success button or the complete form.
                    });

                    this.on("successmultiple", function(files, response) {
                        // Gets triggered when the files have successfully been sent.
                        // Redirect user or notify of success.
                    });

                    this.on("errormultiple", function(files, response) {
                        // Gets triggered when there was an error sending the files.
                        // Maybe show form again, and notify user of error
                    });
                }
            });

            $('.remove-image').on('click', function(){
                let item = this.closest(".product-image-item");
                $(item).remove();
            })
        })
    </script>
@endsection
