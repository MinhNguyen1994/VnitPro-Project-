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
			<form role="form" method="POST">
				<div class="row">
					<div class="form-group col-xs-7 col-md-6">
						<label>Location</label>
						<select class="form-control select2" style="width: 70%;" name="location">
							@if($data['action'] == 'Import')
								@foreach($data['dataWareHouse'] as $value)
								<option value="{{ $value->id }}">{{ $value->name_warehouse }} ( {{ $value->address }} )</option>
								@endforeach
							@endif
						</select>
					</div>

					<div class="form-group col-md-6 col-xs-5">
						<label>Employee's Name</label>
						<div style="color: red">Mr. {{ Auth::user()->name }}</div>
						<input type="hidden" name="employee" value="{{ Auth::user()->id }}">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-12 col-md-6">
						<label>Name</label>
						<input type="text" name="name" class="form-control" style="width: 70%" placeholder="Enter Bill's Name">
					</div>
					<div class="form-group col-md-6 col-xs-12">
						<label>Code</label>
						<input type="text" name="code" class="form-control" style="width: 70%" placeholder="Ender Code">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-12 col-md-6">
						<label>Product</label>
						<select class="form-control select2" style="width: 70%;" name="location">
							@if($data['action'] == 'Import')							
								@foreach($data['dataProduct'] as $value)
									@foreach($data['dataUnit'] as $v)
									<option value="{{ $value->id }}">
										@if($value->id_unit == $v->id)
										{{ $value->name_product }} ( đơn vị: {{ $v->name }})
										@endif
									</option>
									@endforeach
								@endforeach
							@endif
						</select>
					</div>
					<div class="form-group col-md-6 col-xs-12">
						<label>Code</label>
						<input type="text" name="code" class="form-control" style="width: 70%" placeholder="Ender Code">
					</div>
				</div>
			</form>			
		</div>
	</div>
@endsection
