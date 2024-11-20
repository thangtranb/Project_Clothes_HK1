@extends('layouts.admin')
@section('main')
        <div class="layout-page mt-3">
         <div class="container">
        <a href="{{route('admin.category.addCategory')}}" class="btn btn-primary mb-2">Thêm mới</a>
        <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($category as $cat)
            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->name}}</td>
                <td>{{($cat->status == 0) ? "Ẩn" : 'hiển thị'}}</td>
                <td>
                    <form action="{{route('admin.category.destroy', $cat->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{route('admin.category.editCategory', $cat->id)}}" class="btn btn-primary"><box-icon name='edit' type='solid' ></box-icon></a>
                        <button onclick="return confirm('Bạn có chắc muốn xóa')" type="submit" class="btn btn-danger"><box-icon name='trash' type='solid' ></box-icon></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {{$category->links()}}
      </div>

@endsection