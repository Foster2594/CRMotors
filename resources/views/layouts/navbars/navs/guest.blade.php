<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent fixed-top">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            {{ $page ?? '' }}
        </div>
        <div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a href="/" class="nav-link">
                        <i class="tim-icons icon-tv-2"></i> {{ __('Inicio') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('login') }}" class="nav-link">
                       <i class="tim-icons icon-single-02"></i> {{ __('Inicio de Sesión') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
