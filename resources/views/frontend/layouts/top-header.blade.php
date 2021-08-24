@section('top-header')
    <header id="header">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_top">
                    <div class="header_top_left">
                        <ul class="top_nav">
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                    <div class="header_top_right">
                        <p> {{date('D-m-Y')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_bottom">
                    <div class="logo_area"><a href="index.html" class="logo"><img src="images/logo.jpg" alt=""></a>
                    </div>
                    <div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>
                </div>
            </div>
        </div>
    </header>

@endsection
