@extends('layouts.admin')
@section('main')
        <div class="layout-page">
          <div class="container">
     <form action="{{route('admin.category.index')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
         @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="status" id="" value="0" checked>Ẩn
          </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="status" id="" value="1" checked>Hiển thị
          </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   </div>

@endsection