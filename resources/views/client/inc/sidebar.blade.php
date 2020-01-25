<!-- Sidebar -->
<aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
    <header class="sidebar-header">
        <a class="logo-icon" href="{{route('home')}}"><img src="{{asset('assets/images/logos/logo-w-p.png')}}"
                                                                  alt="logo icon"></a>
        <span class="logo">
          <a href="{{route('home')}}">
              {{ config('app.name', 'Oright') }}
          </a>
        </span>
        <span class="sidebar-toggle-fold"></span>
    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">

            <li class="menu-item">
                <a class="menu-link" href="{{route('profile.my')}}">
                    <span class="ti-user"></span>
                    <span class="title">Meu Perfil</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{route('assigns.index')}}">
                    <span class="ti-ticket"></span>
                    <span class="title">Assinaturas</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{route('registers.index')}}">
                    <span class="ti-money"></span>
                    <span class="title">Movimentações</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{route('client_works.index')}}">
                    <span class="ti-notepad"></span>
                    <span class="title">Trabalhos</span>
                </a>
            </li>

        </ul>
    </nav>

</aside>
<!-- END Sidebar -->
