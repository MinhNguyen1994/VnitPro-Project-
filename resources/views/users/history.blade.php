@extends('users.layoutUser')

@section('contend-header')
<h1>
    User
    <small>History</small>
</h1>           
</section>  
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
	<div class="box box-danger">
		<div class="box box-header">
			<h3 class="box-title">Detail Bills</h3>
		</div>
		<div class="box-body">
			@foreach($data as $value)				
				<div class="col-md-6 col-xs-12">
					ok
				</div>
			@endforeach
		</div>
	</div>
@endsection