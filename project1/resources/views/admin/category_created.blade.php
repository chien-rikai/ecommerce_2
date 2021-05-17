@extends('admin.layout.layout')
@section('content')
<body>
    <div class="container">
        <h2>Thêm danh mục</h2>
        <form method="post" action="" class="table-view">
            @csrf
            <div class="form-group">
                <label>Tên danh mục</label>
                <input type="text" class="form-control" name="category" placeholder="nhập danh mục"/>
            </div>
            <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
        </form>
    </div>
</body>
@endsection