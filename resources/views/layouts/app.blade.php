<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90563832-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-90563832-7');
</script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title',config('app.name'))</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Icon 16x16 -->
  <link rel="icon" type="image/png" sizes="240x240" href="{{asset('img/iconohome.png')}}">

  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/back/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/back/font-awesome.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" type="text/css" href="{{asset('plugins/iCheck/skins/flat/green.css')}}">
  <!-- Custom Theme Style -->
  <link href="{{asset('css/back/custom.min.css')}}" rel="stylesheet">
  <!-- Animate Css -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <!-- Estilos -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/back/estilos.css')}}">

  
  <!-- Chosen -->
  <link  rel="stylesheet" type="text/css"  href="{{asset('plugins/chosen/chosen.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/back/boostrap-chosen.css')}}">
  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/r-2.2.1/datatables.min.css"/>

  <!-- CDNS -->
   <!-- Bootstrap file_input -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/img/loading-sm.gif" media="all" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/img/loading.gif" media="all" rel="stylesheet" type="text/css" />
  
</head>

<body class="nav-md" id="content">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          @include('partials.sidebar') 
          @include ('partials.navbar')

          <!-- CONTENIDO -->
          <div class="right_col" role="main">
            @yield('content')
          </div>
          <!-- /CONTENIDO -->

          <!-- footer content -->
          <footer>
            <div class="pull-right">
              Creado por:
              <a href="#">LALALA</a>
            </div>
            <div class="clearfix"></div>
          </footer>
          <!-- /footer content -->
        </div>
      </div>

      <!-- jQuery 2.1.4 -->
      <script type="text/javascript" src="{{asset('plugins/jquery/dist/jquery.min.js')}}"></script>

      <!-- Bootstrap 3.3.5 -->
      <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
      <!-- Bootstrap short -->
      <script type="text/javascript" src="{{asset('js/bootstrap-sortable.js')}}"></script>

      <!-- Boostrap File_Input -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/locales/es.js"></script>
      
      <!-- FastClick -->
      <script src="{{asset('plugins/fastclick/lib/fastclick.js')}}"></script>

      <!-- iCheck -->
      <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>

      <!-- Custom Theme Scripts -->
      <script src="{{asset('js/custom.min.js')}}"></script>

      <script src="{{ asset('js/sweetalert2.js') }}"></script>
      <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

      <!--JS DE FancyProductDesigner-->
      <script src="{{asset('js/front/jquery-ui.min.js')}}"></script>
      
      <!-- ESTILOS PROPIOS  -->
      <script src="{{asset('js/estilos.js')}}"></script>
      <!-- CHOSEN -->
        <script src="{{ asset('plugins/chosen/chosen.jquery.js')}}"></script>
      @yield('js')
      <!-- Datatable -->
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/r-2.2.1/datatables.min.js"></script>  
      <script>
        fullscreen = function (e) {
          if (e.webkitRequestFullScreen) {
            e.webkitRequestFullScreen();
          } else if (e.mozRequestFullScreen) {
            e.mozRequestFullScreen();
          }
        }
        document.getElementById('fullscreen').onclick = function () {
          fullscreen(document.documentElement);
        }
    //DATATABLE
     $(window).ready(function(){
        $('.data-table').DataTable({
          responsive: true,
          "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            }
        });
        

      })
    //CHOSEN
    $('.select-options').chosen({
        no_results_text: 'No se encontro esta categoria'

    });
     $('.select-tag').chosen({
            placeholder_text_multiple: 'Seleccione sus opciones',
            
            search_contains: true,
            no_results_text: 'No se encontraron resultados de su busqueda'
       });
       
      </script>
</body>

</html>
