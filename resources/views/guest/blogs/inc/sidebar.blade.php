
<aside class="blog-asideMenu">
    {{--<form class="search-form hidden-sm hidden-xs">--}}
    {{--<div class="search-input-group form-group">--}}
    {{--<input type="text" class="form-control" placeholder="Search..">--}}
    {{--<button class="appsLand-btn appsLand-btn-gradient search-btn"><span><i--}}
    {{--class="fa fa-search"></i></span></button>--}}
    {{--<div class="clearfix"></div>--}}
    {{--</div>--}}
    {{--</form>--}}
    <div class="aside-box">
        <h4>Categorias</h4>
        <ul class="list-unstyled categories">
            {{--<li><a href="{{$category['short_url']}}">Todas <span class="main-color-text">{{$category['n_post']}}</span></a></li>--}}
        @foreach($Page->auxiliar['blog_categories'] as $category)
                <li><a href="{{$category['short_url']}}">{{$category['title']}} <span class="main-color-text">{{$category['n_post']}}</span></a></li>
            @endforeach
            {{--<li><a href="#">Design <span class="main-color-text">19</span></a></li>--}}
            {{--<li><a href="#">UI & UX Design <span class="main-color-text">35</span></a></li>--}}
            {{--<li><a href="#">Themeforst <span class="main-color-text">75</span></a></li>--}}
        </ul>
    </div>
    <div class="aside-box">
        <h4>Postagens Populares</h4>
        <ul class="list-unstyled popular-posts">
            @foreach($Page->auxiliar['popular_posts'] as $post)
                <li>
                    <div class="post-image">
                        <img alt="" src="{{$post['image']}}" class="img-responsive">
                    </div>
                    <div class="post-data">
                        <h5>
                            <a href="{{$post['short_url']}}">
                                {{$post['title']}}
                            </a>
                        </h5>
                        <p>{{$post['published_at']->format('d F')}}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    {{--<div class="aside-box">--}}
    {{--<h4>Tags</h4>--}}
    {{--<ul class="entry-tags list-unstyled list-inline">--}}
    {{--<li><a href="#" rel="tag">Android</a></li>--}}
    {{--<li><a href="#" rel="tag">Lifestyle</a></li>--}}
    {{--<li><a href="#" rel="tag">IOS</a></li>--}}
    {{--<li><a href="#" rel="tag">Mobile</a></li>--}}
    {{--<li><a href="#" rel="tag">App</a></li>--}}
    {{--</ul>--}}
    {{--</div>--}}
</aside>