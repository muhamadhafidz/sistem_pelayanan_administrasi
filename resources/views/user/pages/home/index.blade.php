@extends('user.layouts.default')

@section('content')
 
<!-- HERO
    ================================================== -->
    <section class="banner-area py-7">
      <!-- Content -->
      <div class="container">
          <div class="row align-items-center">
              <div class="col-md-12 col-lg-7 text-center text-lg-left">
                  <div class="main-banner">
                      <!-- Heading -->
                      <h1 class="display-5 mb-4 font-weight-normal">
                          Pelayanan Administrasi Kependudukan Berbasis Online
                      </h1>

                      <!-- Subheading -->
                      <p class="lead mb-4">
                          untuk meningkatkan efektivitas pelayanan administrasi kependudukan kepada masyarakat Desa Jenggawur
                      </p>

                      <!-- Button -->
                      <p class="mb-0">
                          <a href="#" target="_blank" class="btn btn-primary btn-circled">
                              Daftar
                          </a>
                      </p>
                  </div>
              </div>
              <div class="col-lg-5 d-none d-lg-block">
                  <div class="banner-img-block">
                      <img src="{{ asset('assets/images/banner-img-6.png') }}" alt="banner-img" class="img-fluid">
                  </div>
              </div>

          </div> <!-- / .row -->
      </div> <!-- / .container -->
  </section>


  <section class="section bg-grey" id="tatacara">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8 col-lg-6 text-center">
                  <div class="section-heading">
                      <!-- Heading -->
                      <h2 class="section-title mb-2">
                          Cara menggunakan layanan kami
                      </h2>
                  </div>
              </div>
          </div> <!-- / .row -->
          <div class="row justy-content-center">
              <div class="col-lg-3 col-sm-6 col-md-6">
                  <div class="text-center feature-block">
                      <div class="img-icon-block mb-4">
                          <h1>1</h1>
                      </div>
                      <h4 class="mb-2">Daftarkan Diri</h4>
                      <p>Hubungi nomor Whatsapp Admin dengan mengirimkan NIK agar mendapatkan pin untuk login</p>
                  </div>
              </div>

              <div class="col-lg-3 col-sm-6 col-md-6">
                  <div class="text-center feature-block">
                      <div class="img-icon-block mb-4">
                          <h1>2</h1>
                      </div>
                      <h4 class="mb-2">Masuk/Login</h4>
                      <p>Masuk ke website dengan NIK dan pin yang telah didapatkan saat mendaftar</p>
                  </div>
              </div>

              <div class="col-lg-3 col-sm-6 col-md-6">
                  <div class="text-center feature-block">
                      <div class="img-icon-block mb-4">
                          <h1>3</h1>
                      </div>
                      <h4 class="mb-2">Pilih Berkas</h4>
                      <p>Pilih jenis berkas administrasi yang ingin diajukan untuk dibuat, dengan menyertakan KTP dan KK.</p>
                  </div>
              </div>

              <div class="col-lg-3 col-sm-6 col-md-6">
                  <div class="text-center feature-block">
                      <div class="img-icon-block mb-4">
                          <h1>4</h1>
                      </div>
                      <h4 class="mb-2">Berkas Diterima</h4>
                      <p>Berkas akan diterima setelah dikonfirmasi oleh Admin dan Kepala Desa.</p>
                  </div>
              </div>
          </div>
      </div> <!-- / .container -->
  </section>


  <section class="section" id="layanankami">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8 col-lg-6 text-center">
                  <div class="section-heading">
                      <!-- Heading -->
                      <h2 class="section-title mb-2 text-white">
                          Layanan Administrasi Kependudukan
                      </h2>

                      <!-- Subheading -->
                      <p class="mb-5 text-white">
                          Website ini melayani pembuatan administrasi kependudukan.
                      </p>
                  </div>
              </div>
          </div> <!-- / .row -->

          <div class="row">
              <div class="col-md-4">
                  <div class="web-service-block">
                      <i class="ti-home"></i>
                      <h3>Surat Keterangan Tidak Mampu (SKTM)</h3>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="web-service-block">
                      <i class="ti-notepad"></i>
                      <h3>Surat Pengantar Keterangan Catatan Kepolisian</h3>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="web-service-block">
                      <i class="ti-location-pin"></i>
                      <h3>Surat Keterangan Domisili</h3>
                  </div>
              </div>

              <div class="col-md-4 offset-md-2">
                  <div class="web-service-block">
                      <i class="ti-search"></i>
                      <h3>Surat Keterangan Kehilangan</h3>
                  </div>
              </div>
              <div class="col-md-4 ">
                  <div class="web-service-block">
                      <i class="ti-package"></i>
                      <h3>Surat Keterangan Usaha</h3>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="section" id="berita">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8 col-lg-6 text-center">
                  <div class="section-heading">
                      <!-- Heading -->
                      <h2 class="section-title">
                          Berita Terbaru Kami
                      </h2>
                      <a href="{{ route('user.berita') }}" class="btn btn-primary py-0">Lihat semua berita</a>
                  </div>
              </div>
          </div> <!-- / .row -->

          <div class="row justify-content-center">
            @forelse ($berita as $item)
                
            <div class="col-lg-3 col-6">
                <div class="blog-box">
                    <div class="blog-img-box">
                        <img src="{{ asset($item->foto) }}" alt="" class="img-fluid blog-img">
                    </div>
                    <div class="single-blog">
                        <div class="blog-content">
                            <h6> {{ $item->created_at->isoFormat('DD MMM YYYY') }}</h6>
                            <a href="#">
                                <h3 class="card-title">{{ $item->judul }}</h3>
                            </a>
                            <a href="{{ route('user.berita.detail', $item->slug) }}" class="read-more">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <h5>Tidak ada berita</h5>
            @endforelse

          </div>
      </div>
  </section>
@endsection

@push('after-script')
@endpush