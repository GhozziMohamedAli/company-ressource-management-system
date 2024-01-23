 <aside class="sidenav sidebar-wrapper bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 @if(session('direction') == 'rtl') fixed-end @else fixed-start @endif ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 @if(session('direction')=='rtl') ml-5 @endif " href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="../assets/img/pmc.jpg" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">PMC</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse h-100  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ $activePage == 'dashboard' ? 'active' : '' }}" href="/">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">{{__('Dashboard')}}</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $activePage == 'institution' ? 'active' : '' }}" href="/institution">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-building text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">{{__('Institution')}}</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $activePage == 'document' ? 'active' : '' }}" href="/documents">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-book-bookmark text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">{{__('Official Documents')}}</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $activePage == 'employee' ? 'active' : '' }}" href="/employee">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">{{__('Employee')}}</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ $activePage == 'branche' ? 'active' : '' }}" href="/branche">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-basket text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">{{__('Branche')}}</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ $activePage == 'store' ? 'active' : '' }}" href="/store">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-shop text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">{{__('Store')}}</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ $activePage == 'computer' ? 'active' : '' }}" href="/computer">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-laptop text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">{{__('Computers')}}</span>
          </a>
        </li>
       
            
        </li>

        <li class="nav-item">
          <a class="nav-link {{ $activePage == 'car' ? 'active' : '' }}" href="/car">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-bus-front-12 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">{{__('Cars')}}</span>
          </a>
        </li>
       
            
        </li>

        <li class="nav-item">
          <div class="dropdown">
                            
            
            
                            
            <a href="#" class="nav-link dropdown-toggle {{ $activePage == 'safety' ? 'active' : '' }} " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
              
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-settings text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">{{__('Safety')}}</span>
            </a>
            </a>
            
            <ul class=" nav dropdown-menu " style="margin-top: 0 !important;" aria-labelledby="navbarDropdownMenuLink2">
                <li>
                    <a class=" nav-link dropdown-item text-center" href="/extinguisher">
                      <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-ui-04 text-primary text-sm opacity-10"></i>
                      </div>
                      <span class="nav-link-text ms-1">{{__('Extinguisher')}}</span>
                 
                    </a>
                </li>
    
                
            </ul>
          
        
        
        </div>
          
        </li>
       
            
        </li>
        
      </ul>
    </div>
  </aside>

  
