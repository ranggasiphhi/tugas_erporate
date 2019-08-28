@extends('layouts.kafeapp')
@section('content')
<div class="container">
    <div class="alert alert-success" style="display:none"></div>
    
    <form method="post" action="{{url('menu/store')}}">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="number">No Pesanan</label>
            <input class="form-control" id="number" value="ERP{{date('Ymd')}}-{{$orders->where('pid',Auth::user()->id)->count()}}" disabled>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="order"  id="order">Pesanan</label>
            <button type="button" class="btn btn-success" id="add">Tambah</button>
        </div>
        @if(Auth::user()->type == "Cashier")
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="status">Status</label>
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="status" checked>
              <label class="custom-control-label" for="status">Aktif</label>
            </div>
          </div>
          </div>
        </div>
        @endif
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" id="submit">Submit</button>
          </div>
        </div>
      </form>
   </div>

   <script type="text/javascript">
         jQuery(document).ready(function(){
           var i=0;
           $("#add").click(function(){
            $("#order").append('<select class="form-group col-md-4" name="order'+(i)+'"> \
            <option value="">Pilih...</option> \
            @foreach($menus as $menu) \
            <option value="{{$menu->id}}">{{$menu->name}}</option> \
            @endforeach \
            </select>');
            i = i + 1;
           });
            jQuery('#submit').click(function(e){
              var value;
              if ($('#status').is(":checked")){
                value=1;
              }else{
                value=0;
              }
              var orders = [];
              var price = 0;
              var i = 0;
              while($("option:selected").val() != null){
                orders.push($("option:selected").val());
                $("select[name=order"+i+"]").remove();
                i = i+1;
              }
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/order/store') }}",
                  method: 'post',
                  data: {
                     number: jQuery('#number').val(),
                     order: orders,
                     status: value,
                     pid : "{{Auth::user()->id}}"
                  },
                  success: function(result){
                     jQuery('.alert').show();
                     jQuery('.alert').html(result.success);
                  }});
               });               
            });
</script>
@endsection
