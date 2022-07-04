<!-- FormularioEventos -->
			
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   
	<input name="_method" type="hidden" value="DELETE"/>
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Datos del Evento</h5>
			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
            <div class="d-none">ID
		   <input type="text" name="txtID" id="txtID"/><br/>
           </div>
           <div class="form-row">
                <div class="form-group col-md-8">
                    <label>TITULO</label>
                    <input type="text" class="form-control" name="txtTitulo" id="txtTitulo" /> 
                </div>
                <div class="form-group col-md-4">
                    <label>FECHA INICIO</label>
                    <input type="date" class="form-control" name="txtFechaInicio" id="txtFechaInicio" /> 
                </div>
          
            <div class="form-group col-md-4">
                <label>HORA INICIO</label>
                <input type="time" step="300" min="06:00" max="24:00" class="form-control"  name="txtHoraInicio" id="txtHoraInicio" >
            </div>
            <div class="form-group col-md-4">
                <label>FECHA FIN</label>
                <input type="date" class="form-control" name="txtFechaFin" id="txtFechaFin" /> 
            </div>

            <div class="form-group col-md-4">
                <label>HORA FIN</label>
                <input type="time" class="form-control" step="300"  name="txtHoraFin" id="txtHoraFin"> 
            </div>
            <div class="form-group col-md-12">
                <label>DESCRIPCION</label>
                <textarea name="txtDescripcion" id="txtDescripcion" cols="30" class="form-control" row="10"></textarea> 
            </div>
            <div class="form-group col-md-12">
                <label>COLOR</label>
                <input type="color" class="form-control"  name="txtColor" id="txtColor" value="#3788D8" id="ColorFondo" class="form-control" style="height:36px;">
                 
            </div>
                
              
               
            </div>
		  
		   
		   
          
		   
		 
            
		 
		  </div>
		  <div class="modal-footer">
			<button type="button" id="btnAgregar" class="btn btn-success" >Agregar</button>
			<button type="button" id="btnModificar" class="btn btn-warning">Modificar</button>
			<button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
			<button type="button" id="btnCancelar" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
		  </div>
		</div>
	  </div>

