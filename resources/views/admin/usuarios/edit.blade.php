@extends("layouts.app")
		
@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
<div class="row">
    <div class="col-xl-9 mx-auto">
    
        <form method="POST" action="{{ route('update.usuario',$usuario->id) }}" role="form" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH" >
            {{ csrf_field() }}  
          
        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info">Actualizar Usuario</h5>
                    </div>
                    <hr/>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nombres y Apellidos</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ $usuario->name }}"  placeholder="Ingrese Apellido y Nombres">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email </label>
                        <div class="col-sm-9">
                            <input type="email" id="email" disabled="true" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $usuario->email }}"   placeholder="Ingrese Email">
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password"  disabled="true" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password"  value="{{ $usuario->password }}" placeholder="Ingrese password">
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <label for="rol" class="col-sm-3 col-form-label">Roles</label>
                        <div class="col-sm-9">
                        <select name="role_id" class="form-select mb-3" >
                            @php
                            $test = $usuario->role_id;
                            @endphp
                            @foreach ($roles as $item )
                            {{ $test }}
                            @if ($item->id===$test)
                                <option selected value="{{ $item->id }}"  >
                                    {{ $item->name }} 
                                </option>
                            @else
                                <option value="{{ $item->id }}" >
                                    {{ $item->name }}
                                </option>
                            @endif    
                           
                            @endforeach
                        </select>
                    </div>
                  
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Telefono</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $usuario->telefono }}" placeholder="Ingrese Telefono">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $usuario->mobile }}" placeholder="Ingrese Mobile">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Direccion</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $usuario->direccion }}" placeholder="Ingrese Direccion">
                        </div>
                    </div>
                 
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
                    <div class="col-lg-12 form-group">
                        <hr> 
                            <center><img src="{{ asset('usuarios/'.$usuario->imagen) }}" style="width:30%"></center>
                    </div>
                   
                   
                    <div class="col-lg-12 form-group">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info px-5">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form> 
</div>
@endsection