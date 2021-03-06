@extends('layouts.master')

@push('title')
<title>Projects - List</title>
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

    <div class="mai-wrapper" id="project">

    	<!-- START OF NAVBAR -->
    	@include('partials.navbar')
    	<!-- ENF OF NAVBAR -->

        <div class="main-content container">
            <div class="col-sm-12">
                <div class="panel panel-default panel-table">
                    <!-- START OF PANEL HEADER -->
                    PROJECT TABLE
                    <project-list></project-list>
                    <!-- END OF PANEL HEADER -->
                </div>
            </div>
        </div>

        <flash></flash>

    </div>
@endsection

@push('additional_js')
<script src="{{ asset('js/project/project.js') }}"></script>
@endpush