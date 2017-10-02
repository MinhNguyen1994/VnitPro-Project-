@extends('layouts.layoutAdmin')

@section('css')
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
@endsection

@section('content')
<div class="box-body">
	<form role="form" method="POST" enctype="multipart/form-data" >
		{{ csrf_field() }}
      	<div class="box-body">        
        	<div class="form-group">
          		<label for="exampleInputFile">File input</label>
          		<input type="file" id="exampleInputFile" name="file">

          		<p class="help-block" style="color:red;font-weight:bold">{{ $alert }}</p>
        	</div>
        	<div class="checkbox">              
            <div class="form-group">
              <div class="form-group">
                <label>
                  <input type="radio" name="location" class="iradio_minimal-blue" value="City">                    
                </label>
                <label style="font-weight: 700">City</label>                
              </div>
            </div>
            <div class="form-group">
              <div class="form-group">
                <label>
                  <input type="radio" name="location" class="iradio_minimal-blue" value="District">                    
                </label>
                <label style="font-weight: 700">District</label>                
              </div>
            </div>
            <div class="form-group">
              <div class="form-group">
                <label>
                  <input type="radio" name="location" class="iradio_minimal-blue" value="Ward">                    
                </label>
                <label style="font-weight: 700">Ward</label>                
              </div>
            </div>
          		
      	</div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary" name="submit" style="margin:0px 1%">Import</button>
        
      </div>
     
    </form>  
</div>

@endsection




