<nav class="navbar navbar-default navbar-fixed-top appsLand-navbar navBar__style-2">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
                <span class="menu-toggle">
                    <i class="chart"></i>
                    <i class="chart"></i>
                    <i class="chart"></i>
                </span>
            <a class="navbar-brand" href="#">
                <img alt="" src="{{asset('assets/images/logos/logo-w-p.png')}}">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="app-links" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right appsLand-links">
                <li class="visible-xs-block text-center mobile-size-logo">
                    <a href="#">
                        <img alt="" src="{{asset('assets/images/logos/logo-w-p.png')}}">
                    </a>
                </li>
                <li><a href="{{route('index')}}#home">Home</a></li>
                <li><a href="{{route('index')}}#features">Características</a></li>
                <li><a href="{{route('index')}}#pricing">Planos</a></li>
                <li><a href="{{route('index')}}#testimonials">Cases</a></li>
                <li><a href="{{route('blog.index')}}">Blog</a></li>
                {{--<li class="dropdown hidden-xs">--}}
                    {{--<a href="#blog"></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="blog-3-column.html">Blog 3 Column</a></li>--}}
                        {{--<li><a href="blog-2-column.html">Blog 2 Column</a></li>--}}
                        {{--<li><a href="blog-2-column-sidebar-left.html">2 Column Left Aside</a></li>--}}
                        {{--<li><a href="blog-2-column-sidebar-right.html">2 Column Right Aside</a></li>--}}
                        {{--<li><a href="blog-list-full-width.html">Blog List Full Width</a></li>--}}
                        {{--<li><a href="blog-list-sidebar-left.html">List Left Aside</a></li>--}}
                        {{--<li><a href="blog-list-sidebar-right.html">List Right Aside</a></li>--}}
                        {{--<li><a href="single-post.html">Single Post Full Width</a></li>--}}
                        {{--<li><a href="single-post-sidebar-left.html">Single Post Left Aside</a></li>--}}
                        {{--<li><a href="single-post-sidebar-right.html">Single Post Right Aside</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="visible-xs-block mobile-dropdown-menu">--}}
                        {{--<span class="block pointer" role="button" data-toggle="collapse" data-target="#blog_menu"--}}
                              {{--aria-expanded="false">--}}
                            {{--Blog--}}
                        {{--</span>--}}
                    {{--<ul class="collapse list-unstyled" id="blog_menu">--}}
                        {{--<li><a href="#blog" class="scrollLink">Last News</a></li>--}}
                        {{--<li><a href="blog-3-column.html">Blog 3 Column</a></li>--}}
                        {{--<li><a href="blog-2-column.html">Blog 2 Column</a></li>--}}
                        {{--<li><a href="blog-2-column-sidebar-left.html">2 Column Left Aside</a></li>--}}
                        {{--<li><a href="blog-2-column-sidebar-right.html">2 Column Right Aside</a></li>--}}
                        {{--<li><a href="blog-list-full-width.html">Blog List Full Width</a></li>--}}
                        {{--<li><a href="blog-list-sidebar-left.html">List Left Aside</a></li>--}}
                        {{--<li><a href="blog-list-sidebar-right.html">List Right Aside</a></li>--}}
                        {{--<li><a href="single-post.html">Single Post Full Width</a></li>--}}
                        {{--<li><a href="single-post-sidebar-left.html">Single Post Left Aside</a></li>--}}
                        {{--<li><a href="single-post-sidebar-right.html">Single Post Right Aside</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li><a href="#contact">Contato</a></li>
                <li><a href="{{Auth::check() ? Auth::user()->getHomeUrl() : route('login')}}">Entrar</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>