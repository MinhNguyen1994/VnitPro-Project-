@extends('layouts.layoutAdmin')

@section('contend-header')
<h1>
    Products
    <small>{{ $data['dataQuanlity']['titleSmall']}}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('product') }}"><i class="fa fa-dashboard"></i> Product</a></li>       
    <li><i class="fa fa-dashboard"></i>{{ $data['dataQuanlity']['titleMini'] }}</li>    
</ol>            
</section>  
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
<div class="box box-info">
	<div class="box-header">
		<div class="box-title">Manage Quanlity Of Product</div>		
	</div>
	<div class=" box box-body">
		<div class="row">
			<div class="col-xs-6 col-md-4">
				<label>Ware House</label>
				<select class="form-control select2">
					<option value=""></option>
				</select>
			</div>
		</div>
		<div class="row">
			
		</div>
	</div>
</div>	
@endsection