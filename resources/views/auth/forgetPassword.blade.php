 
  <!doctype html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Required meta tags -->
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
  
      
      <!--favicon-->
      <link rel="icon" href="{{  asset('assets/images/favicon-32x32.fw.png')}}" type="image/png" />
      <!--plugins-->
      @yield("style")
  
       
      <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
  
      <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet">
      <!-- loader-->
      
      <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
      <script src="{{ asset('assets/js/pace.min.js') }}"></script>
  
      <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet">
      <!-- Bootstrap CSS -->
      <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
  
      <!-- Theme Style CSS -->
      <link href="{{ asset('assets/css/dark-theme.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/semi-dark.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/header-colors.css') }}" rel="stylesheet">
      <title>Factoring Abogados</title>
  </head>
  
  <body>
     
      <!--wrapper-->
      
      <div class="wrapper">
         <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Reset Password') }}</div>
  
                  <div class="card-body">
                    <form action="{{ route('forget.password.post') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Send Password Reset Link
                            </button>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
   
      </div>
      <!--end wrapper-->
      
      <!-- Bootstrap JS -->
  
      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
      <!--plugins-->
      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  
       
      <!--app JS-->
      <script src="{{ asset('assets/js/app.js') }}" defer></script>
       
          
  
      @yield("script")
      @include("layouts.theme-control")
  </body>
  
  </html>
  