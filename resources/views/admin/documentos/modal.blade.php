
<div class="modal" id="modal-{{$doc->id}}-{{ $idR }}-{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="{{route('eliminar.documento',$doc->id) }}" role="form" enctype="multipart/form-data" >
        {{ csrf_field() }}
     
        <input type="hidden" value="{{ $doc->id }}" id="id" name="id"/>
        <input type="hidden" value="{{ $idR }}" id="idR" name="idR"/>
        <input type="hidden" value="{{ $id }}" id="idP" name="idP"/>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Documento</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Desea eliminar el registro?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
              </div>
            </div>
          </div>
    </form>
 