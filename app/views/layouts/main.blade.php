<!DOCTYPE html>
<html lang="en">
 	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    	<title>Authentication App With Laravel 4</title>

    	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    	{{ HTML::style('css/main.css')}}
     <!-- Latest compiled and minified JavaScript -->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>     
     
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  	</head>

  	<body>

	  	<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
					<ul class="nav nav-pills">  
						@if(!Auth::check())
							<li>{{ HTML::link('register', 'Register') }}</li>   
							<li>{{ HTML::link('login', 'Login') }}</li>   
						@else
                                                        <li>{{ HTML::link('sticky', 'Add') }}</li>  
							<li>{{ HTML::link('logout', 'logout') }}</li>
						@endif
					</ul>  
		    
		  	</div><!-- /.container-fluid -->
</nav>	            

	    <div class="container">
	    	@if(Session::has('message'))
				<p class="alert">{{ Session::get('message') }}</p>
			@endif

	    	{{ $content }}
	    </div>

  	</body>
</html> 