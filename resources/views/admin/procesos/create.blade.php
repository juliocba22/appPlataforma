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
                    <hr/>
                    <form method="POST" action="{{ route('store.proceso') }}" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="row mb-3">
                            <div class="alert alert-info border-0 bg-info alert-dismissible fade show py-2">
                                <div class="d-flex align-items-center">
                                    <div class="font-35 text-dark"><i class="bx bx-info-square"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0 text-dark">Información Importante</h6>
                                        <div class="text-dark">El proceso a registrar debe estar en rama judicial, sino esta en rama, no se podra dar de alta</div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Ingrese Nro. Radicación</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control {{ $errors->has('inputNumero') ? ' is-invalid' : '' }}"   name="inputNumero" placeholder="Numero de radicación">
                                @if ($errors->has('inputNumero'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('inputNumero') }}</strong>
                            </span>
                        @endif
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