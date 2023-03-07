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
        .contact-img{
            height: 200px;
        }
    </style>

@endsection
@section('main-content-inner')
    <div class="card-header filter-with" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <div class="mb-0 ml-1">
            <a href="{{route('contacts')}}">List Banner Contact</a>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <form id="product-form" name="product-form" action="{{ route('contacts-update', ['id'=> $contact->id]) }}" method="POST" enctype="multipart/form-data" class="dropzone border-0">
                                    @csrf
                                    @if (session('edit-success'))
                                        <h5 class="contact-message mb-2 text-success">{{ session('edit-success') }}</h5>
                                    @endif
                                    <h4 class="header-title product-add-title">Edit contact</h4>
                                    <div class="form-group">
                                        <label for="services" class="col-form-label">Status</label>
                                        <select class="custom-select contact-status" name="status" data-value="{{ $contact->status }}">
                                            <option value="1" >Active</option>
                                            <option value="0">Nonactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="product-name" class="col-form-label">Link</label>
                                        <input class="form-control" name="link" type="text" value="{{ $contact->link }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="product-description" class="col-form-label">Content</label>
                                        <textarea class="form-control" name="content" type="text" id="content">
                                            {{$contact->content}}
                                        </textarea>
                                    </div>
                                    <div class="images-collection">
                                        <label for="" class="col-form-label">Contact image</label>
                                        <div class="form-group row">
                                            <div class="form-group product-images mr-3">
                                                <div class="d-flex">
                                                    <div class="mb-3 mr-2 image-item" style="position: relative">
                                                        <input type="file" class="files-upload" name="file">
                                                        <img width="540px" height="600px" class="contact-img"
                                                             src="{{asset('upload/admin/banner/contact/' . $contact->file_name)}}">
                                                    </div>
                                                </div>
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
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content', {

        });

        $(document).ready(function(){
            $('.contact-message').delay(5000).fadeOut();

            let status = $('.contact-status').data('value');
            $('.contact-status').val(status);

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
        })
    </script>
@endsection
