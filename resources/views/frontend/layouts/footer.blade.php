@section('footer')
    <footer id="footer">
        <div class="footer_top">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInLeftBig">
                        <h2>Flickr Images</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInDown">
                        <h2>Tag</h2>
                        <ul class="tag_nav">
                            <li><a href="#">Games</a></li>
                            <li><a href="#">Sports</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Life &amp; Style</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Photo</a></li>
                            <li><a href="#">Slider</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="footer_widget wow fadeInRightBig">
                        <h2>Contact</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <address>
                            Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <p class="copyright">Copyright &copy; {{date('Y')}} <a href="{{route('index')}}">Laravel1pm</a></p>
            <p class="developer">Developed By Laravel1pm</p>
        </div>
    </footer>

    </div>
    <script src="{{url('frontend-ui/assets/js/jquery.min.js')}}"></script>
    <script src="{{url('frontend-ui/assets/js/wow.min.js')}}"></script>
    <script src="{{url('frontend-ui/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('frontend-ui/assets/js/slick.min.js')}}"></script>
    <script src="{{url('frontend-ui/assets/js/jquery.li-scroller.1.0.js')}}"></script>
    <script src="{{url('frontend-ui/assets/js/jquery.newsTicker.min.js')}}"></script>
    <script src="{{url('frontend-ui/assets/js/jquery.fancybox.pack.js')}}"></script>
    <script src="{{url('frontend-ui/assets/js/custom.js')}}"></script>
    </body>
    </html>


@endsection
