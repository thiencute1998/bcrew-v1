@extends('admin.layouts.master')
@section('admin-css')
    <style type="text/css">
        .product-remove{
            cursor: pointer;
            color: darkred;
        }
        .slide-img {
            max-height: 100px;
        }
    </style>
@endsection
@section('main-content-inner')
    <!-- page title area start -->
    <div class="page-title-area collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="row align-items-center" style="padding: 1.6rem 0;">
            <div class="col-md-6 col-sm-8">
                <div class="search-box pull-left">
                    <form action="{{ route('slides') }}" method="GET" >
                        <input type="text" name="search" placeholder="content..." value="{{ request()->input('search') }}">
                        <i class="ti-search"></i>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 clearfix">

            </div>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <!-- basic table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row form-group justify-content-between">
                            <div >
                                @if (session('delete-success'))
                                    <h5 class="slide-message mb-2 text-success">{{ session('delete-success') }}</h5>
                                @endif
                                <h4 class="header-title">List Photo Editing</h4>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{route('slides-create')}}">
                                    <i class="ti-plus"></i><span>Add</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Content</th>
                                        <th scope="col">Slide</th>
                                        <th>Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($slides as $slide)
                                        <tr>
                                            <th scope="row">{{$slide->content}}</th>
                                            <td><img class="slide-img" width="325" height="158" src=" {{asset('upload/admin/banner/slide/' . $slide->file_name)}}" alt=""></td>
                                            <td style="vertical-align: middle;">
                                                @if($slide->status)
                                                    <span class="text-success">Active</span>
                                                @else
                                                    <span class="text-danger">Nonactive</span>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ route('slides-edit', ['id'=> $slide->id]) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="product-remove" href="{{ route('slides-delete', ['id'=> $slide->id]) }}"
                                                   onclick="return confirm('Are you sure to delete?' )"
                                                >
                                                    <i class="ti-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row" style="justify-content: flex-end;">
                            {{ $slides->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- basic table end -->
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.slide-message').delay(5000).fadeOut();
        })
    </script>
@endsection
