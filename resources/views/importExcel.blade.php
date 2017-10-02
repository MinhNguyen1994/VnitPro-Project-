@extends('layouts.layoutAdmin')


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
              

          		<label class="control-label"><input type="radio" name="location" value="City"> City</label><br/>
              <label class="control-label"><input type="radio" name="location" value="District"> District</label><br/>
              <label class="control-label"><input type="radio" name="location" value="Ward"> Ward</label>
      	</div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary" name="submit" style="margin:0px 1%">Import</button>
        
      </div>
     
    </form>  
</div>

@endsection

@section('javascript')

@endsection



