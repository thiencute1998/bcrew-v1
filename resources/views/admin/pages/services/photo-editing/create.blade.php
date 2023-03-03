@extends('admin.layouts.master')
@section('admin-css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .files-upload {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        .product-images {
            margin-left: 15px;
            margin-right: 15px;
        }
        .product-img{
            height: 150px;
        }
        .product-videos {
            position: relative;
        }
        .remove-video {
            position: absolute;
            right: 0;
            top: 0;
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
                                <form id="product-form" name="product-form" action="{{ route('photo-editing-store') }}" method="POST" enctype="multipart/form-data" class="dropzone border-0">
                                    @csrf
                                    @if (session('add-success'))
                                        <h5 class="product-message mb-2 text-success">{{ session('add-success') }}</h5>
                                    @endif
                                    <h4 class="header-title product-add-title">Add photo editing</h4>
                                    <input type="hidden" id="product-id">
                                    <div class="form-group">
                                        <label for="product-name" class="col-form-label">Name</label>
                                        <input class="form-control" name="name" type="text" value="{{ old('name') }}" id="product-name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="product-description" class="col-form-label">Description</label>
                                        <textarea class="form-control" name="description" type="text" id="description" required >
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="services" class="col-form-label">Service</label>
                                        <select class="custom-select product-service" name="service_id" id="services">
                                            <option value="1" selected>PHOTO EDTITING</option>
                                            <option value="2">VITURAL STAGING</option>
                                            <option value="3">FLOOR PLAN</option>
                                            <option value="4">VIDEO SLIDESHOW</option>
                                        </select>
                                    </div>
                                    <div class="images-collection">
                                        <input type="hidden" class="product-total-images" name="total_image" value="1">
                                        <label for="" class="col-form-label">Images</label>
                                        <div class="form-group row">
                                            <div class="form-group product-images mr-3">
                                                <div class="d-flex">
                                                    <div class="mb-3 mr-2 image-item" style="position: relative">
                                                        <input type="file" class="files-upload" name="file_start1">
                                                        <img width="150px" height="150px" class="product-img">
                                                    </div>
                                                    <div class="mb-3 mr-2 image-item" style="position: relative">
                                                        <input type="file" class="files-upload" name="file_end1">
                                                        <img width="150px" height="150px" class="product-img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="button" class="btn add-images" title="Add partner images">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="videos-collection d-none">
                                        <label for="" class="col-form-label">Link videos</label>
                                        <div class="row">
                                            <div class="col-4 form-group product-videos">
                                                <input class="form-control" name="videos[]" type="text">
                                                <button type="button" class="btn remove-video" title="Remove partner images">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="button" class="btn add-videos" title="Add video">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
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
    <script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });

        $(document).ready(function(){
            $('.product-message').delay(5000).fadeOut();

            $('#product-form').on('click', '.add-images', function() {
                let totalImage = $('.product-total-images').val();
                totalImage = Number(totalImage) + 1;
                $('.product-total-images').val(totalImage);
                $('.product-images').last().after(
                    '<div class="form-group product-images mr-3">' +
                    '<div class="d-flex">'+
                    '<div class="mb-3 mr-2 image-item" style="position: relative">' +
                    '<input type="file" class="files-upload" name="file_start' + totalImage + '">' +
                    '<img width="150px" height="150px" class="product-img">' +
                    '</div>'+
                '<div class="mb-3 mr-2 image-item" style="position: relative">'+
                    '<input type="file" class="files-upload" name="file_end' + totalImage + '">'+
                        '<img width="150px" height="150px" class="product-img">'+
                '</div>'+
                '<div class="zoomimages" style="align-self: center;">'+
                    '<div class="dlmedium">'+
                        '<button type="button" class="btn remove-images" title="Remove partner images">'+
                            '<i class="fa fa-trash"></i>'+
                        '</button>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '</div>'
                );
            });

            $(document).on('change', '.files-upload', function() {
                let vm = this;
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $(vm).next().attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            $(document).on('click', '.remove-images', function(){
                $(this).closest('.product-images').remove();
            })

            $(document).on('click', '.add-videos', function() {
                $('.product-videos').last().after(
                    '<div class="col-4 form-group product-videos">' +
                    '<input class="form-control" name="videos[]" type="text">' +
                    '<div class="dlmedium">'+
                        '<button type="button" class="btn remove-video" title="Remove partner images">'+
                            '<i class="fa fa-trash"></i>'+
                            '</button>'+
                        '</div>'+
                    '</div>'
                )
            })

            $('.product-service').on('change', function() {
                let serviceType = $(this).val();
                if (serviceType == 4) {  // Video
                    $('.videos-collection').removeClass('d-none');
                    $('.images-collection').addClass('d-none');
                } else {
                    $('.images-collection').removeClass('d-none');
                    $('.videos-collection').addClass('d-none');
                }
            });

            $(document).on('click', '.remove-video', function() {
                $(this).closest('.product-videos').remove()
            })
        })
    </script>
@endsection
