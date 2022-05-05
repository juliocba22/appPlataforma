@extends("layouts.app")
		
		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Reportes de Procesos Activos</div>
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
								<div class="dropdown">
									<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
										<i class="material-icons">Exportar</i> 
									</button>
									<ul id="lista" class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
									<li><a class="dropdown-item active" href="#">CSV</a></li>
									<li><a class="dropdown-item" href="#">EXCEL</a></li>
									<li><a class="dropdown-item" href="#">PDF</a></li>
								   </li>
									</ul>
								</div>
																	
								 
							</div>
						</div>
						<div class="table-responsive">
							<table id="quiztable" class="table mb-0">
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
			/*$('#lista > li').on('click','a',function(e){
				if(e.keyCode==13){
					console.log($(this).val());
					
                    if(!$(this).val() && !$('#fecini').val()){
                        console.log("PASO3");
                        window.location.href="{{ route('detalle.procesos') }}" ;
                    }else{
                        console.log("PASO4");
                        window.location.href="{{ route('detalle.procesos') }}?fecini=" +$('#fecini').val()+"&fecfin="+$(this).val();
                    }    
                
                }
			});*/

            $("#lista > li").click(function() {
             
                var i = $(this).index() + 1
                //alert(i);
                var table = $('#quiztable').DataTable();
                if (i == 1) {
                    table.button('.buttons-csv').trigger();
                } else if (i == 2) {
                    table.button('.buttons-excel').trigger();
                } else if (i == 3) {
                    table.button('.buttons-pdf').trigger();
                } else if (i == 5) {
                    table.button('.buttons-print').trigger();
                } 
            });


			$(document).ready(function() {
                $('#quiztable').DataTable({
                    dom: "Blfrtip",
					"language": {
						"url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
					},
                    searching: false,
                    lengthChange: false,
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
                        orderable: false,
                        targets: 1
                    }] 
                });
            });
		
/*$(document).ready(function() {
	var table = $('#quiztable1').DataTable({
		"dom": 'B<"float-left"i><"float-left"f>t<"float-right"l><"float-left"p><"clearfix">',
		"responsive": true,
		"language": {
			"url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
		},
		"order": [
			[0, "desc"]
		],
		buttons: [
			'copy', 'excel', 'pdf'
		],
		"initComplete": function () {
			this.api().columns().every(function () {
				var that = this;

				$('input', this.footer()).on('keyup change', function () {
					if (that.search() !== this.value) {
						that
							.search(this.value)
							.draw();
					}
				});
			})
		}
	});
});*/
		
		</script>
		<!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
    <script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>

    <!-- Buttons -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	@endsection