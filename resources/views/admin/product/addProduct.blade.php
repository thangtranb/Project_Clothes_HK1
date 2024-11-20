@extends('layouts.admin')
@section('main')
        <div class="layout-page">
          <div class="container">
        <form action="{{route('admin.product.index')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
              @error('name')<div class="text-danger">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
              <label for="">Price</label>
              <input type="text" name="price" id="" class="form-control" placeholder="" aria-describedby="helpId">
              @error('price')
        <div class="text-danger">{{$message}}</div>
        @enderror
            </div>
            <div class="form-group">
              <label for="">Sale_price</label>
              <input type="text" name="sale_price" id="" class="form-control" placeholder="" aria-describedby="helpId">
              @error('sale_price')
        <div class="text-danger">{{$message}}</div>
        @enderror
      </div>
            <div class="form-group">
              <label>Gender:</label><br>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                  <label class="form-check-label" for="male">Nam</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                  <label class="form-check-label" for="female">Nữ</label>
              </div>
              @error('gender')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
            <div class="form-group">
              <label for="">Image</label>
              <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
              @error('image')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">More Images</label>
              <input type="file" name="images[]" class="form-control" multiple aria-describedby="helpId">
              @error('image')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Category_id</label>
              <select class="form-control" name="category_id" id="">
                 <option value="">-- Chọn --</option>
                @foreach($category as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
              </select>
              @error('category_id')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea class="form-control" name="description" id="" rows="3"></textarea>
            </div>
            <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="status" id="" value="0" checked>Còn Hàng
          </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="status" id="" value="1" checked>Hết Hàng
          </label>
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
@endsection