@extends("layouts.app")
		
		@section("wrapper")


		
		<!--start page wrapper -->
		<div class="page-wrapper">


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
			<div class="page-content">

				
	
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Documentos </div>
                    <a  class="btn btn-info px-5" href="{{ url('detalle?id='.$idR )}}" type="button">Volver </a>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						  
						</div>
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
									 
										<th>Nombre Completos</th>
										
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($documentos as $doc )
									<input type="hidden" id="id" />
									<tr>
										<td>
											<div class="d-flex align-items-center">
											 
												<div class="ms-2">
													<a class="mb-0 font-14" href="{{ asset('documentos/'.$doc->imagen) }}">{{ $doc->imagen }} </a>
												</div>
											</div>
										</td>
								 
										 
										<td>
											<div class="d-flex order-actions">
												
												<a class="" href=""  data-bs-toggle="modal" data-bs-target="#modal-{{$doc->id}}-{{$idR}}-{{$id}}" ><i class='bx bxs-trash'></i></a>
												
											</div>
										</td>
										
									</tr>
									@include('admin.documentos.modal')
									@endforeach
								
								</tbody>
							</table>
						</div>
					</div>
				</div>


			</div>

		</div>
		<!--end page wrapper -->

		@endsection
		@section('script')
		<script  type="text/javascript">
			$('#ventana').click(function (event)
			{
				alert("Hola Mundo");
			});

			function preguntar(){
 alert("LLEGO");
				eliminar=confirm("¿Deseas eliminar este registro?");
				if (eliminar)
				//Redireccionamos si das a aceptar
			  
				//  window.location.href="elimina.php?Id="//página web a la que te redirecciona si confirmas la eliminación
			 else
			   //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
				 alert('No se ha podido eliminar el registro...')
			 }
		</script>
		@endsection
	