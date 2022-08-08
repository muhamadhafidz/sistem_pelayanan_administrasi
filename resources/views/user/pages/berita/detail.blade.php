@extends('user.layouts.default_3')

@section('content')

<main id="main">
  <div class="container mb-5">
    <a href="{{ route('user.berita') }}">< Kembali </a>
  </div>
  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details pt-0">
    <div class="container">
      <h3>{{ $berita->judul }}</h3>
      <br>
      <img src="{{ asset($berita->foto) }}" alt="" class="w-100">

      <br>

      <div class="text-justify">
        {{ $berita->isi }}
      </div>
    </div>
  </section><!-- End Portfolio Details Section -->
</main>
@endsection

@push('after-script')
@endpush