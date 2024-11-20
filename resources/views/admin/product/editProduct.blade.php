@extends('layouts.admin')
@section('main')
        <div class="layout-page">
           <div class="container">
        <form action="{{route('admin.product.update', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="" aria-describedby="helpId">
              @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror
            </div>
            <div class="form-group">
              <label for="">Price</label>
              <input type="text" name="price" value="{{$product->price}}" class="form-control" placeholder="" aria-describedby="helpId">
              @error('price')
        <div class="text-danger">{{$message}}</div>
        @enderror
            </div>
            <div class="form-group">
              <label for="">Sale_price</label>
              <input type="text" name="sale_price" value="{{$product->sale_price}}" class="form-control" placeholder="" aria-describedby="helpId">
              @error('sale_price')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Gender:</label><br>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{$product->gender == 'male' ? "checked" : ""}}>
                  <label class="form-check-label" for="male">Nam</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{$product->status == 'female' ? "checked" : ""}}>
                  <label class="form-check-label" for="female">Nữ</label>
              </div>
              @error('gender')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
            <div class="form-group">
              <label for="">Image</label>
              <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <img src="{{url('')}}/uploads/{{$product->image}}" width="100px" alt="">
              @error('image')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">More Images</label>
              <input type="file" name="images[]" class="form-control" multiple aria-describedby="helpId">
              @if ($product->images)
              @foreach ($product->images as $img)
            <div class = "col-md-2">
                <img src = "uploads/{{ $img->name }}" alt = "{{ $img->name }}" width="100px">
            </div>
            @endforeach
            @endif
            </div>
            <div class="form-group">
              <label for="">Category_id</label>
              <select class="form-control" name="category_id" id="">
                @foreach($category as $cat)
                <option value="{{$cat->id}}" {{$cat->id == $product->category_id ? "selected" : ""}}>{{$cat->name}}</option>
                @endforeach
                @error('category_id')
        <div class="text-danger">{{$message}}</div>
        @enderror
              </select>
            </div>
            <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="status" id="" value="0"{{$product->status == 0 ? "checked" : ""}}>Còn Hàng
          </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="status" id="" value="1"{{$product->status == 1 ? "checked" : ""}}>Hết Hàng
          </label>
        </div>
        <div class="form-group">
              <label for="">Description</label>
              <textarea class="form-control" name="description" id="" rows="3">{{$product->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>

@endsection