<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('CRM') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('Royal Motors') }}</a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('cotizaciones.index') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ _('Cotizacion') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('campanas.index') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ _('Campaña') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('sedes.index') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ _('Sedes') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('vehiculos.index') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ _('Vehiculos') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('clientes.index') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ _('Clientes') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Laravel Examples') }}</span>
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
            </li>

        </ul>
    </div>
</div>
