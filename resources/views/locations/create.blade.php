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
        <h3 class="box-title">{{ $titlePage }}</h3>
    </div>
    <div class="box box-body">
    	<form role="form" method="POST">
            {{ csrf_field() }}
    		<div class="form-group">
    			<label>Name Location</label>
    			<input type="text" class="form-control" placeholder="Enter ..." name="name" value="{{ $name_warehouse }}">
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
    					<input type="text" class="form-control" placeholder="Enter Address" name="address" value="{{ $address }}">
    				</div>
    				<div class="col-xs-2">    				
    					<select class="form-control select2" style="width: 100%;" id="city" name="city">                  
                            @if($val_city == '')                            
    						    <option selected disabled>Choose a City</option>
                                @foreach($city as $c)
                                    <option value="{{$c->code_city}}">{{$c->name_city}}</option> 
                                @endforeach
                            @else
                                @foreach($city as $c) 
                                    @if ($c->name_city == $val_city) 
                                        <option value="{{$c->code_city}}" selected>{{ $c->name_city}}</option>
                                    @else
                                        <option value="{{$c->code_city}}">{{$c->name_city}}</option>
                                    @endif
                                @endforeach
                            @endif  
			
    					  	  				 
    					</select>
    						
    				</div>
    				<div class="col-xs-2">
    					<select class="form-control select2" style="width: 100%;" id="district" name="district" >
                            @if($val_district == '')
    					  	    <option value="0">Must Choose City </option>
                            @else
                                @foreach($district_info as $d)
                                    @if($d->name_district == $val_district)
                                        <option value="{{$d->code_district }}" selected>{{ $d->name_district}}</option>
                                    @else
                                        <option value="{{$d->code_district }}">{{ $d->name_district}}</option>
                                    @endif
                                @endforeach
                            @endif   				  
    					</select>
    				</div>
    				<div class="col-xs-2">
    					<select class="form-control select2" style="width: 100%;" id="ward" name="ward">
                            @if($val_ward == '')
                                <option value="0">Must Choose City </option>
                            @else 
        					  	@foreach($ward_info as $w)
                                    @if($w->name_ward == $val_ward)
                                        <option value="{{ $w->code_ward }}" selected>{{ $w->name_ward }}</option>
                                    @else
                                        <option value="{{ $w->code_ward }}">{{ $w->name_ward }}</option>
                                    @endif
                                @endforeach 
                            @endif  					  
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
    			<textarea class="form-control" placeholder="Say something..." rows="4" name="description" >{{ $description }}</textarea>
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
			dataType:'json',
			success: function(district){													
				$('#district').empty();
                $('#district').append('<option value="0" selected disabled>Choose a District</option>');
				$.each(district, function(create,districtObj){
					$('#district').append('<option value="'+districtObj.code_district+'">'+districtObj.name_district+'</option>');
				});				
			}

		});
	});
	$('#district').change(function(){
		var code_district = $('#district').val();
		$.ajax({
			url: '/ajax-ward',
			type: 'GET',
			data: {'code_district': code_district},
			dataType: 'json',
			success: function(ward){				
				$('#ward').empty();
                $('#ward').append('<option value="0" selected disabled>Choose a Ward</option>');
				$.each(ward,function(create,wardObj){
					$('#ward').append('<option value="'+wardObj.code_ward+'">'+wardObj.name_ward+'</option>');
				});
			}
		});
	});    
	
	
</script>


@endsection