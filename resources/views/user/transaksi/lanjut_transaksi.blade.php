<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Home Pembeli</title>

    <!-- google font -->
    <link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700')}}" rel="stylesheet">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap')}}" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('user/assets/css/all.min.css')}}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('user/assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('user/assets/css/owl.carousel.css')}}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('user/assets/css/magnific-popup.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('user/assets/css/animate.css')}}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{asset('user/assets/css/meanmenu.min.css')}}">
    <!-- main style -->
    <link rel="stylesheet" href="{{asset('user/assets/css/main.css')}}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{asset('user/assets/css/responsive.css')}}">

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-6LBEP-uy0zTyNi4b"></script>

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="{{url('/home/user')}}">
                                <img src="{{asset('user/assets/img/logo2.png')}}" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="{{ Request::is('home/user') ? 'current-list-item ' : ''}}">
                                    <a href="{{url('/home/user')}}">Home</a></li>
                                <li class="{{ Request::is('home/user/about') ? 'current-list-item ' : ''}}"><a
                                        href="{{url('/home/user/about')}}">About</a></li>
                                <li class="{{ Request::is('home/user/product/*') ? 'current-list-item ' : ''}}"><a
                                        href="{{route('user.getAllBuku')}}">Produk Lainya</a></li>
                                <li
                                    class="{{ Request::is('home/user/keranjang', 'home/user/keranjang/*') ? 'current-list-item ' : ''}}">
                                    <a href="{{route('user.keranjangUser')}}">Keranjang Anda</a></li>
                                <li><a href="shop.html">Histori Belanja</a></li>
                                <li>
                                    <div class="header-icons">
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="hero-area hero-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-2 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">ECO<b>BOOK</b></p>
                            <h1>Selamat Datang <b>{{Auth::user()->first_name}}</b></h1>
                            <div class="hero-btns">
                                <a href="{{route('logout-user')}}" class="bordered-btn">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero area -->

    <!-- features list section -->
    <div class="list-section pt-80 pb-80">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>Harga Terjangkau</h3>
                            <p>Buku - Buku Yang Dijual Pasti Tidak Akan Membuat Kecewa</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>Aman dan Terpercaya</h3>
                            <p>Semua Seller Sudah Di Pastikan Keamananya</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>24 Jam</h3>
                            <p>Website Selalu Aktif 24 Jam</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end search area -->

    <!-- hero area -->
    <form action="{{route('user.transaksiUserProsesLanjut.store')}}" id="submit_form" method="POST">
        @csrf
        <input type="hidden" name="json_response" id="json_callback">
        <input type="hidden" name="id_transaksi" value="{{request()->get('id_transaksi')}}">
        <input type="hidden" name="level" value="2">
        <input type="hidden" name="penjual_id" value="{{request()->get('penjual_id')}}">
        <input type="hidden" name="nama_buku_keranjang" value="{{request()->get('nama_buku_keranjang')}}">
        <input type="hidden" name="quantity_keranjang" value="{{request()->get('quantity_keranjang')}}">
        <input type="hidden" name="price_keranjang" value="{{request()->get('price_keranjang')}}">
        <input type="hidden" name="first_name_keranjang" value="{{request()->get('first_name_keranjang')}}">
        <input type="hidden" name="last_name_keranjang" value="{{request()->get('last_name_keranjang')}}">
        <input type="hidden" name="email_keranjang" value="{{request()->get('email_keranjang')}}">
    </form>
    <div class="full-height-section error-section">
        <div class="full-height-tablecell">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="error-text">
                            <i class="far fa-sad-cry"></i>
                            <h1>LANGKAH TERAKHIR</h1>
                            <p>Silahkan Pilih Metode Pembayaran Anda</p>
                            <button id="pay-button" class="boxed-btn">Bayar Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights
                        Reserved.<br>
                        Distributed By - <a href="https://themewagon.com/">Themewagon</a>
                    </p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{$snap_token}}', {
                onSuccess: function (result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                    send_response_to_form(result);
                },
                onPending: function (result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                    send_response_to_form(result);
                },
                onError: function (result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                    send_response_to_form(result);
                },
                onClose: function () {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });

    </script>

    <!-- jquery -->
    <script src="{{asset('user/assets/js/jquery-1.11.3.min.js')}}"></script>
    <script>
        function send_response_to_form(result) {
            document.getElementById('json_callback').value = JSON.stringify(result);
            // alert(document.getElementById('json_callback').value)
            $('#submit_form').submit();
        }

    </script>
    <!-- bootstrap -->
    <script src="{{asset('user/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- count down -->
    <script src="{{asset('user/assets/js/jquery.countdown.js')}}"></script>
    <!-- isotope -->
    <script src="{{asset('user/assets/js/jquery.isotope-3.0.6.min.js')}}"></script>
    <!-- waypoints -->
    <script src="{{asset('user/assets/js/waypoints.js')}}"></script>
    <!-- owl carousel -->
    <script src="{{asset('user/assets/js/owl.carousel.min.js')}}"></script>
    <!-- magnific popup -->
    <script src="{{asset('user/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- mean menu -->
    <script src="{{asset('user/assets/js/jquery.meanmenu.min.js')}}"></script>
    <!-- sticker js -->
    <script src="{{asset('user/assets/js/sticker.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('user/assets/js/main.js')}}"></script>

</body>

</html>
