@extends('admin.layouts.master')
@section('admin-css')
    <style type="text/css">
        .product-remove{
            cursor: pointer;
            color: darkred;
        }
    </style>
@endsection
@section('main-content-inner')
<!-- page title area start -->
<div class="page-title-area collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
    <div class="row align-items-center" style="padding: 1.6rem 0;">
        <div class="col-md-6 col-sm-8">
            <div class="search-box pull-left">
                <form action="{{ route('products') }}" method="GET" >
                    <input type="text" name="search" placeholder="Search..." value="{{ request()->input('search') }}">
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
                                <h5 class="product-message mb-2 text-success">{{ session('delete-success') }}</h5>
                            @endif
                            <h4 class="header-title">List Products</h4>
                        </div>
                        <div>
                            <a class="btn btn-primary" href="products/create">
                                <i class="ti-plus"></i><span>Add</span>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row">{{$product->name}}</th>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->image}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>
                                            <a href="{{ route('products-edit', ['id'=> $product->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="product-remove" href="{{ route('products-delete', ['id'=> $product->id]) }}"
                                               onclick="return confirm('Are you sure to delete product : {{ $product->name }} ?' )"
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
                        {{ $products->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- basic table end -->
    </div>
</div>
@endsection
