@extends('layouts.admin')
@section('main')
        <div class="layout-page">
           <div class="container">
        <form action="{{route('admin.account.update', $account->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" value="{{$account->name}}" class="form-control" placeholder="" aria-describedby="helpId">
              @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror
            </div>
             <div class="form-group">
          <label for="">Email</label>
          <input type="email" name="email" value="{{$account->email}}" class="form-control" placeholder="" aria-describedby="helpId">
          @error('email')
        <div class="text-danger">{{$message}}</div>
        @enderror
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="text" name="password" value="{{$account->password}}" class="form-control" placeholder="" aria-describedby="helpId">
          @error('password')
        <div class="text-danger">{{$message}}</div>
        @enderror
        </div>
        <div class="form-group">
          <label for="">Phone</label>
          <input type="text" name="phone" value="{{$account->phone}}" class="form-control" placeholder="" aria-describedby="helpId">
          @error('phone')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="">Address</label>
          <input type="text" name="address" value="{{$account->address}}" class="form-control" placeholder="" aria-describedby="helpId">
          @error('address')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
@endsection