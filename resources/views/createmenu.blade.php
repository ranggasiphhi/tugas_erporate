@extends('layouts.kafeapp')
@section('content')
<div class="container">
    <div class="alert alert-success" style="display:none"></div>
    
    <form method="post" action="{{url('menu/store')}}">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="menu">Menu</label>
            <input type="text" class="form-control" id="name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="price">Harga</label>
            <input type="text" class="form-control" id="price">
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
            <button type="submit" class="btn btn-success" id="submit">Submit</button>
          </div>
        </div>
      </form>
   </div>

   <script type="text/javascript">
         jQuery(document).ready(function(){

            jQuery('#submit').click(function(e){
              var value;
              if ($('#status').is(":checked")){
                value=1;
              }else{
                value=0;
              }
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/menu/store') }}",
                  method: 'post',
                  data: {
                     name: jQuery('#name').val(),
                     price: jQuery('#price').val(),
                     status: value
                  },
                  success: function(result){
                     jQuery('.alert').show();
                     jQuery('.alert').html(result.success);
                  }});
               });
            });
</script>
@endsection
