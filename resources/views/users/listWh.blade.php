@extends('users.layoutUser')

@section('contend-header')
<h1>
    User
    <small>View List</small>
</h1>           
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
    #popupForm{
        position: fixed;        
        top: 30%;
        left: 35%;        
        width: 400px;
        height: auto;         
        display: none;                
    }
    #bodyPopup{
    	background: #e6f2ae;
    	border: 3px solid gray;
        border-radius:7px;
        text-align: center;
    }
    #divLocation{    	
    	margin: 10px 0px;    	
    }
    #line{
    	margin: 10px 0px;
    }
    #alertSave{
    	margin: 10px 0px;
    	color: red;
    }

</style>
@endsection

@section('content')
<div class="box box-info">
	<div class="box-header with-border">
	    <h3 class="box-title">List: Products Per Warehouse </h3>		    
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 20px">
				<label>Warehouse</label>
				<select class="form-control select2" style="width: 100%" id="warehouse">						
					@foreach($data['warehouse'] as $value)
						<option value="{{ $value->id }}">{{ $value->name_warehouse }} ( {{ $value->address }} )</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-7 col-sm-6 col-xs-6">				
				<div style="float: right;">
					<label>Search</label>
					<div style="width: 150px;">
						<input type="search" name="searchName" class="form-control" style="width: 100%" placeholder="Search..."  onkeyup="searchName(this)">
					</div>
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="col-md-12">
				<label>Product</label>
				<table class="table table-bordered">
					<thead>          
						<tr>
						 	<th>STT</th>            
						  	<th>Name Product</th>            
						  	<th>Quanlity</th>
						  	<th>Unit</th>
							<th>Created Time</th>
						  	<th>Updated Time</th>
						  	<th>Location</th>							             
						</tr>
					</thead>
					<tbody id="tableProduct">
						
					</tbody>
				</table>
			</div>				
		</div>
	</div> 
</div>
<div id="popupForm" class="row">
	<div class="col-md-12 col-xs-8" id="bodyPopup">
		<div class="box-header">
	        <h3 class="box-title" style="font-weight: bold;font-size: 20px"><i id="titleLocation"></i></h3>
	    </div>
		<div class="box box-body box-primary" style="background: #e6f2ae">
			<div id="divLocation" class="row"></div>
			<div id="alertSave"></div>
			<div id="line">----------------------</div>			
			<div class="col-xs-12" id="buttonAction">							   
			    <a class="btn btn-danger cancle" style="width: 60%;">Cancle</a>
			</div>
		</div>
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
	var warehouse_id = $('#warehouse').val();
	$.ajax({
		url:'{{ route('user.ajax.get.product') }}',
		type:'GET',
		dataType: 'json',
		data:{'id': warehouse_id},
		success: function(data){
			$.each(data, function(index,dataObj){
				var index = index + 1;				
				$('#tableProduct').append('<tr class="viewLocation"><td>'+index+'</td><td>'+dataObj.name_product+'</td><td>'+dataObj.quanlity+'</td><td>'+dataObj.name+'</td><td>'+dataObj.created_at+'</td><td>'+dataObj.updated_at+'</td><td class="viewLocation"><a onclick="openLocation(this)" href="javascript:void(0)" class="'+dataObj.product_id+'">View</a> | <a onclick="editLocation(this)" href="javascript:void(0)" class="'+dataObj.product_id+'">Edit</a></td></tr>');
			});
		}
	});
	$('#warehouse').on('change',function(){
		var warehouse_id = $(this).val();
		$.ajax({
			url:'{{ route('user.ajax.get.product') }}',
			type:'GET',
			dataType: 'json',
			data:{'id': warehouse_id},
			success: function(data){				
				$('#tableProduct').empty();
				$.each(data, function(index,dataObj){
					var index = index + 1;				
					$('#tableProduct').append('<tr><td>'+index+'</td><td>'+dataObj.name_product+'</td><td>'+dataObj.quanlity+'</td><td>'+dataObj.name+'</td><td>'+dataObj.created_at+'</td><td>'+dataObj.updated_at+'</td><td><a onclick="openLocation(this)" href="javascript:void(0)" class="'+dataObj.product_id+'">View</a> | <a onclick="editLocation(this)" href="javascript:void(0)" class="'+dataObj.product_id+'">Edit</a></td></tr>');
				});
			}

		});
	});
	$('.cancle').on('click',function(){
	    $('#popupForm').css('display','none');
	});	
});
function openLocation(e){
	$('#alertSave').empty();
	var product_id = $(e).attr('class');
	var warehouse_id = $('#warehouse').val();	
	$.ajax({
		url:'{{ route('get.ajax.location') }}',
		type:'GET',
		dataType: 'json',
		data:{'warehouse_id': warehouse_id,'product_id': product_id},
		success: function(data){
			console.log(data.location_product);
			if(data.location_product == null){
				$('#divLocation').empty();
				$('#divLocation').append('<i><strong>No record of this product</strong></i>');
			}else{
				$('#divLocation').empty();
				$('#divLocation').append('<i><strong>Location: '+data.location_product+' </strong></i>');
			}
			$('#line').css('display','block');
			$('#titleLocation').empty();
			$('#titleLocation').append('View Location Product');
			$('#popupForm').show();
		}
	});
}
function editLocation(e){
	$('#alertSave').empty();
	var product_id = $(e).attr('class');
	var warehouse_id = $('#warehouse').val();
	$.ajax({
		url:'{{ route('get.ajax.location') }}',
		type:'GET',
		dataType: 'json',
		data:{'warehouse_id': warehouse_id,'product_id': product_id},
		success: function(data){						
			$('#divLocation').empty();
			$('#divLocation').append('<div class="col-md-10 col-xs-9"><input name="location" value="'+data.location_product+'" class="form-control" id="contentlocation"></div><div><span class="btn btn-primary" onclick="saveLocation(this)" id="'+data.product_id+'">Save</div>');
			$('#line').css('display','none');			
			$('#titleLocation').empty();
			$('#titleLocation').append('Edit Location Product');		
			$('#popupForm').show();			
		}
	});
}
function saveLocation(e){
	$('#alertSave').empty();
	var product_id = $(e).attr('id');
	var warehouse_id = $('#warehouse').val();
	var location = $('#contentlocation').val()	
	$.ajax({
		url:'{{ route('edit.ajax.location') }}',
		type:'POST',
		dataType: 'json',
		data:{'warehouse_id': warehouse_id,'product_id': product_id,'location': location},
		success:function(data){			
			$('#alertSave').append('<strong>SuccessFully Edited</strong>');
		},error:function(data){			
			$('#alertSave').append('<strong>Error Save</strong>');
		}
	});
}
function searchName(e){
	var value = $(e).val().toUpperCase();
	console.log(value)
	$("table tbody tr").each(function(index) {
        $row = $(this);

        var id = $row.find("td:eq(1)").text().toUpperCase();
        console.log(id);

        if (id.indexOf(value) != 0) {        	
            $(this).hide();
        }
        else {
            $(this).show();
        }    
    });
}
</script>
@endsection