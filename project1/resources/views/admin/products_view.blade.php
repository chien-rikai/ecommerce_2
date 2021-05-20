@extends('admin.layout.layout')
@section('content')
<!-- @if(Session::has('message'))
<div class="alert alert-success text-center" role="alert">
    <strong></strong> {{Session::get('message')}}
</div>
@endif -->
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>Danh sách tin tức</h2>
            </div>
            <div class="col-sm-6">
                <a type="button" class="btn-sm btn-primary new-btn" href="{{route('product.create')}}">Thêm</a>
            </div>
        </div>
        <table class="table-view table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Gía cả</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 1 ?>
                @for($i=0; $i<5 ; $i++) 
                  <tr>
                    <td>
                        <a class="btn btn-default btn-circle">{{$stt++}}</a>
                    </td>
                    <td>
                        <img id="img-product" src="#" alt="Img"></img>
                    </td>
                    <td>
                        <i> </i><br>
                    </td><td>
                    </td><td>
                    </td><td>
                        <a class="btn-default btn-xs" href="">
                            <i class="glyphicon glyphicon-pencil"></i>Sửa</a>
                        <a class="btn-default btn-xs" href="">
                            <i class="glyphicon glyphicon-trash"></i>Delete</a>
                    </td>
                  </tr>
                    @endfor
            </tbody>
        </table>
    </div>
</body>
@endsection
