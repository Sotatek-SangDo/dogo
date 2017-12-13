@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/etalage.css') }}">
    <style type="text/css">
        .single-sec {
            height: 71vh;
        }
    </style>
@endsection

@section('content')
    <div class="single-sec">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{ route('home')}}">Trang chủ</a></li>
                <li class="active">San pham</li>
            </ol>
         <!-- start content -->
            <div class="col-md-9 det">
                <div class="single_left">
                    <div class="grid images_3_of_2">
                        <ul id="etalage">
                            @foreach($product->imageProducts as $img)
                                <li>
                                    <a href="#">
                                        <img class="etalage_thumb_image" src="{{ $img->pro_img }}" class="img-responsive" />
                                        <img class="etalage_source_image" src="{{ $img->pro_img }}" class="img-responsive" title="" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="single-right">
                    <h3>{{ $product->title }}</h3>
                    <div class="id"><h4>Danh mục: {{ $product->name }}</h4></div>
                    <div class="cost">
                        <div class="prdt-cost">
                            <ul>
                                <li class="active">0123456789</li>
                                <a href="#">Liên hệ</a>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-bottom1">
                        <h6>Mô tả: </h6>
                        <p class="prod-desc">
                            {!! $product->description !!}
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('js/jquery.etalage.min.js') }}"></script>
    <script>
        jQuery(document).ready(function($){

            $('#etalage').etalage({
                thumb_image_width: 300,
                thumb_image_height: 400,
                source_image_width: 900,
                source_image_height: 1200,
                show_hint: true,
                click_callback: function(image_anchor, instance_id){
                    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                }
            });

        });
    </script>

@endsection
