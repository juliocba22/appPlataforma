<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo_icon.fw.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Factoring</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    @if(auth::check())
      
        <ul class="metismenu" id="menu">
            @if(auth()->user()->role_id===1)
                <li>
                    <a href="{{ url('dashboard-alternate') }}">
                        <div class="parent-icon"><i class='bx bx-bar-chart-alt-2'></i>
                        </div>
                        <div class="menu-title">DASHBOARD</div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/usuarios') }}">
                        <div class="parent-icon"><i class='bx bx-user-pin'></i>
                        </div>
                        <div class="menu-title">USUARIOS</div>
                    </a>
                </li>
            @endif
            @if(auth()->user()->role_id===2 || auth()->user()->role_id===1  )
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="bx bx-menu"></i>
                            </div>
                            <div class="menu-title">Procesos</div>
                        </a>
                        <ul>
                            <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-arch"></i>Judiciales</a>
                                <ul>
                                    <li> <a class=" " href="{{ route('index.procesos') }}"><i class="bx bx-archive-out"></i>Activos</a>
                                        
                                    </li>
                                    <li> <a class=" " href="{{ route('indexarchivados.proceso') }}"><i class="bx bx-cabinet"></i>Archivados</a>
                                        
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!--ul>
                            <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-building-house"></i>Supersociedades</a>
                                <ul>
                                    <li> <a class=" " href="javascript:;"><i class="bx bx-archive-out"></i>Activos</a>
                                        
                                    </li>
                                    <li> <a class=" " href="javascript:;"><i class="bx bx-cabinet"></i>Archivados</a>
                                        
                                    </li>
                                </ul>
                            </li>
                        </ul-->
                    </li>
                <li>
        
                    <a href="{{ url('app-fullcalender') }}">
                        <div class="parent-icon"><i class='bx bx-calendar'></i>
                        </div>
                        <div class="menu-title">Mi agenda</div>
                    </a>
                </li>
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="bx bx-clipboard"></i>
                            </div>
                            <div class="menu-title">Informes</div>
                        </a>
                        <ul>
                            <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-folder-open"></i>Judiciales</a>
                                <ul>
                                    <li> <a class=" " href="{{ route('index.reportprocesos') }}"><i class="bx bx-file-blank"></i>Procesos registrados</a>
                                        
                                    </li>
                                    <li> <a class=" " href="javascript:;"><i class="bx bx-file-blank"></i>Notificaciones Judiciales</a>
                                        
                                    </li>
                                    <li> <a class=" " href="{{ route('index.reporteliminados') }}"><i class="bx bx-file-blank"></i>Procesos Eliminados</a>
                                        
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!--ul>
                            <li> <a class="has-arrow" href="javascript:;"><i class="bx bx-folder-open"></i>Supersociedades</a>
                                <ul>
                                    <li> <a class=" " href="javascript:;"><i class="bx bx-file-blank"></i>Procesos registrados</a>
                                        
                                    </li>
                                    <li> <a class=" " href="javascript:;"><i class="bx bx-file-blank"></i>Notificaciones Supersociedades</a>
                                        
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul-->
                    </li>
                    <li>
                    
                        <a href="{{ route('index.contactos') }}">
                            <div class="parent-icon"><i class='bx bx-user-circle'></i>
                            </div>
                            <div class="menu-title">Mis Contactos</div>
                        </a>
                    </li>
            @endif
            @endif
        
    </ul>
    <!--end navigation-->
</div>