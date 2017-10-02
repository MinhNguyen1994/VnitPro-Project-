@extends('layouts.layoutAdmin')

@section('titlePage','Locations')

@section('titlePageSmall','Create')

@section('titleMenu','Locations')

@section('css')
<!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')

<div class="box box-primary">
	<div class="box-header with-border">
        <h3 class="box-title">Create A New Location</h3>
    </div>
    <div class="box box-body">
    	<form role="form">
    		<div class="form-group">
    			<label>Name Location</label>
    			<input type="text" class="form-control" placeholder="Enter ...">
    			<div>
    				<label class="control-label" for="inputError" style="color:red">
    					<i class="fa fa-times-circle-o"></i> Input with	error
    				</label>
    			</div>                
    		</div>
    		
    		<div class="form-group">
    			<div>
    				<label>Address</label>
    			</div>
    			<div class="row">
    				<div class="col-xs-6">    					    				
    					<input type="text" class="form-control" placeholder="Enter Address">
    				</div>
    				<div class="col-xs-2">    				
    					<select class="form-control select2" style="width: 100%;" id="city" name="city">
    						<option value="0" disabled>Choose a City</option>
    					  	@foreach($city as $c)
    					  		<option value="{{$c->code_city}}">{{$c->name_city}}</option> 
    					  	@endforeach   				 
    					</select>
    						
    				</div>
    				<div class="col-xs-2">
    					<select class="form-control select2" style="width: 100%;" id="district" name="district">
    					  	<option value=""></option>   				  
    					</select>
    				</div>
    				<div class="col-xs-2">
    					<select class="form-control select2" style="width: 100%;">
    					  @foreach($city as $c)
    					  	<option value="{{$c->code_city}}">{{$c->name_city}}</option>
    					  @endforeach
    					</select>
    				</div>                 
    			</div>
    			<div>
    				<label class="control-label" for="inputError" style="color:red">
    					<i class="fa fa-times-circle-o"></i> Input with	error
    				</label>
    			</div>  			   
    		</div>

    		<div class="form-group">
    			<div>
    				<label>Description</label>
    			</div>
    			<textarea class="form-control" placeholder="Say something..." rows="4"></textarea>
    		</div>

    		<div class="form-group">
    			<button class="btn btn-success" name="submit">Done, Do it !</button>
    		</div>    		
    	</form>
    </div>
</div>

@endsection('content')

@section('javascript')
<script type="text/javascript">
	$('#city').change(function(){		
		var code_city = $('#city').val();
		$.ajax({
			url: '/ajax-district',
			type: 'GET',
			data: {'code_city': code_city},
			dataType:'html',
			success: function(district){
				console.log(district)				
				/*$('#district').empty();
				$.each(district, function(create,districtObj){
					$('#district').append('<option value="'+districtObj.code_district+'">'+districtObj.name_district+'</option>');
				});*/
			}

		});
	});
	
	
</script>


@endsection