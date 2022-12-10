<!doctype html>
<html lang="en">
  <head>
  	<title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../admin/css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(../admin/img/bg.jpg);">
	<section class="ftco-section">
		<div class="container">

			<div class="row justify-content-center">
                
				<div class="col-md-6 text-center mb-5">
                    @if (session()->has('gagalLogin'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('gagalLogin') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Sukses</strong> {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
					<h2 class="heading-section">Login Admin</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
                        <form method="POST" action="{{route('admin.loginAdmin')}}">
                            @csrf
		      		<div class="form-group">
		      			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email"
                          value="{{ old('email') }}" required autocomplete="email" autofocus>
                          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
		      		</div>
	            <div class="form-group">
                    <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"
                            required autocomplete="current-password">
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password mr-3">
                            @error('password')
                                    <div class="invalid-feedback " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                            @enderror 
                        </span>	              
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
									  <span class="checkmark"></span>
									</label>
								</div>
	            </div>
	          </form>
		      </div>

				</div>


			</div>

		</div>
	</section>

	<script src="../admin/js/jquery.min.js"></script>
  <script src="../admin/js/popper.js"></script>
  <script src="../admin/js/bootstrap.min.js"></script>
  <script src="../admin/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

	</body>
</html>

