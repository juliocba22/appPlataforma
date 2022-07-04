
@extends("layouts.app")
@section("style")
<link href="assets/plugins/fullcalendar/css/main.min.css" rel="stylesheet" />
@endsection

		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Applications</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Calendar</li>
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
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id='calendar'></div>
                            </div>
						
                        </div>
                    </div>
				</div>	
			</div>	




			@include('eventos.modal')
		  
		@endsection

@section("script")
<script src="assets/plugins/fullcalendar/js/main.min.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		var calendarEl = document.getElementById('calendar');


		var calendar = new FullCalendar.Calendar(calendarEl, {

			dateClick: function(info) {
			//console.log(info);
			limpiarFormulario()
			 $('#txtFechaInicio').val(info.dateStr);
				//calendar.addEvent({title:"Evento x", date:info.dateStr ,descripcion:'TEST'})

				$("#btnAgregar").prop("disabled",false);
				$("#btnModificar").prop("disabled",true);
				$("#btnEliminar").prop("disabled",true);

				$('#exampleModal').modal('toggle') ;
			  },
			  eventClick:function(info) {

				$("#btnAgregar").prop("disabled",true);
				$("#btnModificar").prop("disabled",false);
				$("#btnEliminar").prop("disabled",false);
				console.log(info.event);
				console.log('-----------------------');
				console.log(info.event.extendedProps);
				console.log('-----------------------');

				mes=(info.event.start.getMonth()+1);
				dia=(info.event.start.getDate());
				anio=(info.event.start.getFullYear());

				mes=(mes<10)?"0"+mes:mes;
				dia=(dia<10)?"0"+dia:dia;

				hora = info.event.start.getHours()  
				minutos =  info.event.start.getMinutes();

				hora = (hora<10)?"0" + hora:hora;
				minutos = (minutos<10)?"0"+minutos:minutos;

				console.log('*************************');
				 console.log(info.event.end);
				//----------------------------------------------
				if(info.event.end){
					mesF=(info.event.end.getMonth()+1);
					diaF=(info.event.end.getDate());
					anioF=(info.event.end.getFullYear());
					horaF = info.event.end.getHours()  
				minutosF =  info.event.end.getMinutes();

				}else{
					mesF=mes;
					diaF=dia;
					anioF=anio;
					horaF=hora;
					minutosF=minutos;
				}
			

				mesF=(mesF<10)?"0"+mesF:mesF;
				diaF=(diaF<10)?"0"+diaF:diaF;

				

				horaF = (horaF<10)?"0" + horaF:horaF;
				minutosF = (minutosF<10)?"0"+minutosF:minutosF;
				

				//--

			 
				$('#txtID').val(info.event.id);
				$('#txtTitulo').val(info.event.title);
				$('#txtFechaInicio').val(anio + '-' + mes + '-' + dia);
				$('#txtHoraInicio').val(hora+":"+minutos);
				$('#txtFechaFin').val(anioF + '-' + mesF + '-' + diaF);
				$('#txtHoraFin').val(horaF+":"+minutosF);
				$('#txtDescripcion').val(info.event.extendedProps.descripcion);

				$('#exampleModal').modal('toggle') ;
			  },
			headerToolbar: {
				//left: 'prev,next today',
				center: 'title'//,
				//right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
			},
		 
			initialView: 'dayGridMonth',
			initialDate: Date.Now,
			navLinks: true, // can click day/week names to navigate views
			selectable: true,
			nowIndicator: true,
			dayMaxEvents: true, // allow "more" link when too many events
			editable: true,
			selectable: true,
			businessHours: true,
			dayMaxEvents: true, // allow "more" link when too many events
			events:"{{ url('/eventos/show') }}"
		});

		calendar.setOption('locale','es');
		calendar.render();

		$('#btnAgregar').click(function(){
			ObjEvento = recolectarDatosGUI("POST");
			 enviarInformacion(' ', ObjEvento);
		});

		$('#btnEliminar').click(function(){
			ObjEvento = recolectarDatosGUI("DELETE");
			 enviarInformacion('/'+$('#txtID').val(), ObjEvento);
		});

		$('#btnModificar').click(function(){
			ObjEvento = recolectarDatosGUI("PUT");
			 enviarInformacion('/'+$('#txtID').val(), ObjEvento);
		});
		function recolectarDatosGUI(method){
			nuevoEvento={
				id:$('#txtID').val() ,
				user_id:'0',
				title: $('#txtTitulo').val() ,
				descripcion:$('#txtDescripcion').val()  ,
				color:$('#txtColor').val()  ,
			 
					start :$('#txtFechaInicio').val() + ' ' + $('#txtHoraInicio').val()   ,
					end:$('#txtFechaFin').val() + ' ' + $('#txtHoraFin').val()   , 
			 
				'_token':$("meta[name='csrf-token']").attr("content"),
				'_method':method
			}
			 return(nuevoEvento);
		}

		function enviarInformacion(accion , objEvento){

			//console.log(objEvento);
			$.ajax({
				type:"POST",
				url:"{{ url('/eventos') }}"+accion,
				data:objEvento,
				success:function(msg)
				{
					console.log(JSON.stringify(msg));
					$('#exampleModal').modal('toggle') ;
					calendar.refetchEvents();
				},
				error:function(error){
					console.log(JSON.stringify(error));
					alert("Hay un error");}
			});
		
		}

		function limpiarFormulario(){
			
				$('#txtID').val("");
				$('#txtTitulo').val("");
				$('#txtFechaInicio').val("");
				$('#txtHoraInicio').val("");
				$('#txtFechaFin').val("");
				$('#txtHoraFin').val("");
				$('#txtDescripcion').val("");

		}
		
	});
</script>
@endsection
