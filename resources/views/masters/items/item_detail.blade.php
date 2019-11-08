@extends('layouts.master')

@push('title')
<title>Item - Individual</title>
@endpush

@push('additional_css')
<link href="{{ asset('css/animation.css') }}" rel="stylesheet">
<link href="{{ asset('css/gallery.css') }}" rel="stylesheet">
@endpush

@section('content')
	<!-- START OF TOPNAV -->
	<nav class="navbar navbar-full navbar-inverse navbar-fixed-top mai-top-header">
    	<div class="container">

        	<a href="/home" class="navbar-brand">NOTULEN APP</a>


        	<!--=========================================================================================
            	L E F T     M E N U
            	=========================================================================================-->
        	<ul class="nav navbar-nav mai-top-nav">
            	
        	</ul>


        	<!--=========================================================================================
            	I C O N     M E N U
            	=========================================================================================-->
        	<ul class="navbar-nav float-lg-right mai-icons-nav hidden-md-up">
            	<li class="nav-item">
                	<a href="#" class="nav-link">Notulen App</a>
            	</li>
        	</ul>


        	<!--=========================================================================================
            	U S E R     M E N U
            	=========================================================================================-->
			@include('partials.user_menu')
    	</div>	
	</nav>
	<!-- END OF TOPNAV -->

    <div class="mai-wrapper" id="item-detail">

    	<!-- START OF NAVBAR -->
    	@include('partials.navbar')
    	<!-- ENF OF NAVBAR -->

        <div class="main-content container">
            <div class="col-sm-8 offset-2">
                <div class="panel panel-default panel-table">
                    <!-- START OF PANEL HEADER -->
                    <item-view></item-view>
                    <!-- END OF PANEL HEADER -->
                </div>
            </div>

            <div class="col-sm-12">
                <div class="gallery-container">
                    <div class="item">
                        <div class="photo">
                            <div class="img"><img src="{{ asset('img/test_1.jpg') }}" alt="Gallery Image">
                                <div class="over">
                                    <div class="info-wrapper">
                                        <div class="info">
                                            <div class="title">City Silhouettes</div>
                                            <div class="date">Jan 13 2017</div>
                                            <div class="description">Vestibulum lectus nulla, maximus in eros non, tristique consectetur.</div>
                                            <div class="func"><a href="#"><i class="icon s7-link"></i></a><a href="{{ asset('img/test_1.jpg') }}" class="image-zoom"><i class="icon s7-search"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <div class="img"><img src="{{ asset('img/test_2.png') }}" alt="Gallery Image">
                                <div class="over">
                                    <div class="info-wrapper">
                                        <div class="info">
                                            <div class="title">Hills Peace</div>
                                            <div class="date">Jan 25 2017</div>
                                            <div class="description">Vestibulum lectus nulla, maximus in eros non, tristique consectetur.</div>
                                            <div class="func"><a href="#"><i class="icon s7-link"></i></a><a href="{{ asset('img/test_2.png') }}" class="image-zoom"><i class="icon s7-search"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <div class="img"><img src="{{ asset('img/test_1.jpg') }}" alt="Gallery Image">
                                <div class="over">
                                    <div class="info-wrapper">
                                        <div class="info">
                                            <div class="title">Hills Peace</div>
                                            <div class="date">Jan 25 2017</div>
                                            <div class="description">Vestibulum lectus nulla, maximus in eros non, tristique consectetur.</div>
                                            <div class="func"><a href="#"><i class="icon s7-link"></i></a><a href="{{ asset('img/test_1.jpg') }}" class="image-zoom"><i class="icon s7-search"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <div class="img"><img src="{{ asset('img/test_1.jpg') }}" alt="Gallery Image">
                                <div class="over">
                                    <div class="info-wrapper">
                                        <div class="info">
                                            <div class="title">Hills Peace</div>
                                            <div class="date">Jan 25 2017</div>
                                            <div class="description">Vestibulum lectus nulla, maximus in eros non, tristique consectetur.</div>
                                            <div class="func"><a href="#"><i class="icon s7-link"></i></a><a href="{{ asset('img/test_1.jpg') }}" class="image-zoom"><i class="icon s7-search"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <div class="img"><img src="{{ asset('img/test_2.png') }}" alt="Gallery Image">
                                <div class="over">
                                    <div class="info-wrapper">
                                        <div class="info">
                                            <div class="title">Hills Peace</div>
                                            <div class="date">Jan 25 2017</div>
                                            <div class="description">Vestibulum lectus nulla, maximus in eros non, tristique consectetur.</div>
                                            <div class="func"><a href="#"><i class="icon s7-link"></i></a><a href="{{ asset('img/test_2.png') }}" class="image-zoom"><i class="icon s7-search"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <div class="img"><img src="{{ asset('img/test_2.png') }}" alt="Gallery Image">
                                <div class="over">
                                    <div class="info-wrapper">
                                        <div class="info">
                                            <div class="title">Hills Peace</div>
                                            <div class="date">Jan 25 2017</div>
                                            <div class="description">Vestibulum lectus nulla, maximus in eros non, tristique consectetur.</div>
                                            <div class="func"><a href="#"><i class="icon s7-link"></i></a><a href="{{ asset('img/test_2.png') }}" class="image-zoom"><i class="icon s7-search"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <div class="img"><img src="{{ asset('img/test_1.jpg') }}" alt="Gallery Image">
                                <div class="over">
                                    <div class="info-wrapper">
                                        <div class="info">
                                            <div class="title">Hills Peace</div>
                                            <div class="date">Jan 25 2017</div>
                                            <div class="description">Vestibulum lectus nulla, maximus in eros non, tristique consectetur.</div>
                                            <div class="func"><a href="#"><i class="icon s7-link"></i></a><a href="{{ asset('img/test_1.jpg') }}" class="image-zoom"><i class="icon s7-search"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <div class="img"><img src="{{ asset('img/test_1.jpg') }}" alt="Gallery Image">
                                <div class="over">
                                    <div class="info-wrapper">
                                        <div class="info">
                                            <div class="title">Hills Peace</div>
                                            <div class="date">Jan 25 2017</div>
                                            <div class="description">Vestibulum lectus nulla, maximus in eros non, tristique consectetur.</div>
                                            <div class="func"><a href="#"><i class="icon s7-link"></i></a><a href="{{ asset('img/test_1.jpg') }}" class="image-zoom"><i class="icon s7-search"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <div class="img"><img src="{{ asset('img/test_1.jpg') }}" alt="Gallery Image">
                                <div class="over">
                                    <div class="info-wrapper">
                                        <div class="info">
                                            <div class="title">Hills Peace</div>
                                            <div class="date">Jan 25 2017</div>
                                            <div class="description">Vestibulum lectus nulla, maximus in eros non, tristique consectetur.</div>
                                            <div class="func"><a href="#"><i class="icon s7-link"></i></a><a href="{{ asset('img/test_1.jpg') }}" class="image-zoom"><i class="icon s7-search"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <div class="img"><img src="{{ asset('img/test_2.png') }}" alt="Gallery Image">
                                <div class="over">
                                    <div class="info-wrapper">
                                        <div class="info">
                                            <div class="title">Hills Peace</div>
                                            <div class="date">Jan 25 2017</div>
                                            <div class="description">Vestibulum lectus nulla, maximus in eros non, tristique consectetur.</div>
                                            <div class="func"><a href="#"><i class="icon s7-link"></i></a><a href="{{ asset('img/test_2.png') }}" class="image-zoom"><i class="icon s7-search"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <div class="img"><img src="{{ asset('img/test_2.png') }}" alt="Gallery Image">
                                <div class="over">
                                    <div class="info-wrapper">
                                        <div class="info">
                                            <div class="title">Hills Peace</div>
                                            <div class="date">Jan 25 2017</div>
                                            <div class="description">Vestibulum lectus nulla, maximus in eros non, tristique consectetur.</div>
                                            <div class="func"><a href="#"><i class="icon s7-link"></i></a><a href="{{ asset('img/test_2.png') }}" class="image-zoom"><i class="icon s7-search"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <div class="img"><img src="{{ asset('img/test_1.jpg') }}" alt="Gallery Image">
                                <div class="over">
                                    <div class="info-wrapper">
                                        <div class="info">
                                            <div class="title">Hills Peace</div>
                                            <div class="date">Jan 25 2017</div>
                                            <div class="description">Vestibulum lectus nulla, maximus in eros non, tristique consectetur.</div>
                                            <div class="func"><a href="#"><i class="icon s7-link"></i></a><a href="{{ asset('img/test_2.png') }}" class="image-zoom"><i class="icon s7-search"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('additional_js')
<script src="{{ asset('js/master/itemDetail.js') }}"></script>
<!-- <script src="{{ asset('js/gallery.js') }}"></script>
<script type="text/javascript">
      $(window).on('load',function(){
        App.pageGallery();
      });
    </script> -->
@endpush