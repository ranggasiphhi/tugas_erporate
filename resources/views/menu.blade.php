@extends('layouts.kafeapp')
@section('content')
<div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
    @endif
    <a class="btn btn-primary" href="menu/create" role="button">Tambah</a>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Menu</th>
        <th>Harga</th>
        <th>Status</th>
        <th colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      
      @for($i = 0;$i < $menus->count(); $i++)
      <tr>
        <td>{{$i+1}}</td>
        <td>{{$menus[$i]->name}}</td>
        <td>{{$menus[$i]->price}}</td>
        <td>
        @if($menus[$i]->status == 0)
        <span class="badge badge-danger">Tidak aktif</span>
        @else
        <span class="badge badge-primary">Aktif</span>
        @endif
        </td>
        <td><a href="{{action('MenuController@edit', $menus[$i]->id)}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('MenuController@destroy', $menus[$i]->id)}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endfor
    </tbody>
  </table>
  </div>
@endsection
