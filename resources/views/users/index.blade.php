@extends('users.layoutUser')

@section('contend-header')
<h1>
    User
    <small>Action</small>
</h1>           
</section>  
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">Action: Inport and Export</h3>
		</div>
		<div class="box box-body">
			<div class="row">
				<div class="form-group col-xs-7 col-md-6">
					<label>Location</label>
					<select class="form-control select2" style="width: 60%;" name="location">
						
					</select>
				</div>

				<div class="form-group col-md-6 col-xs-5">
					<label>Employee's Name</label>
					<div style="color: red">Mr. {{ Auth::user()->name }}</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-12 col-md-6">
					<label>Name</label>
					<input type="text" name="name" class="form-control" style="width: 60%" placeholder="Enter Bill's Name">
				</div>
				<div class="form-group col-md-6 col-xs-12">
					<label>Code</label>
					<input type="text" name="code" class="form-control" style="width: 60%" placeholder="Ender Code">
				</div>
			</div>
			
		</div>
	</div>
@endsection
