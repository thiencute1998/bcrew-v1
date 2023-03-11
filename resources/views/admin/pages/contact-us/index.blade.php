@extends('admin.layouts.master')
@section('admin-css')
    <style type="text/css">
        .service-remove{
            cursor: pointer;
            color: darkred;
        }
        .td-img{
            max-width: 325px;
            max-height: 158px;
            overflow: hidden;
            margin: auto;
        }
    </style>
@endsection
@section('main-content-inner')
    <div class="card-header filter-with" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <div class="mb-0 ml-1">
            Filter with
        </div>
    </div>
    <!-- page title area start -->
    <div class="page-title-area collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="row align-items-center" style="padding: 1.6rem 0;">
            <div class="col-md-6 col-sm-8">
                <div class="search-box pull-left">
                    <form action="{{ route('admin-contact-us') }}" method="GET" >
                        <input class="mr-2 mb-2" type="text" name="name" placeholder="name..." value="{{ request()->input('name') }}">
                        <input type="text" name="email" placeholder="email..." value="{{ request()->input('email') }}">
                        <i class="ti-search"></i>
                        <button type="submit" class="btn btn-primary button-search">Submit</button>
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
                                <h4 class="header-title">List Contact Us</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th class="text-left" scope="col" style="width: 200px;">Name</th>
                                        <th class="text-left" scope="col" style="width: 300px;">Email</th>
                                        <th class="text-left" scope="col" style="width: 300px;">Message</th>
                                        <th class="text-left" scope="col" >Link</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td style="vertical-align: middle" class="text-left">{{$contact->name}}</td>
                                            <td style="vertical-align: middle" class="text-left">{{$contact->email}}</td>
                                            <td style="vertical-align: middle" class="text-left">{!! $contact->message !!}</td>
                                            <td style="vertical-align: middle" class="text-left"><a href="{{$contact->link}}" target="_blank">{{$contact->link}}</a></td>
                                            <td>
                                                <div class="td-img">
                                                    <img class="service-img" width="100px" height="80px"
                                                         src="{{asset('upload/viewer/contact_us/' . $contact->file_name)}}" alt="">
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle">
                                                @if($contact->file_name)
                                                <a href="{{asset('upload/viewer/contact_us/' . $contact->file_name)}}" download="{{$contact->file}}">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row" style="justify-content: flex-end;">
                            {{ $contacts->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- basic table end -->
        </div>
    </div>
@endsection
