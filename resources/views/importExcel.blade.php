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
        <select name="cities" id="selectCity">        
          @foreach($city as $c )
            <option value="{{ $c->id}}">{{ $c->name_city }}</option>
          @endforeach
        </select>       
      </div>
      <div class="col-xs-5">
        <label>District: </label>
        <select name="cars">                     
            <option>aloooo</option>                     
        </select>

      </div>
    </div>
  </section>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
  var idCity = $('#selectCity').val();
    $.ajax({
      url:"/getDataFromID",
      type:"POST",
      data:{'id': idCity},
      dataType: 'json',
      scucess: function(){
        alert('ok');
      }
    });
});     
</script>
@endsection



