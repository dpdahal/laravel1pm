@extends('frontend.master.master')
@section('content')

<div class="fashion_technology_area">

        <div class="fashion">
            <div class="single_post_content">
                <h2><span>{{$categorySingleData->title}}</span></h2>
                <ul class="business_catgnav wow fadeInDown">
                    <li>
                        <figure class="bsbig_fig"><a href="pages/single_page.html"
                                                     class="featured_img"> <img alt=""
                                                                                src="images/featured_img2.jpg">
                                <span class="overlay"></span> </a>
                            <figcaption><a href="pages/single_page.html">Proin rhoncus consequat
                                    nisl eu ornare mauris</a></figcaption>
                            <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus,
                                egestas imperdiet nulla nisl quis mauris. Suspendisse a phare...</p>
                        </figure>
                    </li>
                </ul>
                <ul class="spost_nav">
                    @foreach($categorySingleData->getNewsByCategoryModel as $news)
                        <li>
                            <div class="media wow fadeInDown">
                                <a href="{{route('news-details').'/'.$news->slug}}"  class="media-left"> <img alt="" src="{{url('uploads/news/thumbnail/'.$news->thumbnail)}}">
                                </a>
                                <div class="media-body"><a href="{{route('news-details').'/'.$news->slug}}"
                                                           class="catg_title"> {{$news->title}}</a></div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>


</div>

@endsection
