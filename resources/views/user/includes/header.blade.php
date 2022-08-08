<div class="top-bar bg-dark " id="top-bar">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-8">
              <div class="top-bar-left text-white">
                  <i class="fa fa-map-marker"></i>
                  <span class="ml-2">Desa Jenggawur, Kabupaten Tegal</span>
              </div>
          </div>

          <div class="col-4">
              <ul class="d-flex list-unstyled header-socials float-lg-right">
                  <li><a href="#"> <i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"> <i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"> <i class="fab fa-pinterest-p"></i></a></li>
                  <li><a href="#"> <i class="fab fa-linkedin"></i></a></li>
              </ul>
          </div>
      </div>
  </div>
</div>

<div class="logo-bar d-block bg-light">
  <div class="container">
      <div class="row">
          <div class="col-md-4">
              <div class="logo d-block">
                  <!-- Brand -->
                  <a class="navbar-brand d-flex" href="index.html">
                      <img height="80rem" src="{{ asset('assets/images/logo_tegal.png') }}" alt="">
                      <h4 class="ml-4 text-wrap d-inline my-auto" style="color: #212529!important;">Sistem Informasi Pelayanan Administrasi Kependudukan Desa Jenggawur</h4>
                  </a>
              </div>
          </div>

          <div class="col-md-8 d-block mt-5 d-md-none justify-content-end ml-lg-auto justify-content-md-center">
              <div class="row mt-3">
                  <div class="col">
                      <div class="row">
                          <div class="col-4 align-self-center mx-auto px-0 text-center">
                              <div class="icon-block mb-0" style="font-size: 24px; line-height: 0;">
                                  <i class="ti-mobile"></i>
                              </div>
                          </div>
                          <div class="col-8 px-0 align-self-center mx-auto ">
                              <div class="info-block mb-0">
                                  <h6 class="mb-0 font-weight-500">(021)809346657</h6>
                                  <p class="my-0" style="font-size: 12px;">Telepon</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col">
                      <div class="row">
                          <div class="col-4 align-self-center mx-auto px-0 text-center">
                              <div class="icon-block mb-0" style="font-size: 24px; line-height: 0;">
                                  <i class="ti-mobile"></i>
                              </div>
                          </div>
                          <div class="col-8 px-0 align-self-center mx-auto ">
                              <div class="info-block mb-0">
                                  <h6 class="mb-0 font-weight-500">(021)809346657</h6>
                                  <p class="my-0" style="font-size: 12px;">Telepon</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col">
                      <div class="row">
                          <div class="col-4 align-self-center mx-auto px-0 text-center">
                              <div class="icon-block mb-0" style="font-size: 24px; line-height: 0;">
                                  <i class="ti-mobile"></i>
                              </div>
                          </div>
                          <div class="col-8 px-0 align-self-center mx-auto ">
                              <div class="info-block mb-0">
                                  <h6 class="mb-0 font-weight-500">(021)809346657</h6>
                                  <p class="my-0" style="font-size: 12px;">Telepon</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-8 d-none justify-content-end ml-lg-auto d-md-flex justify-content-md-center">
              <div class="top-info-block d-inline-flex my-auto">
                  <div class="icon-block">
                      <i class="ti-mobile"></i>
                  </div>
                  <div class="info-block">
                      <h5 class="font-weight-500">(021)809346657</h5>
                      <p>Telepon</p>
                  </div>
              </div>

              <div class="top-info-block d-inline-flex my-auto">
                  <div class="icon-block">
                      <i class="ti-email"></i>
                  </div>
                  <div class="info-block">
                      <h5 class="font-weight-500">info@sistegal.com</h5>
                      <p>Email</p>
                  </div>
              </div>
              <div class="top-info-block d-inline-flex my-auto">
                  <div class="icon-block">
                      <i class="ti-time"></i>
                  </div>
                  <div class="info-block">
                      <h5 class="font-weight-500">Senin-Jumat 9:00-12.00 </h5>
                      <p>Jadwal</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<!-- NAVBAR
================================================= -->
<div class="main-navigation" id="mainmenu-area">
  <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary main-nav navbar-togglable rounded-radius" id="navbar-scroll">

          <a class="navbar-brand d-lg-none d-block" href="" >
              <h4>Menu</h4>
          </a>
          <a class="navbar-brand d-none" href="" id="navbar-scroll-logo">
              <img height="40rem" src="{{ asset('assets/images/logo_tegal.png') }}" alt="">
          </a>
          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="fa fa-bars"></span>
          </button>

          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="navbarCollapse">
              <!-- Links -->
              <ul class="navbar-nav ">
                  <li class="nav-item ">
                      <a href="{{ route('user.home') }}" class="nav-link">
                          Beranda
                      </a>
                  </li>
                  <li class="nav-item ">
                      <a href="#tatacara" class="nav-link">
                          Panduan
                      </a>
                  </li>
                  <li class="nav-item ">
                      <a href="#layanankami" class="nav-link">
                          Layanan Kami
                      </a>
                  </li>
                  <li class="nav-item ">
                      <a href="#berita" class="nav-link">
                          Berita
                      </a>
                  </li>
                  <li class="nav-item ">
                      <a href="#tentangkami" class="nav-link">
                          Tentang Kami
                      </a>
                  </li>

              </ul>
              @auth
              <ul class="ml-lg-auto list-unstyled m-0">
                <li class="nav-item dropdown">
                  <a class="nav-link text-white dropdown-toggle" href="#" id="navbarWelcome" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->nama }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarWelcome">
                      <a class="dropdown-item" href="">
                          Dashboard
                      </a>
                      <a class="dropdown-item" href="">
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
              @else
              <ul class="ml-lg-auto list-unstyled m-0">
                  <li><a href="{{ route('login') }}" class="btn btn-white btn-circled">Masuk</a></li>
              </ul>
              @endauth
          </div> <!-- / .navbar-collapse -->
      </nav>
  </div> <!-- / .container -->
</div>