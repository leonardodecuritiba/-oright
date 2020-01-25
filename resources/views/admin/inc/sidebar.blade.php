<!-- Sidebar -->
<aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
    <header class="sidebar-header">
        <a class="logo-icon" href="{{route('admin.index')}}"><img src="{{asset('assets/images/logos/logo-w-p.png')}}"
                                                                  alt="logo icon"></a>
        <span class="logo">
          <a href="{{route('admin.index')}}">
              {{ config('app.name', 'Oright - Admin') }}
          </a>
        </span>
        <span class="sidebar-toggle-fold"></span>
    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">
            <li class="menu-category">Clientes</li>

            <li class="menu-item">
                <a class="menu-link" href="{{route('clients.index')}}">
                    <span class="icon fa fa-users"></span>
                    <span class="title">Clientes</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{route('works.index')}}">
                    <span class="icon fa fa-tasks"></span>
                    <span class="title">Trabalhos</span>
                </a>
            </li>

            <li class="menu-category">Admins</li>

            <li class="menu-item">
                <a class="menu-link" href="{{route('admins.index')}}">
                    <span class="icon fa fa-users"></span>
                    <span class="title">Admins</span>
                </a>
            </li>

            <li class="menu-category">Configurações</li>

            <li class="menu-item">
                <a class="menu-link" href="{{route('cases.index')}}">
                    <span class="icon fa fa-folder-open"></span>
                    <span class="title">Cases</span>
                </a>
            </li>


            <li class="menu-item">
                <a class="menu-link" href="{{route('categories.index')}}">
                    <span class="icon fa fa-folder-open"></span>
                    <span class="title">Categorias</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{route('plans.index')}}">
                    <span class="icon fa fa-folder-open"></span>
                    <span class="title">Planos</span>
                </a>
            </li>

            <li class="menu-category">Blog</li>


            <li class="menu-item">
                <a class="menu-link" href="{{route('blog_categories.index')}}">
                    <span class="icon fa fa-folder-open"></span>
                    <span class="title">Categorias do Blog</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="{{route('posts.index')}}">
                    <span class="icon fa fa-folder-open"></span>
                    <span class="title">Publicações</span>
                </a>
            </li>


        </ul>
    </nav>

</aside>
<!-- END Sidebar -->
