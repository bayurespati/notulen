@extends('layouts.master')

@push('title')
<title>Items (Finishings) - List</title>
@endpush

@push('additional_css')
<link href="{{ asset('css/animation.css') }}" rel="stylesheet">
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

    <div class="mai-wrapper">

    	<!-- START OF NAVBAR -->
    	@include('partials.navbar')
    	<!-- ENF OF NAVBAR -->

        <div id="finishing" class="main-content container">
            <finishing-list></finishing-list>
        </div>

    </div>
@endsection

@push('additional_js')
<script src="{{ asset('js/master/finishing.js') }}"></script>
@endpush
