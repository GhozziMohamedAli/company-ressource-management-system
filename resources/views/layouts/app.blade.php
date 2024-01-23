<!DOCTYPE html>
<html @if(session('locale') == 'ar') lang="ar" dir="rtl" @else lang="en" dir="ltr" @endif>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <title>
          PMC HRMS
        </title>
        <link href="{{url('assets/css/custom.css')}}" rel="stylesheet" />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ url('assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />

       


        <!--JQUERY-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        

        
        
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
        <script src="{{ url('assets/js/moment-hijri.js') }}"></script>
        
        <!-- Bootstrap Core Js -->


        <script src="{{ url('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ url('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>

        
        <script src="{{ url('assets/js/core/popper.min.js') }}"></script>
        <script src="{{ url('assets/js/core/bootstrap.js') }}"></script>
        <script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ url('assets/js/core/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('assets/js/core/bootstrap.bundle.js') }}"></script>

        <!-- Bootstrap CSS -->
        <link href="{{ url('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="{{ url('assets/css/bootstrap-grid.css') }}">
        <link href="{{ url('assets/css/bootstrap-grid.min.css') }}"  rel="stylesheet" />
        <link href="{{ url('assets/css/bootstrap-reboot.css') }}"  rel="stylesheet" />
        <link href="{{ url('assets/css/bootstrap-reboot.min.css') }}"  rel="stylesheet" />
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ url('assets/css/bootstrap-grid.css') }}"  rel="stylesheet" /> 

        @if(session('direction')=='rtl')
          <link rel="stylesheet" href="{{url('assets/css/rtl_direction.css')}}">
        @endif

        <!-- Hijri -->
        <link href=" {{url('assets/css/bootstrap-datetimepicker.css')}} " rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
        <script src="{{url('assets/js/bootstrap-hijri-datetimepicker.min.js')}} "></script>
        <script src="{{url('assets/js/bootstrap-hijri-datetimepicker.js')}} "></script>
        
      
        

        <!-- Moment Hijri.js (Islamic calendar support for Moment.js) -->
   
        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

        <script src="{{url('assets/js/jquery-ui.js')}}"></script>

        <!--TOAST-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

       
   

      
      </head>
<body class="g-sidenav-show  @if(session('direction') == 'rtl') rtl @endif bg-gray-100">
  
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  
    @auth
    @include('./layouts/sidebar')
   @endauth
    <main class="main-content position-relative border-radius-lg ">
      
   
      @include('./layouts/navbar')

      @yield("content")
    </main>


    




    <script>
      
                var win = navigator.platform.indexOf('Win') > -1;
                if (win && document.querySelector('#sidenav-scrollbar')) {
                  var options = {
                    damping: '0.5'
                  }
                  Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
                }
              </script>



    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ url('assets/js/custom.js') }}" ></script>
    <input type="text" id="current_local" value="{{session('locale')}}" hidden>
  </body>


</html>