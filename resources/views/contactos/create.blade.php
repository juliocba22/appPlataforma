@extends("layouts.app")
		
@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
<div class="row">
    <div class="col-xl-9 mx-auto">
        <form method="POST" action="{{ route('store.contacto') }}" role="form" >
            {{ csrf_field() }}  
        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                        </div>
                        <h5 class="mb-0 text-info">Registrar Contacto</h5>
                    </div>
                    <hr/>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Apellido y Nombres</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Ingrese Apellido y Nombres">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Telefono</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Ingrese telefono">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Entidad</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="entity" name="entity" placeholder="Ingrese Entidad">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="inputAddress4" class="col-sm-3 col-form-label">Nota</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="note"  name="note" rows="3" placeholder="Ingrese Nota"></textarea>
                        </div>
                    </div>
                   
                    <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info px-5">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
       
</div>
        </form>
@endsection