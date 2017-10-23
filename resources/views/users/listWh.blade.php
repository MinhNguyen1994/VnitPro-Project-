@extends('users.layoutUser')

@section('contend-header')
<h1>
    User
    <small>History</small>
</h1>           
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
	<div class="box box-info">
		<div class="box-header with-border">
		    <h3 class="box-title">List: Products Per Warehouse </h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-10" style="margin-bottom: 20px">
					<label>Warehouse</label>
					<select class="form-control select2" style="width: 100%" id="warehouse">
						<option value="0" selected disable> -- Choose A WareHouse -- </option>
						@foreach($data['warehouse'] as $value)
							<option value="{{ $value->id }}">{{ $value->name_warehouse }} ( {{ $value->address }} )</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-12">
					<label>Product</label>
					<table class="table table-bordered" >
						<thead>          
							<tr>
							 	<th>STT</th>            
							  	<th>Name Product</th>            
							  	<th>Quanlity</th>
							  	<th>Unit</th>
								<th>Created Time</th>
							  	<th>Updated Time</th>							             
							</tr>
						</thead>
						<tbody id="tableProduct">
							
						</tbody>
					</table>
				</div>
			</div>
		</div> 
	</div>
@endsection

@section('javascript')
<script type="text/javascript">
$('#warehouse').on('change',function(){
	var warehouse_id = $(this).val();
	$.ajax({
		url:'{{ route('user.ajax.get.product') }}',
		type:'GET',
		dataType: 'json',
		data:{'id': warehouse_id},
		success: function(data){
			console.log(data);
			$('#tableProduct').empty();
			$.each(data, function(index,dataObj){
				var index = index + 1;				
				$('#tableProduct').append('<tr><td>'+index+'</td><td>'+dataObj.name_product+'</td><td>'+dataObj.quanlity+'</td><td>'+dataObj.name+'</td><td>'+dataObj.created_at+'</td><td>'+dataObj.updated_at+'</td></tr>')
			});
		}

	});
});
</script>
@endsection