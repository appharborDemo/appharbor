<nav class="navbar">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
        <img alt="image" src="/resources/assets/img/logo.svg" height="25px" style="float:left;margin: 21px 25px 0px 20px;"/>
	</div>

	<div class="collapse navbar-collapse" id="navbar" style="padding:14px 0px 10px 0px;">
		@if (Auth::user())
			<ul class="nav navbar-nav">
				<li><a href="{{ url('classes') }}" class="btn nav-left-btn">Classes</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li><a href="{{ url('messages') }}" class="btn nav-left-btn">Chat @include('messenger.unread-count')</a></li>
			</ul>
		@endif
		<ul class="nav navbar-nav navbar-right" style="height:40px;">
			@if(auth()->guest())
				@if(!Request::is('auth/login'))
					<li><a href="{{ url('/auth/login') }}" class="Glyph Glyph-avatar ">Đăng nhập</a></li>
				@endif
				@if(!Request::is('auth/register'))
					<li>
					<a href="{{ url('/auth/register') }}" class="button-signup1" style="text-decoration:none; float:right;margin-right:20px;">
                		Sign up
            		</a>
            		</li>
				@endif
			@else
				<li>
					<a class="btn btn-lg" data-toggle="modal" data-target="#helpModal" aria-haspopup="true">
					    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>								
					</a>	
				</li>
				<li>
					<a class="btn btn-lg" data-toggle="modal" data-target="#shareModal" aria-haspopup="true">
					    <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>								
					</a>	
				</li>
				<li class="dropdown">
					<a class="btn btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					    <span class="caret"></span>
				  	</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Cài đặt</a></li>
						<li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Thông báo</a></li>
						@if (Auth::user()->hasRole('teacher'))
							<li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Chat</a></li>
							<li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> Widgets</a></li>
							<li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> In</a></li>
						@endif
						<li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Thoát</a></li>
					</ul>
				</li>
			@endif
		</ul>
	</div>

</nav>