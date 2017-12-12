@extends('manage.layout')

@section('menu')
    @include('manage.menu')
@endsection

@section('style')
<style type="text/css">
    .row {
        margin-bottom: 15px;
    }
    button a {
        color: #fff;
        text-decoration: none;
        line-height: 20px;
    }
    i {
        cursor: pointer;
    }
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/pagination.css') }}">
@endsection

@section('script')
    <script type="text/javascript">
        function removeConfirm() {
            if(window.confirm('Ban co chac muon xoa san pham nay?')) {
                $('form').submit();
            }
        }
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h3 style="text-align: center">Danh sach san pham.</h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-info"><a href="{{ route('pro-add') }}">Them</a></button>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead>
                    <td>STT</td>
                    <td>Ten sp</td>
                    <td>Anh dai dien</td>
                    <td></td>
                </thead>
                <tbody>
                    @if(count($products))
                        @foreach($products as $key => $pro)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $pro->title }}</td>
                                <td><img src="{{ $pro->thumbnail }}" width="180" height="160"></td>
                                <td>
                                    <form action="{{ route('del-pro') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="{{ $pro->id }}">
                                        <i onclick="removeConfirm();" class="glyphicon glyphicon-trash"></i>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            @if(count($products))
                {{ $products->links('layouts.pagination') }}
            @endif
        </div>
    </div>
@endsection
