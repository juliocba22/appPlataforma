@extends("layouts.app")
@section("wrapper")
    <div class="page-wrapper">
        <div class="page-content">
            <form method="POST" action="{{ route('update.perfil',$usuario->id) }}" role="form" enctype="multipart/form-data">
            <div class="container">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        @if(auth()->user()->imagen)
                                        <img src="{{ asset('usuarios/'.auth()->user()->imagen ) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                        @else
                                        <img src="{{ asset('usuarios/') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                        @endif
                                        <div class="mt-3">
                                            <h4>{{ $usuario->name }}</h4>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label"><b>Foto Usuario</b></label>
                                        <div class="col-sm-9">
                                        <input type="file" class="form-control " placeholder="titulo de la plantilla" name="imagen"> 
                                        @if ($errors->has('imagen'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('imagen') }}</strong>
                                        </span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                    
                       
                        <div class="col-lg-8">
						   
                            <div class="card">
                                <div class="card-body">
                                    <input name="_method" type="hidden" value="PATCH" >
                                    {{ csrf_field() }}  
                                    <div class="row mb-3">
                                        
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Apellido y Nombre</h6>
                                        </div>
                                        <div class="col-sm-6 text-secondary">
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $usuario->name }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" id="email" name="email"  value="{{ $usuario->email }}" />
                                        </div>
                                    </div>
                                    <!--div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password"  value="{{ $usuario->password }}" placeholder="Ingrese password">
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Confirmar Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="password_confirmation" name="password_confirmation"  value="" placeholder="Ingrese password">
                                            @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div-->
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Telefono</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $usuario->telefono }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mobile</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $usuario->mobile }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $usuario->direccion }}" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Guardar Cambios" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                      
                   </div>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection



