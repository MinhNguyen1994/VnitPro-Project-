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
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<div class="box box-info">
	<div class="box-header">
		<div class="box-title">Manage Quanlity Of Product</div>		
	</div>
	<div class="box box-body">
		<div class="row">
			<div class="col-xs-8 col-md-6">
				<label>Ware House</label>
				<select class="form-control select2" name="warehouse">
					<option value="0" selected disabled>Choose A WareHouse</option>
					@foreach($data['dataWareHouse'] as $value)
					<option value="{{ $value->id }}">{{ $value->name_warehouse }} ( {{ $value->address}} )</option>
					@endforeach
				</select>
			</div>
		</div>		
	</div>
	<div class=" box box-body box-danger">
		<label class="box-header">Product</label>
		<div class="row">
			<div class="col-xs-12">
				<table id="example1" class="table table-bordered table-striped">
		          	<thead>          
		          		<tr>
				            <th>Name</th>            
				            <th>Quanlity</th>            
				            <th>Unit</th>			            
				            <th>Updated Time</th>			                        
		          		</tr>
		          	</thead>
		          	<tbody>
		          	
		          	</tbody>      
		        </table>
			</div>			
		</div>
	</div>
</div>	
@endsection

@section('javascript')
<!-- DataTables -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection