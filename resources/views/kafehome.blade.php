<!-- kafehome.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Selamat Datang!</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      @if(App\User::all()->type == 'Cashier')
      <li class="nav-item active">
        <a class="nav-link" href="#">Menu<span class="sr-only">(current)</span></a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="#">Pesanan Aktif</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pesanan Tidak Aktif</a>
      </li>
    </ul>
  </div>
</nav>
  </body>
</html>