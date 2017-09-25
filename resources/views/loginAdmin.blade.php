<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- META -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/loginAdmin.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<style type="text/css">
		body{
			background: #343C5C;
			font-family: arial;
			height: 100%;
			width: 100%;					
		}
	</style>

</head>
<body>
	<div class="login">
		<h1 id="loginTitle">WELCOME</h1>
		<form method="POST" action="{{ route('login') }}" name="login" class="form-horizontal">
			{{ csrf_field() }}
			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<label for="email" class="control-label" style="color: white">E-Mail Address</label>
				<input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
				@if ($errors->has('email'))
				    <span class="help-block">
				        <strong>{{ $errors->first('email') }}</strong>
				    </span>
				@endif
			</div>
			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label" style="color: white">Password</label>
				<input type="password" name="password"  class="form-control" required>
			    @if ($errors->has('password'))
			        <span class="help-block">
			            <strong>{{ $errors->first('password') }}</strong>
			        </span>
			    @endif
			</div>
			<div class="form-group">
			    <div class="col-md-6 col-md-offset-4">
			        <div class="checkbox">
			            <label>
			                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
			            </label>
			        </div>
			    </div>
			</div>	

			<div class="form-group" style="text-align: center;">			   
		        <button type="submit" class="btn btn-info btLogin">
		            Login
		        </button>
		        <a class="btn btn-link" href="{{ route('password.request') }}">
		            Forgot Your Password?
		        </a>			    
			</div>			
		</form>
	</div>	
</body>
</html>