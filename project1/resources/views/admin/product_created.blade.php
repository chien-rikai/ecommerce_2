@extends('admin.layout.layout')
@section('content')
<body>
    <div class="container">
        <h2>Thêm sản phẩm</h2>
        <form method=""  action="#" class="table-view" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Ảnh</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="images" class="custom-file-input" value="">
                        </input>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input id="tieude" type="text" class="form-control" name="product_name" placeholder="nhập tiêu đề" value="" />
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <input type="text" class="form-control" name="description" placeholder="nhập mô tả" value="" />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input id="price" type="number" class="form-control" name="price" placeholder="giá cả" value="" />
            </div>
            <div class="form-group ">
            <label for="">Category</label>
            <select name="id_category"  class="form-control">
                    <option value="1">Mesc</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
        </form>
    </div>
</body>
@endsection