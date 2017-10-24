@extends('users.layoutUser')

@section('contend-header')
<h1>
    User
    <small>Action</small>
</h1>           
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">Action: Export</h3>
		</div>
		<div class="box box-body">
			<form role="form" method="POST" id="formData" action="{{ route('user.import.product.post') }}">
			{{ csrf_field() }}				
				<div class="row">
					<div class="form-group col-xs-7 col-md-6">
						<label>Location</label>						
						<select class="form-control select2" style="width: 70%;" name="location" id="location">	
								<option value="0" disabled selected> -  Pick One Location  - </option>						
							@foreach($data['warehouse'] as $value)
								<option value="{{ $value->id }}">{{ $value->name_warehouse }} ( {{ $value->address }} )</option>
							@endforeach							
						</select>
						<input type="hidden" name="action" value="1">						
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
									<option value="0">Must Choose WareHouse</option>							
								</select>
							</div>
							<div class="col-xs-3 col-md-3" id="quanlityDiv"></div>
							<div class="col-xs-3 col-md-3">								
								<span class="btn btn-info add" id="add" style="display: none">Add to Bill</span>
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
					<input type="submit" class="btn btn-success" name="submit" value="Export to Out" id="ExportTO">
					<div id="btnLoading" style="display: none">
						<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>					
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
function objectifyForm(formArray) {
  	var returnArray = {};
  	for (var i = 0; i < formArray.length; i++){
    	returnArray[formArray[i]['name']] = formArray[i]['value'];
  	}
  	return returnArray;
}	
$(document).ready(function(){
	$('#location').on('change',function(){
		var id_location = $('#location').val();
		$('#tableProduct').empty();
		$("#add").css('display','none');
		$('#quanlityDiv').empty();		
		$.ajax({
			url: '{{route('get.product.res')}}',
			dataType:'json',
			type:'GET',
			data:{'id':id_location },
			success: function(data){
				$('#product').empty();				
				$('#product').append('<option value="0" disabled selected>Choose A Product</option>');				
				$.each(data, function(create,dataObj){
			        $('#product').append('<option value="'+dataObj.product_id+'">'+dataObj.name_product+'( '+dataObj.name+' )</option>');
			    });				
			},error:function(){
				alert('bleeee');
			}			
		});
	});
	$('#product').on('change',function(){		
		var product_id = $(this).val();
		var location_id = $('#location').val();	
		$.ajax({
			url: '{{route('get.product.quanlity')}}',
			type: 'GET',
			data: {'product_id':product_id,'location_id':location_id},
			dataType:'json',
			success: function(data){
				$('#quanlityDiv').empty();
				$('#quanlityDiv').append('<input type="number" class="form-control" value="'+data.quanlity+'" min="1" max="'+data.quanlity+'" id="quanlity"><div><strong id="error-quanlity" style="color: red"></strong></div>');
			}, error: function(){
				alert('Error data');
			}			
		});
		$("#add").css('display','block');
	});	
	$('#add').on('click',function(){
		var arr = [];
		var quanlity = $('#quanlity').val();			
		var product_id = $('#product').val();
		var location_id = $('#location').val();
		$('#errorQuanlity').empty();			
		$.ajax({
			url: '{{ route('get.product.export') }}',
			type: 'GET',
			dataType: 'json',
			data: { 'product_id': product_id,'location_id':location_id },
			success : function(data){								
				$('#dataProduct tbody tr').each(function(){					
					var product_id = $(this).find('td:eq(0)').text();					
					if(product_id == data.product_id){
						arr.push(1);
						return;																
					}
				});								
				if(arr.length == 0){
					if(quanlity > data.quanlity || quanlity <= 0){						
						$('#error-quanlity').append('Must be between 1(min) and ' +data.quanlity+'(max)');
					}else{						
						$('#tableProduct').append('<tr id="'+data.product_id+'"><td>'+product_id+'</td><td>'+data.name_product+'</td><td>'+quanlity+'</td><td>'+data.name+'</td><td><span class="fa fa-trash-o" style="color:red;cursor: pointer;" onclick="deleteRow(this)"></span></td>');
					}
					
				}else{					
					$('#dataProduct tbody tr').each(function(){					
						var product_id = $(this).find('td:eq(0)').text();
						var product_quanlity = $(this).find('td:eq(2)').text();
						var sum = 0; 					
						if(product_id == data.product_id){							
							sum = parseInt(product_quanlity) + parseInt(quanlity);
							if(sum > data.quanlity || sum < 1){
								$('#error-quanlity').append('Must be between 1(min) and ' +data.quanlity+'(max)');
							} else{
								$(this).find('td:eq(2)').text(sum);	
							}
							return;															
						}						
					});
				}		
			}			
		});

				
	});
	$('#formData').on('submit',function(e){
		e.preventDefault();
		$('#ExportTO').hide();
		$('#btnLoading').show();
		var form = $('#formData').serializeArray();
		var detail = objectifyForm(form);		
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
			url: '{{ route('user.import.product.post') }}',
			type: 'POST',
			data:{'detail':detail,'dataArr':dataArr},
			success: function(data){				
				window.location.replace('{{ route('user.history')}}');						
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
