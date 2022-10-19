<div class="main_menu">
  <nav class="navbar navbar-expand-lg navbar-light main_box">
      <div class="container">
          <!-- Logo/Marca -->
          <a class="navbar-brand logo_h"  href="{{url('/')}}"><span style="font-weight: bold; font-size:30px;">Groovy</span><span style="font-weight: bold; font-size:55px; color:#10ABC6;">.</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <!-- Menú -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
              <ul class="nav navbar-nav menu_nav ml-auto">
                  <li class="nav-item active"><a class="nav-link"  href="{{url('/')}}">Inicio</a></li>
                  <li class="nav-item "><a href="{{url('category')}}" class="nav-link ">Categorias</a></li>
                  
                  <li class="nav-item"><a class="nav-link" href="{{url('cart')}}">Carrito</a></li>

                  <li class="nav-item d-none d-lg-flex ms-1">
                  @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary py-2 px-2" style="color: white; font-weight: 300; border-radius: 40px; width: 135px;" href="{{ route('login') }}"  >{{ __('Iniciar Secion') }}</a>
                        </li>
                    @endif
                
                      @else
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle btn btn-primary py-2 px-2" style="color: white; font-weight: 300; border-radius: 40px; width: 135px;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              {{ Auth::user()->name }}
                          </a>
                          
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li>
                                  <a class="dropdown-item" href="#">perfil</a>
                              </li>
                              <li>
                                  <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                                  </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </li>
                      
                          </ul>
                          

                        </li>
                      @endguest
                  </li>
                  
              </ul>
              

          </div>
      </div>
  </nav>
</div>
