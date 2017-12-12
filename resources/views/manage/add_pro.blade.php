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
    </style>
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
                            <label>Danh Mục: </label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="description" style="resize: none" cols="8" rows="8"></textarea>
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
