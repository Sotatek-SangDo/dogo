@extends('layouts.app')

@section('style')
    <style type="text/css">
        .rslides li{
            max-height: 552px;
        }
        .rslides li img {
            width: 100%;
            height: auto;
        }
        .new_middle {
            margin: 0 2% 4% 0;
            min-height: 580px;
            width: 31%;
        }
        .thumb {
            min-height: 485px;
            display: block;
            background: transparent;
        }
        .item-info2 {
            text-align: center;
        }
    </style>
@endsection

@section('content')

        <div class="content">
             <div class="container">
                 <div class="slider">
                        <ul class="rslides" id="slider1">
                            @foreach($slideProducts as $pro)
                                <li><img src="{{ $pro->thumbnail }}" alt="{{ $pro->title}}" height="800"></li>
                            @endforeach
                        </ul>
                 </div>
             </div>
        </div>
        <!---->
        <div class="bottom_content">
             <div class="container">
                 <div class="sofas">
                     <div class="col-md-6 sofa-grid">
                         <img src="images/t1.jpg" alt=""/>
                         <h3>BÀN GHẾ</h3>
                         <h4><a href="{{ route('cat', ['cat_slug' => 'ban_ghe']) }}">Xem tất cả</a></h4>
                     </div>
                     <div class="col-md-6 sofa-grid sofs">
                         <img src="images/t2.jpg" alt=""/>
                         <h3>TỦ GỖ</h3>
                         <h4><a href="{{ route('cat', ['cat_slug' => 'tu_go']) }}">Xem tất cả</a></h4>
                     </div>
                     <div class="clearfix"></div>
                 </div>
             </div>
        </div>
        <!---->
        <div class="new">
             <div class="container">
                <h3>Sản phẩm</h3>
                <div class="new-products">
                    @foreach($allProduct as $product)
                        <div class="new-items new_middle">
                            <a class="thumb" href="{{ route('detail', ['id' => $product->id]) }}">
                                <img src="{{ $product->thumbnail }}" alt="{{ $product->title }}"/>
                            </a>
                            <div class="item-info2">
                                <h4><a href="{{ route('detail', ['id' => $product->id]) }}">{{ $product->title }}</a></h4>
                                 <span>{{ $product->name }}</span>
                                <a href="#">Lien he : 0123456789</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
             </div>
        </div>
        <!---->
        <div class="top-sellers">
             <div class="container">
                 <h3>Sản phẩm bán chạy</h3>
                 <div class="seller-grids">
                     <div class="col-md-3 seller-grid">
                         <a href="products.html"><img src="images/ts2.jpg" alt=""/></a>
                         <h4><a href="products.html">Carnival Doublecot Bed</a></h4>
                         <span>ID: DB4790</span>
                         <p>Rs. 25000/-</p>
                     </div>
                     <div class="col-md-3 seller-grid">
                         <a href="products.html"><img src="images/ts11.jpg" alt=""/></a>
                         <h4><a href="products.html">Home Bar Furniture</a></h4>
                         <span>ID: BR4822</span>
                         <p>Rs. 5000/-</p>
                     </div>
                     <div class="col-md-3 seller-grid">
                         <a href="products.html"><img src="images/ts3.jpg" alt=""/></a>
                         <h4><a href="products.html">L-shaped Fabric Sofa set</a></h4>
                         <span>ID: LF8560</span>
                         <p>Rs. 45000/-</p>
                     </div>
                     <div class="col-md-3 seller-grid">
                         <a href="products.html"><img src="images/ts4.jpg" alt=""/></a>
                         <h4><a href="products.html">Ritz Glass Dinning Table </a></h4>
                         <span>ID: DB4790</span>
                         <p>Rs. 18000/-</p>
                     </div>
                     <div class="clearfix"></div>
                 </div>
             </div>
        </div>
        <!---->
        <div class="recommendation">
             <div class="container">
                 <div class="recmnd-head">
                     <h3>Sản phẩm mới</h3>
                 </div>
                 <div class="bikes-grids">
                     <ul id="flexiselDemo1">
                        @foreach($lastestPros as $pro)
                            <li>
                                <a href="{{ route('detail', ['id' => $pro->id]) }}">
                                <img src="{{ $pro->thumbnail }}" alt="{{ $pro->title}}"/></a>
                                <h4><a href="{{ route('detail', ['id' => $pro->id]) }}">{{ $pro->title}}</a></h4>
                                <p>{{ $pro->name}}</p>
                            </li>
                        @endforeach
                    </ul>
             </div>
             </div>
        </div>
@endsection

@section('script')
<script type="text/javascript">
    $(window).load(function() {
        $("#flexiselDemo1").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover:true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });
    });
</script>
<script type="text/javascript" src="{{ asset('js/jquery.flexisel.js') }}"></script>
@endsection
