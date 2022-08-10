 <!-- NAVBAR
    ================================================= -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-togglable header-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h3>Layanan Mandiri</h3>
            </a>
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a href="{{ route('user.dashboard') }}" class="nav-link js-scroll-trigger">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('user.riwayat') }}" class="nav-link js-scroll-trigger">
                            Riwayat/Status Pengajuan
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('user.pengajuan') }}" class="nav-link js-scroll-trigger">
                            Ajukan Administrasi
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" id="navbarWelcome" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->nama }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarWelcome">
                            <a class="dropdown-item" href="{{ route('user.profil.index') }}">
                                Profil
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                  
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                      </li>
                </ul>
            </div> <!-- / .navbar-collapse -->
        </div> <!-- / .container -->
    </nav>