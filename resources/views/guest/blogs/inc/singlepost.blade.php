<div class="col-sm-6">
    <div>
        <article class="normal-post wow fadeInUp" data-wow-duration="1s"
                 data-wow-delay="0.25s">
            <figure class="entry-header">
                <div class="post-image">
                    <img alt="" src="{{$post['image']}}" class="img-responsive">
                </div>
            </figure>
            <div class="entry-content">
                <div class="entry-post-info">
                    <h4><a href="{{$post['short_url']}}">{{$post['title']}}</a></h4>
                    <p class="posted-on"><span>{{$post['published_at']->day}}</span> {{$post['published_at']->format('M')}}</p>
                </div>
                <div class="entry-expert">
                    <p>
                        {{$post['short_content']}}
                    </p>
                    <div class="post-readMore">
                        <a href="{{$post['short_url']}}" class="pull-left read-more-link">LER MAIS <i
                                    class="fa fa-long-arrow-right"></i></a>
                        <span class="pull-right"><a href="{{$post['short_url']}}">{{$post['n_comments_text']}}</a></span>
                    </div>
                </div>
            </div>
            {{--<div class="entry-footer">--}}
            {{--<ul class="entry-tags list-unstyled list-inline">--}}
            {{--@foreach($blog['tags'] as $tag)--}}
            {{--<li><a href="#">{{$tag}}</a></li>--}}
            {{--@endforeach--}}
            {{--</ul>--}}
            {{--</div>--}}
        </article>
    </div>
</div>