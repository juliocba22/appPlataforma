@extends("layouts.app")
		
		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Procesos Activos</div>
					<!--div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Orders</li>
							</ol>
						</nav>
					</div>
					
					<div class="ms-auto">
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
				 
					@if(Session::has('succes'))
						<div class="col-lg-8">
							<div class="alert alert-succes alert-dismissible fade show mb-4 mc-4" role="alert">
								{{ Session::get ('succes') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</div>
        			@endif
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<!--input type="text" class="form-control ps-5 radius-30" placeholder="Buscar Proceso"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span-->
								<input class="form-control me-2" id="limit" name="limit" type="search" placeholder="Search" aria-label="Search"
								value="{{ (isset($_GET['search'])) ? $_GET['search']: ''}}">
							</div>
						  <div class="ms-auto"><a href="{{ route('create.proceso') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Nuevo Proceso</a></div>
						</div>
						<div class="table-responsive">
							<table id="quiztable1" class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>Nro. Radicacion</th>
										<th>Fecha de Radicación</th>
										<th>Ultima Actualizacion</th>
									 
                                        <th>Detalle</th>
										<th>Actions</th>
									</tr>
								</thead>
								
									
							
								<tbody>
									@foreach ($procesos as $proceso )
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div>
													<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
												</div>
												<div class="ms-2">
													<h6 class="mb-0 font-14">{{  $proceso->llaveProceso}}</h6>
												</div>
											</div>
										</td>
										<td>{{ $proceso->fechaProceso }}</td>
										<td>{{ $proceso->fechaUltimaActuacion }}</td>
									 
                                       
										<td>
											<button id="verDetalle" type="button" class="btn btn-primary btn-sm radius-30 px-4" onclick="openDetalle({{ $proceso->idProceso }});" >
												Ver Detalle</button>
										</td>
	
										<td>
											<div class="d-flex order-actions">
											
												<!--a href="" onclick="archivar({{ $proceso->idProceso }});" type="submit" class="" ><i class='bx bxs-archive' data-bs-toggle="tooltip" data-bs-placement="top" title="Archivar"></i></a-->

												<button id="archivar" type="button" class="" onclick="archivar({{ $proceso->id }});" >
													<i class='bx bxs-archive' data-bs-toggle="tooltip" data-bs-placement="top" title="Archivar"></i></button>
												<a class="" href=""  data-bs-toggle="modal" data-bs-target="#modal-{{$proceso->id}}" ><i class='bx bxs-trash' data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar"></i></a>
											</div>
										</td>
									</tr>
									@include('admin.procesos.modal') 
									 
								
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
		<script type="text/javascript">
			$('#limit').on('keyup',function(e){
				if(e.keyCode==13){
					console.log($(this).val());
					window.location.href="{{ route('index.procesos') }}?limit=" +$(this).val();
				}
			})

			function openDetalle( id){
				console.log( id.toString() + ' -- ' + id);
				 
				 	window.location.href="{{ route('detalle.procesos') }}?id=" +id;
			 
			}

			function archivar( id){
				//console.log( id.toString() + ' -- ' + id);
				 
				 	window.location.href="{{ route('archivar.proceso') }}?id=" +id;
			 
			}

			$(document).ready(function() {
                $('#quiztable1').DataTable({
                    dom: "Blfrtip",
                    searching: true,
                    lengthChange: true,
                    buttons: [
                        {
                            text: 'csv',
                            extend: 'csvHtml5',
                            
                        },
                        {
                            text: 'excel',
                            extend: 'excelHtml5',
                        },
                        {
                            text: 'pdf',
                            extend: 'pdfHtml5',
                        },
                        {
                            text: 'print',
                            extend: 'print',
                        },  
                    ],
                    columnDefs: [{
                        orderable: true,
                        targets: -1
                    }] 
                });
            });
		
		</script>
		<!-- DataTable -->
		<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" type="text/javascript"></script>
	@endsection