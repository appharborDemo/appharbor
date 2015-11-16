<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-pjax-version" content="v123">
	<title>@yield('titlePage') </title>
    
    
    <link rel="shortcut icon" href="{!! asset('resources/assets/img/ico-tab.png') !!}">

    {!! Html::style('resources/assets/css/bootstrap.min.css') !!}
    {!! Html::style('resources/assets/css/style.css') !!}
    {!! Html::style('resources/assets/css/main.css') !!}

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	@include('layout.partials.navbar')

	<div class="container-fluid" id="pjax-container">
	    <table class="table main-area">
	        <tbody>
	          <tr>
	            
	            <td class="col-lg-10 col-md-10 col-sm-8">
	                <div class="row scroll-area">
	                    {{-- CENTER PANEL --}}
	                    <div class="col-md-8" style="width:100%;">
	                        {{-- <div class="panel panel-default"> --}}
	                            {{-- code here --}}
								@yield('content')
	                        {{-- </div> --}}
	                    </div>
	                    
	                </div>
	            </td>
	          </tr>
	        </tbody>
	    </table>
	</div>
	
	@include('layout.partials.navmodals')

	@yield('footer');
	<!-- Scripts -->
	{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
    {!! Html::script('resources/assets/js/jquery-1.11.1.min.js') !!}
    {!! Html::script('resources/assets/js/jquery.pjax.js') !!}
    {!! Html::script('resources/assets/js/bootstrap.min.js') !!}
    {!! Html::script('resources/assets/js/main.js') !!}
</body>
</html>
