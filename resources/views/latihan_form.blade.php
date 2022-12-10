<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('latihan/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  </head>
  <body>
    <form action="/latihan/home" method="GET">
      <h1>Data Diri</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="uname"><strong>Nama</strong></label>
        <input type="text" placeholder="Masukan nama" name="uname" required>
        <label for="psw"><strong>Email</strong></label>
        <input type="text" placeholder="Masukan Email" name="email" required>
        <label for="psw"><strong>Nomor</strong></label>
        <input type="text" placeholder="Masukan Nomor" name="number" required>
        <label for="psw"><strong>Price</strong></label>
        <input type="text" placeholder="Masukan Nomor" name="harga_anda" required>
        <label for="psw"><strong>Quantity</strong></label>
        <input type="text" placeholder="Masukan Nomor" name="quantity_anda" required>
        <label for="psw"><strong>Nama Makanan</strong></label>
        <input type="text" placeholder="Masukan Nomor" name="nama_makanan" required>
      </div>
      <button type="submit">Lanjut</button>
    </form>
    @if(session('alert-success'))
    <script>alert("{{session('alert-success')}}")</script>
    @elseif(session('alert-failed'))
    <script>alert("{{session('alert-failed')}}")</script>
    @endif
  </body>
</html>