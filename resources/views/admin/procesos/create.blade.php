@extends("layouts.app")
		
		@section("wrapper")
<div class="row">
    <div class="col-xl-5 mx-auto">
     
        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info">Registrar Proceso</h5>
                    </div>
                    <hr/>
                    <form method="POST" action="{{ route('store.proceso') }}" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Ingrese Nro. Radicación</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control"   name="inputNumero" placeholder="Numero de radicacon">
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