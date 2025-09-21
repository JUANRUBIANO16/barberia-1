 <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">inicio</div>
                            <a class="nav-link" href="{{route('panel')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                panel
                            </a>
                           <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div> --->
                            <div class="sb-sidenav-menu-heading">modulos</div>
                            <a class="nav-link" href="{{route('barberia.inicio')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-home"></i></div>
                                Ver Sitio Web
                            </a>
                            <a class="nav-link" href="{{route('categoria.index')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-truck"></i></div>
                                Categorias
                            </a>
                            <a class="nav-link" href="{{route('marca.index')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-trademark"></i></div>
                                Marcas
                            </a>
                            <a class="nav-link" href="{{route('presentacion.index')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                                Presentaciones
                            </a>
                            <a class="nav-link" href="{{route('producto.index')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                                Productos
                            </a>
                                   <a class="nav-link" href="{{route('cita.index')}}">
                                       <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                                       Citas
                                   </a>
                                   <a class="nav-link" href="{{route('usuario.index')}}">
                                       <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                       Usuarios
                                   </a>
                               </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        @auth
                            <div class="small">Bienvenido, {{ Auth::user()->name }}</div>
                            <div class="small text-muted">{{ ucfirst(Auth::user()->role) }}</div>
                            <div class="mt-2">
                                <a href="{{ route('barberia.inicio') }}" class="btn btn-outline-light btn-sm me-1">Ver Sitio Web</a>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Cerrar Sesión</button>
                                </form>
                            </div>
                        @else
                            <div class="small">bienvenido</div>
                            <a href="{{ route('barberia.inicio') }}" class="btn btn-outline-light btn-sm">Ver Sitio Web</a>
                        @endauth
                    </div>
                </nav>
            </div>