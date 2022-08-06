<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="it">
  <meta name="keywords" content="Rapoo,creative, agency, startup,onepage, clean, modern,business, company,it">
  
  <meta name="author" content="themefisher.com">

  <title>Sistem Informasi Pelayanan Administrasi Kependudukan</title>

  


    <!--     Fonts and icons     -->
    @include('user.includes.font')
    <!-- CSS Files -->
    @stack('before-style')
    @include('user.includes.style')
    @stack('after-style')

</head>
<body>
    {{-- @include('user.includes.header') --}}
    @yield('content')
    @include('user.includes.footer')

    @stack('before-script')
    @include('user.includes.script')
    @stack('after-script')
    @include('sweetalert::alert')
        
</body>

</html>
