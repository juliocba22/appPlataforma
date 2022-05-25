@extends("layouts.app")
		
		@section("wrapper")
<div class="row">
    <div class="col-xl-5 mx-auto">
     
        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-file me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info">Registrar Proceso</h5>
                        
                    </div>
                    @if(Session::has('error'))
					<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-white">Proceso</h6>
                                <div class="text-white">  {{ Session::get ('error') }}!</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
        			@endif
                    <hr/>
                    <form method="POST" action="{{ route('store.proceso') }}" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="row mb-12">
                          
                            <label for="inputEnterYourName" class="col-sm-12 col-form-label">Ingrese Nro. Radicación</label>
                            <div class="input-group">
                                <input type="text" class="form-control {{ $errors->has('inputNumero') ? ' is-invalid' : '' }}"   name="inputNumero" placeholder="Numero de radicación">
                               
                                @if ($errors->has('inputNumero'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('inputNumero') }}</strong>
                                    </span>
                                @endif
                                <div class="col-sm-2 font-22 text-primary">	<i class="fadeIn animated bx bx-comment-error" data-toggle="tooltip" title="Ingrese el número de 23 dígitos de identificación del proceso!"></i>
                                </div>
                            </div>
                          
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-info px-5">Registrar</button>
                                <a type="button" href="{{ route('index.procesos') }}" class="btn btn-info px-5">Volver</a>
                            </div>
                        
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection