@extends('layouts.admin')
@section('main')
        <div class="layout-page">
          <div class="container">
        <form action="{{route('admin.category.update', $category->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" value="{{$category->name}}" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
             @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror
            <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="status" id="" value="0"{{$category->status == 0 ? "checked" : ""}}>Ẩn
          </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="status" id="" value="1"{{$category->status == 1 ? "checked" : ""}}>Hiển thị
          </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
@endsection

