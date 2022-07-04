<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--favicon-->
		<link rel="icon" href="assets/images/favicon-32x32.fw.png" type="image/png" />
		<!-- loader-->
		<link href="assets/css/pace.min.css" rel="stylesheet" />
		<script src="assets/js/pace.min.js"></script>
		<!-- Bootstrap CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
		<link href="assets/css/app.css" rel="stylesheet">
		<link href="assets/css/icons.css" rel="stylesheet">
		<title>Dashtreme - Multipurpose Bootstrap5 Admin Template</title>
	</head>

<body class="bg-login">
	<!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="assets/images/login-images/logo.jpg" width="180" alt="" />
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <img src="{{ asset('assets/images/login-images/logo.jpeg') }}" width="180" alt="" />
                                        <h3 class="">App. Factoring</h3>
                                        <p>No tienes una cuenta?  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrarse</a>
                                        </p>
                                    </div>
                                   
                                    <div class="form-body">
                                      
                                            <form method="post" action="{{ route('ingresar') }}" class="row g-3">
                                                @method('post')
                                                @csrf
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div-->
                                            <div class="col-md-12 text-end">	 <a class="btn btn-link" href="{{ route('forget.password.get') }}">
                                                <!--div class="col-md-6 text-end">	 <a class="btn btn-link" href="{{ route('password.request') }}"-->
                                                Olvido su password?
                                            </a>
                                            </div>
                                            <!--div class="checkbox">
                                                <label>
                                                    <a href="{{ route('forget.password.get') }}">Reset Password</a>
                                                </label>
                                            </div-->
                                          
                                            <div class="col-12">
                                               
                                              
                                                   </i><a href="{{ route('register') }}" class="btn btn-success">Registrar</a>
                                                    <button type="submit" class="btn btn-success float-center"><i class="bx bxs-lock-open"></i>Ingresar</button>
                                               
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
	<!--end wrapper-->

	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
</body>

</html>
