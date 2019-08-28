@extends('layouts.kafeapp')
@section('content')

<div class="container">
      <h2>Edit A Form</h2><br/>
      <div class="container">
    </div>
      <form method="post" action="{{action('MenuController@update', $id)}}">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="menu">Menu</label>
            <input type="text" class="form-control" name="name" value="{{$menu->name}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Harga</label>
            <input type="text" class="form-control" name="price" value="{{$menu->price}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="status">Status</label>
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="status">
              <label class="custom-control-label" for="status">Aktif</label>
            </div>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </form>
   </div>
@endsection