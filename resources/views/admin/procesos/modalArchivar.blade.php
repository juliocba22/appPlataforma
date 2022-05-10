
<div class="modal" id="modalArchivar-{{$actuaciones->idRegActuacion}}" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('upload.documento', $actuaciones->idRegActuacion) }}" role="form" enctype="multipart/form-data" >
        {{ csrf_field() }}
       <input type="hidden" value="{{$actuaciones->idRegActuacion}}" name="idReg" id="idReg" />
        
       <input type="hidden" value="{{$id}}" name="id" id="id" />
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subir Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row mb-3">
                  <label for="inputPhoneNo2" class="col-sm-3 col-form-label"><b>Documento</b></label>
                  <div class="col-sm-9">
                  <input type="file" class="form-control " placeholder="titulo de la plantilla" name="imagen" id="imagen"> 
                  @if ($errors->has('imagen'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('imagen') }}</strong>
                  </span>
                  @endif
                  </div>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
              </div>
            </div>
          </div>
    </form>
 