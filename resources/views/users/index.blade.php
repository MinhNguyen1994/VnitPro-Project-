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
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">Action: Inport and Export</h3>
		</div>
		<div class="box box-body">
			<form role="form" method="POST" id="formData" action="{{ route('user.import.product.post') }}">
			{{ csrf_field() }}				
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
						<div class="row">
							<div class="col-xs-6 col-md-6">
								<select class="form-control select2" name="product" id="product">							
									@if($data['action'] == 'Import')							
										@foreach($data['dataProduct'] as $value)
											<option value="{{ $value->id }}">									
												{{ $value->name_product }} ( đơn vị: {{ $value->unit->name }} )									
											</option>
										@endforeach
									@endif
								</select>
							</div>
							<div class="col-xs-3 col-md-3">
								<input type="number" name="quanlity" class="form-control" placeholder="Quanlity" id="quanlity">
								<div class="" id="errorQuanlity" style="color: red"></div>
							</div>
							<div class="col-xs-3 col-md-3">
								<span class="btn btn-info add" id="add">Add to Bill</span>
							</div>
						</div>										
					</div>
				</div>
				<div class="form-group">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">
								Detail Product
							</h3>
						</div>
						<div class="box-body">
							<table class="table table-bordered" id="dataProduct">
								<thead>
									<tr>
										<th>#</th>
										<th>Name Product</th>
										<th>Quanlity</th>
										<th>Unit</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="tableProduct"></tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success" name="submit" id="ImportWH" value="Import to WareHouse">
				</div>
			</form>			
		</div>
	</div>
@endsection

@section('javascript')
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){	
	$('#add').on('click',function(){		
		var quanlity = $('#quanlity').val();
		var product = $('#product').val();		
		if(quanlity > 0){
			$('#errorQuanlity').empty();
			$.ajax({
			url: '{{ route('get.product') }}',
			type: 'GET',
			dataType: 'json',
			data: { 'product': product },
			success : function(data){			
				$('#tableProduct').append('<tr id="remove"><td>'+data.id+'</td><td>'+data.name_product+'</td><td>'+quanlity+'</td><td>'+data.unit.name+'</td><td><span class="fa fa-trash-o" style="color:red;cursor: pointer;" onclick="deleteRow(this)"></span></td>');		
			}			
		});			
		}else{
			$('#errorQuanlity').empty();
			$('#errorQuanlity').append('<strong>Must be greater than 0</strong>');
		}		
	});
	$('#formData').on('submit',function(e){
		e.preventDefault();
		var table = $('#dataProduct tbody');
		var dataArr = [];
		var dataObj = {};
		table.find('tr').each(function (i, el) {
			var $tds = $(this).find('td');
            id_product = $tds.eq(0).text();
            quanlity = $tds.eq(2).text();
            dataObj = ({id_product:id_product,quanlity:quanlity});           
            dataArr.push(dataObj);                                                 	                              
		});

		$.ajax({
			url: '/importPost',
			type: 'POST',
			data: $('form').serialize() {'dataArr':dataArr},
			success: function(){
				alert('ok');							
			},
			error: function(xhr, textStatus, error){
		      	console.log(xhr.statusText);
		     	console.log(textStatus);
		      	console.log(error);
		  	}	
		});
					  							
	});	
});
function deleteRow(e){	
	$(e).parents('tr').remove();		
}
</script>
@endsection
