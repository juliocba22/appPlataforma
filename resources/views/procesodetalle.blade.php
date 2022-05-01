@extends("layouts.app")
		
		@section("wrapper")
        
        <input class="form-control me-2" id="id" name="id" type="hidden" placeholder="Id" aria-label="Search"
        class="float-right" value="{{ $id }}">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Proceso Detalle</div>
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
							<ul class="ul-dropdown">
                                <li class="firstli" >
                                   <i
                                      class="material-icons">settings</i><a href="#">ACTION</a>
                                   <ul id="ActDetalle" >
                                      <li><a href="#">Export CSV</a></li>
                                      <li><a href="#">Export Excel</a></li>
                                      <li><a href="#">Export PDF</a></li>
                                      <li><a href="#">Print</a></li>
                                   </ul>
                                </li>
                             </ul>
						</div>
					</div-->
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
                        <div class="row">
                            <div class="col clearfix">
                                
                            </div>
                            <div class="float-right">
                                <div class="d-lg-flex align-items-left mb-4 gap-3">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="material-icons">Acciones</i> 
                                        </button>
                                        <ul id="lista" class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                        <li><a class="dropdown-item active" href="#">CSV</a></li>
                                        <li><a class="dropdown-item" href="#">EXCEL</a></li>
                                        <li><a class="dropdown-item" href="#">PDF</a></li>
                                       </li>
                                        </ul>
                                    </div>
                                            <input class="form-control me-2" id="fecini" name="fecini" type="search" placeholder="Ingrese Fecha Desde" aria-label="Search"
                                            value="{{ (isset($_GET['search'])) ? $_GET['search']: ''}}" class="float-left">
                                            <input class="form-control me-2" id="fecfin" name="fecfin" type="search" placeholder="Ingrese Fecha Hasta" aria-label="Search"
                                            value="{{ (isset($_GET['search'])) ? $_GET['search']: ''}}" class="float-right">

                                            
                                     
                                </div>
                            </div>
                         </div>
						<div class="table-responsive">
							<table id="quiztable" class="table mb-0">
								<thead class="table-light">
									<tr>
									   
										<th>Fecha de Actuacion</th>
										<th>Actuación</th>
                                        <th>Anotacion</th>
                                        <th>Fecha Inicial</th>
                                        <th>Fecha Finaliza</th>
                                        <th>Fecha Registro</th>
										
									</tr>
								</thead>
								
									
							
								<tbody>
									@foreach ($data as $actuaciones )
                                       <tr>
                                            <td> {{ substr($actuaciones->fechaActuacion, 0 , 10); }}</td>
                                            <td> {{ $actuaciones->actuacion}}</td>
                                            <td> {{ $actuaciones->anotacion}}</td>
                                            <td> {{ substr($actuaciones->fechaInicial, 0 , 10); }}</td>
                                            <td> {{ substr($actuaciones->fechaFinal, 0 , 10); }}</td>
                                            <td> {{substr($actuaciones->fechaRegistro, 0 , 10);}}</td>
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
			$('#fecini').on('keyup',function(e){
				if(e.keyCode==13){
                    console.log('INICIO');
                    let fiisValidDate = Date.parse($(this).val());
                    let fiisValidDate1 = Date.parse($('#fecfin').val());

                    if (isNaN(fiisValidDate) || isNaN(fiisValidDate1)) {
                        console.log("FAKSE");
                    }else{
                    id = $('#id').val();
                        if(!($(this).val()) && !$('#fecfin').val()){
                            console.log("PASO1");
                            window.location.href="{{ route('detalle.procesos') }}" ;
                        }else{
                            console.log("PASO2");
                            window.location.href="{{ route('detalle.procesos') }}/"+ $('#id').val() +"?fecini=" +$(this).val()+"$fecfin="+$('#fecfin').val();
                            
                        }
                    }
				}
			})

			$('#fecfin').on('keyup',function(e){
				if(e.keyCode==13){
                    console.log('FIN');
				//	console.log(typeof (this));
                  //  var date_regex = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
                  let isValidDate = Date.parse($(this).val());
                  let isValidDate1 = Date.parse($('#fecini').val());
 
                    if (isNaN(isValidDate) || isNaN(isValidDate1)) {
                        console.log("FAKSE");
                    }else{
                        if(!$(this).val() && !$('#fecini').val() ){

                            
                            console.log("PASO3");
                         window.location.href="{{ route('detalle.procesos') }}" ;
                        }else{
                            console.log("PASO4");
                            id = $('#id').val();
                          window.location.href="{{ route('detalle.procesos') }}/"+ $('#id').val() +"?fecini=" +$('#fecini').val()+"&fecfin="+$(this).val();
                          
                        }    
                    }
                }
			});

            
            $('#lista > li').on('click','a',function(e){
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
			});

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