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
                                <form id="product-form" name="product-form" action="{{ route('video-slideshow-update', ['id'=> $product->id]) }}" method="POST" enctype="multipart/form-data" class="dropzone border-0">
                                    @csrf
                                    @if (session('edit-success'))
                                        <h5 class="product-message mb-2 text-success">{{ session('edit-success') }}</h5>
                                    @endif
                                    <h4 class="header-title product-add-title">Edit product</h4>
                                    <input type="hidden" id="product-id">
                                    <div class="form-group">
                                        <label for="product-name" class="col-form-label">Name</label>
                                        <input class="form-control" name="name" type="text" value="{{ $product->name }}" id="product-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="product-description" class="col-form-label">Description</label>
                                        <textarea class="form-control" name="description" type="text" id="description" >
                                            {{ $product->description }}
                                        </textarea>
                                    </div>
                                    <div class="videos-collection">
                                        <label for="" class="col-form-label">Link videos</label>
                                        <div class="row">
                                            @if($product->productVideos->count())
                                                @foreach($product->productVideos as $video)
                                                    <div class="col-4 form-group product-videos">
                                                        <input class="form-control" name="videos[]" type="text" value="{{$video->link}}">
                                                        <button type="button" class="btn remove-video" title="Remove link video">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-4 form-group product-videos">
                                                    <input class="form-control" name="videos[]" type="text">
                                                    <button type="button" class="btn remove-video" title="Remove link video">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            @endif
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
            filebrowserUploadUrl: "{{route('video-slideshow-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 600
        });

        $(document).ready(function(){
            $('.product-message').delay(5000).fadeOut();

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

            $(document).on('click', '.remove-video', function() {
                if ($('.remove-video')[1]) {
                    $(this).closest('.product-videos').remove()
                }
            })
        })
    </script>
@endsection
