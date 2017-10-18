@extends('layouts.layoutAdmin')

@section('contend-header')
<h1>
    Product Groups
    <small>{{ $data['titleSmall']}}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route('product') }}"><i class="fa fa-dashboard"></i> Product</a></li>    
    <li><a href="{{ route('product.group') }}"><i class="fa fa-dashboard"></i> Product Group</a></li>    
    <li><i class="fa fa-dashboard"></i> {{ $data['titleMini'] }}</li>    
</ol>            
</section>  
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">

@endsection

@section('content')

<div class="box box-warning">
	<div class="box-header with-border">
        <h3 class="box-title">{{ $data['titlePage'] }}</h3>
    </div> 
        
    
    <div class="box box-body">
    	<form role="form" method="POST">
            {{ csrf_field() }}
    		<div class="form-group">
    			<label>Name Group</label>
    			<input type="text" class="form-control" placeholder="Enter..." name="name" value="{{ $data['name_product_group'] }}">
    			<div>
    				<label class="control-label" for="inputError" style="color:red">
    					@if($errors->has('name'))
                            <i class="fa fa-times-circle-o"></i>
                            {{ $errors->first('name') }}
                        @endif
    				</label>
    			</div>                
    		</div>    		
    		<div class="form-group">
    			<div>
    				<label>Code Group</label>
    			</div>    						    				
				<input type="text" class="form-control" placeholder="Enter..." name="code" value="{{ $data['code_product_group'] }}">
                <div>
                    <label class="control-label" for="inputError" style="color:red">
                        @if($errors->has('code'))
                            <i class="fa fa-times-circle-o"></i>
                            {{ $errors->first('code') }}
                        @endif
                    </label>
                </div>    				
    		</div>
    		<div class="form-group">
    			<div>
    				<label>Description</label>
    			</div>
    			<textarea class="form-control" placeholder="Say something..." rows="4" name="description">{{ $data['description'] }}</textarea>
                <div>
                    <label class="control-label" for="inputError" style="color:red">
                        @if($errors->has('description'))
                            <i class="fa fa-times-circle-o"></i>
                            {{ $errors->first('description') }}
                        @endif
                    </label>
                </div>
    		</div>  

    		<div class="form-group">
    			<button class="btn btn-warning" name="submit">Done, Do it !</button>                
    		</div>
               		
    	</form>
    </div>
</div>

@endsection('content')

