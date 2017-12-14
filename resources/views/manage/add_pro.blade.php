@extends('manage.layout')

@section('menu')
    @include('manage.menu')
@endsection
@section('style')
    <style type="text/css">
        .form {
            margin-top: 5%;
        }
        div#show-img {
            margin: 20px 0px 30px 0px;
            padding: 20px 0;
        }
        .img {
            margin-bottom: 16px;
        }
        div.col-md-12 {
            margin-bottom: 10px;
        }
        span#mceu_30 {
            display: none;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="http://www.tinymce.com/css/codepen.min.css">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <h3 style="text-align: center">Thêm sản phẩm</h3>
            <div class="form">
                <form action="{{ route('new-pro') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group col-md-12">
                        <div class="col-md-2">
                            <label>Tên sản phẩm: </label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="col-md-2">
                            <label>Danh Mục: </label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" name="cat_id">
                                <option value="-1">Chọn danh mục</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="col-md-2">
                            <label>Mo ta: </label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Anh dai dien: </label>
                        <input type="file" name="thumbnail" onchange="loadFile(event, 'show-image')">
                        <div class="col-md-12" id="show-image"></div>
                    </div>
                    <div class="col-md-12">
                        <label>Album anh: </label>
                        <input type="file" name="file_img[]" multiple onchange="loadFile(event, 'show-img')">
                        <div class="col-md-12" id="show-img"></div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=eoyxla08gew2itcni08oexsea1sdp5w0p8mtiys5am2n79do"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 200,
            theme: 'modern',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            image_advtab: true,
        });
    </script>
    <script type="text/javascript">
        function loadFile(event, id) {
            var files = event.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var html = '';
            filesArr.forEach(function(f) {
                html += '<div class="col-md-4 img"><img src="'+ URL.createObjectURL(f) +'" width="320" height="250"></div>';
            });
            var output = document.getElementById(id);
            output.innerHTML = html;
        };
    </script>
@endsection
