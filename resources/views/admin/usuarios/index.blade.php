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
					<div class="breadcrumb-title pe-3">Usuarios</div>
					<!--div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Orders</li>
							</ol>
						</nav>
					</div--r>
					<!--div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div-->
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						  <div class="ms-auto"><a href="{{ route('create.usuario') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Nuevo Usuario</a></div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
									 
										<th>Nombre Completos</th>
										<th>Email</th>
										<th>Register Date</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($usuarios as $usuario )
									<input type="hidden" id="id"
									<tr>
										 
                                        <td>
                                            <div class="d-flex align-items-center">
                                                
                                                <div class="">
													@if ($usuario->imagen)
													<img src="{{ asset('usuarios/'.$usuario->imagen) }}" class="rounded-circle" width="40" height="40" alt="">
													@else
													<img src="{{ asset('usuarios/perfil.png') }}" class="rounded-circle" width="40" height="40" alt="">
													@endif
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-0 font-14">{{  $usuario->name}}</h6>
                                                    
                                                </div>
                                            </div>
                                        </td>
										<td>
											<div class="d-flex align-items-center">
											 
												<div class="ms-2">
													<h6 class="mb-0 font-14">{{  $usuario->email}}</h6>
												</div>
											</div>
										</td>
										<td>June 10, 2020</td>
										 
										<td>
											<div class="d-flex order-actions">
												<a href="{{ URL::action('App\Http\Controllers\UsuariosController@edit',$usuario->id) }}" class=""><i class='bx bxs-edit'></i></a>
												<a class="" href=""  data-bs-toggle="modal" data-bs-target="#modal-{{$usuario->id}}" ><i class='bx bxs-trash'></i></a>
												
											</div>
										</td>
										
									</tr>
									@include('admin.usuarios.modal')
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
	