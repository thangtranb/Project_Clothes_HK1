@extends('layouts.admin')
@section('main')
        <div class="layout-page mt-3">
          <div class="container">
        <a href="{{route('admin.product.addProduct')}}" class="btn btn-primary mb-2">thêm mới</a>
        <form action="{{ route('admin.product.index') }}" method="GET" class="form-inline">
          <div class="input-group">
            {{-- old giữ giá trị trước đó của một trường thông tin trong Session  --}}
              <input type="text" name="keyword" class="form-control" placeholder="Nhập từ khóa tìm kiếm" value="{{ old('keyword', $keyword) }}">
              <div class="input-group-append">
                  <button type="submit" class="btn btn-primary">
                  <box-icon name='search'></box-icon>
                  </button>
              </div>
          </div>
      </form>
         <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Sale_price</th>
                <th>Gender</th>
                <th>Image</th>
                <th>Category_id</th>
                <th>Status</th>
                <th>description</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($product as $pro)
            <tr>
                <td>{{$pro->id}}</td>
                <td>{{$pro->name}}</td>
                <td>{{$pro->price}}</td>
                <td>{{$pro->sale_price}}</td>
                <td>{{($pro->gender == 'female') ? "Nữ" : "Nam"}} </td>
                <td>
                    <img src="../uploads/{{$pro->image}}" width="60px" alt="">
                </td>
                <td>{{$pro->category->name}}</td>
                <td>{{($pro->status == 0) ? "Còn Hàng" : 'Hết Hàng'}}</td>
                <td>{{($pro->description) }}</td>
                
                <td>
                  <form action="{{route('admin.product.destroy', $pro->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{route('admin.product.editProduct', $pro->id)}}" class="btn btn-primary"><box-icon name='edit' type='solid' ></box-icon></a>
                  <button type="submit" onclick="return confirm('bạn có muốn xóa?')" class="btn btn-danger"><box-icon name='trash' type='solid' ></box-icon></button>
                  </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {{$product->links()}}
     </div>

@endsection