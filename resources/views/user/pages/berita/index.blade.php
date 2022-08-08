@extends('user.layouts.default_3')

@section('content')

<div class="container mb-5">
  <a href="{{ route('user.home') }}">< Kembali kehalaman utama</a>
</div>
<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container" data-aos="fade-up">

    

    <div class="row">
      <div class="col-6">
        <form action="" method="GET">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Berita" name="cari">
            <button class="btn btn-secondary py-0" type="submit" id="button-addon2">Cari</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
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
    {{ $berita->withQueryString()->links() }}
  </div>
</section><!-- End Sevices Section -->


@endsection

@push('after-script')
@endpush