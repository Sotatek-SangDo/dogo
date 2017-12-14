@extends('layouts.app')

@section('style')
    <style type="text/css">
        .header {
            font-size: 3em;
            line-height: 90px;
            margin: 30px 0;
            text-align: center;
        }
        .new-products {
            min-height: 100vh;
            border-bottom: none;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }
        .new-products .item1 {
            display: inline-block;
            min-height: 577px;
        }
        .item-info {
            margin-top: 1.5em;
            text-align: center;
        }
        .thumbnail-pro {
            min-height: 412px;
            display: block;
            background: transparent;
        }
        .thubnail-pro:hover {
            border: none;
        }
        h4.cat {
            font-size: 1.4em;
            margin: 15px 0 30px 0px;
            position: relative;
            padding-bottom: 18px;
        }
        .cat:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 3px;
            left: 0;
            bottom: 0;
            background:rgba(2, 100, 102, 0.83);
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h3 class="header">Sản phẩm</h3>
            <div class="new-products">
            <h4 class="cat"> Tìm kiếm: <b>{{ $search }}</b></h4>
            @foreach($products  as $pro)
                <div class="new-items">
                    <div class="item1">
                        <a class="thumbnail-pro" href="{{ route('detail', ['id' => $pro->id]) }}">
                            <img src="{{ $pro->thumbnail }}" alt="{{ $pro->title }}"/>
                        </a>
                        <div class="item-info">
                            <h4><a href="{{ route('detail', ['id' => $pro->id]) }}">{{ $pro->title}}</a></h4>
                            <a href="#">Liên hệ : 01334564599</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection
