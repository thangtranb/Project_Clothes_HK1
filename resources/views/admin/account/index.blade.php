@extends('layouts.admin')
@section('main')
       <div class="layout-page mt-3">
         <div class="container">
        <a href="{{route('admin.account.addAccount')}}" class="btn btn-primary mb-2">Thêm mới</a>
        <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($account as $ac)
            <tr>
                <td>{{$ac->id}}</td>
                <td>{{$ac->name}}</td>
                <td>{{$ac->email}}</td>
                <td>{{$ac->password}}</td>
                <td>{{$ac->phone}}</td>
                <td>{{$ac->address}}</td>
                <td>
                    <form action="{{route('admin.account.destroy', $ac->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{route('admin.account.editAccount', $ac->id)}}" class="btn btn-primary"><box-icon name='edit' type='solid' ></box-icon></a>
                        <button onclick="return confirm('Bạn có chắc muốn xóa')" type="submit" class="btn btn-danger"><box-icon name='trash' type='solid' ></box-icon></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {{$account->links()}}
      </div>

 @endsection