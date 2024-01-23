    <!-- Navbar -->
    @if (Session::has('msg'))
    @include('toast',[
        'msg' => Session::get('msg')
    ]);
    @endif
    
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">

          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">

           
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group w-25">
                 <div class="dropdown">
                            
            
            
                            
              <a href="#" class="btn bg-gradient-dark dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                <img class="w-10" src="@if(session('direction') == 'rtl') {{asset('assets/img/saudi-arabia.png')}} @else {{asset('assets/img/united-states.png')}} @endif"> {{__('Language')}}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                  <li>
                      <a class="dropdown-item" href="/change-language/ar">
                        <img class="w-10" src="{{asset('assets/img/saudi-arabia.png')}}"> العربية
                      </a>
                  </li>
                  <li>
                      <a class="dropdown-item" href="/change-language/en">
                        <img class="w-10" src="{{asset('assets/img/united-states.png')}}"> English
                      </a>
                  </li>
                  
              </ul>
            
          
          
          </div>
              </div>
            </div>
            @auth
          
            <ul class="navbar-nav  @if(session('locale')=="ar") me-auto ms-0 justify-content-end @endif ">
              <li class="nav-item d-flex align-items-center">
                <a href="{{ route('logout') }}" class="nav-link text-white font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none">{{__('Sign out')}}</span>
                </a>
              </li>
              
           


              
            </ul>
            @endauth
          </div>
        </div>
      </nav>
      <!-- End Navbar -->