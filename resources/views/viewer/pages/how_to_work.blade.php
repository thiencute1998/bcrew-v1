@extends('viewer.layouts.master')
@section('viewer-content')
    <div id="content" role="main" class="content-area">

        <div id="text-3637920921" class="text ipixal_htw_block2">
            <h2 class="only-step aos-init aos-animate" data-aos="fade-down">{!! $work->content !!}</h2>

            <style>
                #text-3637920921 {
                    text-align: center;
                }
            </style>
        </div>

        <div class="row ipixal_htw_block3" id="row-1527436593">
            <div id="col-545923776" class="col small-12 large-12">
                <div class="col-inner">
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1243734441">
                        <div class="img-inner dark">
                            <img width="1020" height="620"
                                 src="{{asset('upload/admin/how-to-work/'. $work->file_name)}}"
                                 class="attachment-large size-large" alt="" decoding="async" loading="lazy"
                                 srcset="{{asset('upload/admin/how-to-work/'. $work->file_name)}} 1070w, {{asset('upload/admin/how-to-work/'. $work->file_name)}} 658w, {{asset('upload/admin/how-to-work/'. $work->file_name)}} 768w, {{asset('upload/admin/how-to-work/'. $work->file_name)}} 600w"
                                 sizes="(max-width: 1020px) 100vw, 1020px">
                        </div>

                        <style>
                            #image_1243734441 {
                                width: 100%;
                            }
                        </style>
                    </div>

                </div>
            </div>

        </div>


    </div>
@endsection
