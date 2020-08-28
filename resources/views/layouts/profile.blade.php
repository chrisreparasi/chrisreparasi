<!doctype html>
<html lang="en" id="section-home">
  <head>
    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <!-- Lightbox CSS -->
    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">

    <!-- Lightbox JS -->
    <script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>

    @yield('title')
  </head>

  <!-- GetButton.io widget -->
  <script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+62 818-0671-1022", // WhatsApp number
            call_to_action: "Hubungi Kami di WhatsApp", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
  </script>

  <body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container">
      <a class="navbar-brand page-scroll" href="/"><i class="material-icons md-24">build</i>ChrisReparasi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          @yield('navbar')
        </div>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->
  
    @yield('content')

  <!-- Footer -->
  <section class="footer">
    <div class="row">
      <div class="col text-center">
        <p>&copy; Copyright 2020 | Chris Reparasi</p>
      </div>
    </div>
  </section>
  <!-- Akhir Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.3/smooth-scroll.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  @include('sweetalert::alert')
  </body>
</html>