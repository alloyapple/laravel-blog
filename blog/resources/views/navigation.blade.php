
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
					<a class="navbar-brand" href="{{ route('home') }}">Blog</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Link</a></li>
						<li><a href="#">Link</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					@if ($user = Auth::user())
						<li><a href="/user">@ {{ $user->name }}</a></li>
						<li><a href="/logout">Logout</a></li>
					@else
						<li><a href="/login">Login</a></li>
						<li><a href="/register">Register</a></li>
					@endif
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav>