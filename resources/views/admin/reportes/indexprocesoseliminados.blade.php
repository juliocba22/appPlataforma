@extends("layouts.app")
		
		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Reportes de Procesos Eliminados</div>
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
						<div class="float-right">
							<div class="d-lg-flex align-items-left mb-4 gap-3">
								
																	
								 
							</div>
						</div>
						<div class="table-responsive">
							<table id="example" class="table mb-0">
								<thead class="table-light">
									<tr>
                                        <th>Juzgado</th>
										<th>Nro. Radicacion</th>
										<th>Fecha de Radicación</th>
										<th>Departamento</th>
									    <th>Demandante | Demandado</th>
										
									</tr>
								</thead>
								
									
							
								<tbody>
									@foreach ($procesos as $proceso )
									<tr>
										<td>
											<div class="d-flex align-items-center">
												
												<div class="ms-2">
													<h6 class="mb-0 font-14">{{  $proceso->despacho}}</h6>
												</div>
											</div>
										</td>
										<td>{{ $proceso->llaveProceso }}</td>
										<td>{{ $proceso->fechaUltimaActuacion }}</td>
									 
                                        <td>{{ $proceso->depaprtamento }}</td>
										<td>{{ $proceso->sujetosProcesales }}</td>
									</tr>
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
			

			$(document).ready(function() {
				var table = $('#example').DataTable( {
					lengthChange: false,
					buttons: [ 'copy', 'excel', 'pdf', 'print']
				} );
			 
				table.buttons().container()
					.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
			} );

		</script>
		
	@endsection