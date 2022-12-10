<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Pembeli</title>
    <!-- Font Awesome -->
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css')}}"
        rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="{{asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap')}}"
        rel="stylesheet" />
    <!-- MDB -->
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css')}}" rel="stylesheet" />
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login Pembeli</p>

                                    <form class="mx-1 mx-md-4" action="{{route('user.loginUser')}}"
                                        method="POST">
                                        @csrf

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" name="email"
                                                    class="form-control" value="{{old('email')}}" />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" name="password"
                                                    class="form-control" value="{{old('password')}}" />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Login</button>&nbsp;
                                            <a class="btn btn-success btn-lg"
                                                href="{{url('/register-user')}}">Register?</a>&nbsp;
                                                <a class="btn btn-danger btn-lg" href="{{route('user.googleLogin')}}"><i class="fab fa-google"></i> Email</a>
                                            
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-8">
                                            <a class="btn btn-warning btn-lg" href="{{route('penjual.loginPenjual')}}">Penjual</a>
                                        </div>
                                    </form>
                                    @if (session()->has('gagalLogin'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('gagalLogin') }}
                                    </div>
                                    @endif
                                    @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Sukses</strong> {{session('success')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="{{asset('img/loginpembeli.png')}}" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
</body>

</html>
