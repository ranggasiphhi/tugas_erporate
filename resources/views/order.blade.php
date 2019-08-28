@extends('layouts.kafeapp')
@section('content')
<div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
    @endif
    <a class="btn btn-primary" href="order/create" role="button">Tambah</a>
    @if(Auth::user()->type == "Cashier")
    <table class="table table-striped">
    <thead>
      <tr>
        <th>No Pesanan</th>
        <th>Status</th>
        <th>Id Pelayan</th>
        <th colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($orders as $order)
      <tr>
        <td>{{$order->order_num}}</td>
        <td>
        @if($order->status == 0)
        <span class="badge badge-danger">Tidak aktif</span>
        @else
        <span class="badge badge-primary">Aktif</span>
        @endif
        <td>{{$order->pid}}</td>
        <td><a href="{{action('OrderController@edit', $order->id)}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('OrderController@destroy', $order->id)}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      </tr>
      @endforeach
    </tbody>

  </table>
  @endif
  @if(Auth::user()->type == "Waiters")
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No Pesanan</th>
        <th>Status</th>
        <th>Id Pelayan</th>
        <th colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($orders->where($orders->pid,Auth::user()->id) as $order)
      <tr>
        <td>{{$order->order_num}}</td>
        <td>
        @if($order->status == 0)
        <span class="badge badge-danger">Tidak aktif</span>
        @else
        <span class="badge badge-primary">Aktif</span>
        @endif
        <td>{{$order->pid}}</td>
        <td><a href="{{action('OrderController@edit', $order->id)}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('OrderController@destroy', $order->id)}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      </tr>
      @endforeach
    </tbody>

  </table>
  </div>
@endsection
