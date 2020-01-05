<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('home') }}" class="simple-text logo-mini"><img src="{{ asset('black') }}/img/MGIcon.png"></a>
            <a href="{{ route('home') }}" class="simple-text logo-normal">{{ _('RM Client') }}</a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ route('home') }}">
{{--                    <i class="tim-icons icon-chart-pie-36"></i>--}}
                    <i class="tim-icons icon-tv-2"></i>
                    <p>{{ _('Inicio') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('campanas.index') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ _('Campaña') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="tim-icons icon-single-02"></i>
                    <span class="nav-link-text">{{ __('Clientes') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('clientes.indexCartera') }}">
                                <i class="tim-icons icon-credit-card"></i>
                                <p>{{ _('Cartera de Clientes') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('clientes.asignarCartera') }}">
                                <i class="tim-icons icon-basket-simple"></i>
                                <p>{{ _('Clientes Disponibles') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="{{ route('cotizaciones.index') }}">
                    <i class="tim-icons icon-notes"></i>
                    <p>{{ _('Cotización') }}</p>
                </a>
            </li>
            @can('empleados.index')
                <li>
                    <a href="{{ route('empleados.index') }}">
                        <i class="tim-icons icon-single-02"></i>
                        <p>{{ _('Empleados') }}</p>
                    </a>
                </li>
            @endcan
            @can('permissions.index')
                <li>
                    <a href="{{ route('permissions.index') }}">
                        <i class="tim-icons icon-bag-16"></i>
                        <p>{{ _('Permisos') }}</p>
                    </a>
                </li>
            @endcan
            @can('proveedores.index')
                <li>
                    <a href="{{ route('proveedores.index') }}">
                        <i class="tim-icons icon-credit-card"></i>
                        <p>{{ _('Proveedores') }}</p>
                    </a>
                </li>
            @endcan
            @can('roles.index')
                <li>
                    <a href="{{ route('roles.index') }}">
                        <i class="tim-icons icon-check-2"></i>
                        <p>{{ _('Roles') }}</p>
                    </a>
                </li>
            @endcan
            @can('sedes.index')
                <li>
                    <a href="{{ route('sedes.index') }}">
                        <i class="tim-icons icon-world"></i>
                        <p>{{ _('Sedes') }}</p>
                    </a>
                </li>
            @endcan
            @can('users.index')
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="tim-icons icon-single-02"></i>
                        <p>{{ _('Usuarios') }}</p>
                    </a>
                </li>
            @endcan
            @can('vehiculos.index')
                <li>
                    <a href="{{ route('vehiculos.index') }}">
                        <i class="tim-icons icon-bus-front-12"></i>
                        <p>{{ _('Vehículos') }}</p>
                    </a>
                </li>
            @endcan
        <!--li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel"></i>
                    <span class="nav-link-text">{{ __('Laravel Examples') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('User Profile') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('User Management') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.icons') }}">
                                <i class="tim-icons icon-atom"></i>
                                <p>{{ _('Icons') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.maps') }}">
                                <i class="tim-icons icon-pin"></i>
                                <p>{{ _('Maps') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.notifications') }}">
                                <i class="tim-icons icon-bell-55"></i>
                                <p>{{ _('Notifications') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.tables') }}">
                                <i class="tim-icons icon-puzzle-10"></i>
                                <p>{{ _('Table List') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.typography') }}">
                                <i class="tim-icons icon-align-center"></i>
                                <p>{{ _('Typography') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.rtl') }}">
                                <i class="tim-icons icon-world"></i>
                                <p>{{ _('RTL Support') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.upgrade') }}">
                                <i class="tim-icons icon-spaceship"></i>
                                <p>{{ _('Upgrade to PRO') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li-->
        </ul>
    </div>
</div>
