@extends('layouts.layoutAdmin')


@section('content')

<div class="box-body">
	<form role="form" method="POST" enctype="multipart/form-data" action="">
		{{ csrf_field() }}
      	<div class="box-body">        
        	<div class="form-group">
          		<label for="exampleInputFile">File input</label>
          		<input type="file" id="exampleInputFile" name="file">

          		<p class="help-block" style="color:red;font-weight:bold">{{ $alert }}</p>
        	</div>
        	<div class="checkbox">
          		<label>
            		<input type="checkbox"> Check me out
          		</label>
        	</div>
      	</div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-info" name="submit" style="margin:0px 1%">Import</button>
      </div>
     
    </form>  
</div>
<div class="box box-default">
  <section class="content-header">
    <h1>List Of City/District/Ward</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-5">
        <label>City: </label>
        <select name="cars">
          <option value="volvo">Volvo</option>
          <option value="saab">Saab</option>
          <option value="fiat">Fiat</option>
          <option value="audi">Audi</option>
        </select>
      </div>
      <div class="col-xs-5"></div>
    </div>
  </section>
</div>

@endsection



