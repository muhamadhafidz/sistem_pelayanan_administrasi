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
  <!-- LOADER TEMPLATE -->
<div id="page-loader">
  <div class="loader-icon fa fa-spin colored-border"></div>
</div>
    @include('user.includes.header2')
    <div class="my-5" style="padding-bottom: 200px;padding-top:100px">
      @yield('content')
    </div>
    @include('user.includes.footer')

    @stack('before-script')
    @include('user.includes.script')
    @stack('after-script')
    @include('sweetalert::alert')
        
</body>

</html>
