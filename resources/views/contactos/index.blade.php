@extends("layouts.app")
		
		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Contactos</div>
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
						  <div class="ms-auto"><a href="{{ route('create.contacto') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Nuevo Contacto</a></div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
									 
										<th>Nombre Completo</th>
										<th>Email</th>
										<th>Register Date</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($contactos as $item )
									<tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                               
                                                <div class="ms-2">
                                                    <h6 class="mb-0 font-14">{{  $item->fullName}}</h6>
                                                  
                                                </div>
                                            </div>
                                        </td>
										<td>
											<div class="d-flex align-items-center">
											 
												<div class="ms-2">
													<h6 class="mb-0 font-14">{{  $item->email}}</h6>
												</div>
											</div>
										</td>
										<td>June 10, 2020</td>
										 
										<td>
											<div class="d-flex order-actions">
												<a href="{{ URL::action('App\Http\Controllers\ContactosController@edit',$item->id) }}" class=""><i class='bx bxs-edit'></i></a>
												<a class="" href=""  data-bs-toggle="modal" data-bs-target="#mc-{{$item->id}}" ><i class='bx bxs-trash'></i></a>
											</div>
										</td>
									</tr>
									@include('contactos.modal')
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
	